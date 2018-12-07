<?php

namespace MPHB;

class Upgrader {

	const OPTION_MIN_DB_VERSION		 = '1.0.1';
	const OPTION_DB_VERSION			 = 'mphb_db_version';
	const OPTION_DB_VERSION_HISTORY	 = 'mphb_db_version_history';

	private $isNeedUpgrade = false;

	/**
	 *
	 * @var Upgrades\BackgroundBookingUpgrader_2_0_0
	 */
	private $bgBookingUpgrader2_0_0;

	/**
	 *
	 * @var Upgrades\BackgroundUpgrader
	 */
	private $bgUpgrader;

	/**
	 *
	 * @var array
	 */
	private $upgrades = array(
		'1.1.0'	 => array(
			'fixForV1_1_0'
		),
		'2.0.0'	 => array(
			'fixForV2_0_0'
		)
	);

	public function __construct(){

		$this->bgBookingUpgrader2_0_0	 = new Upgrades\BackgroundBookingUpgrader_2_0_0();
		$this->bgUpgrader				 = new Upgrades\BackgroundUpgrader();

		$this->checkVersion();

		add_action( 'init', array( $this, 'upgrade' ) );
		add_action( 'admin_init', array( $this, 'showUpgradeNotice' ) );
		add_action( 'admin_init', array( $this, 'maybeForceUpgrade' ) );

		add_action( 'mphb_import_end', array( $this, 'upgradeAfterImport' ) );
	}

	public function checkVersion(){
		$dbVersion = $this->bgUpgrader->is_in_progress() ? $this->getScheduledVersion() : $this->getCurrentDBVersion();

		if ( version_compare( MPHB()->getVersion(), $dbVersion, '>' ) ) {
			$this->isNeedUpgrade = true;
		}

		if ( version_compare( '2.0.0', $this->getCurrentDBVersion(), '>' ) ) {
			$this->blockNewBookings();
		}
	}

	private function blockNewBookings(){
		add_filter( 'mphb_block_booking', '__return_true' );
	}

	public function upgrade(){

		if ( !$this->isNeedUpgrade ) {
			return;
		}

		ignore_user_abort( true );
		mphb_set_time_limit( 0 );

		$newBatchesCount = 0;
		foreach ( $this->upgrades as $upgradeVersion => $callbacks ) {
			if ( version_compare( $this->getScheduledVersion(), $upgradeVersion, '<' ) ) {
				foreach ( $callbacks as $callback ) {
					$this->bgUpgrader->push_to_queue( $callback );
					$newBatchesCount++;
				}
				$this->bgUpgrader->save()->data( array() );
				$this->setScheduledVersion( $upgradeVersion );
			}
		}

		$this->bgUpgrader->push_to_queue( 'complete' )->save();
		$this->setScheduledVersion( MPHB()->getVersion() );
		$newBatchesCount++;

		$this->setTotalQueueSize( $this->getTotalQueueSize() + $newBatchesCount );

		$this->bgUpgrader->dispatch();

		return;
	}

	public function maybeForceUpgrade(){
		if ( isset( $_GET['mphb_force_upgrade'] ) && $_GET['mphb_force_upgrade'] ) {
			do_action( $this->bgUpgrader->get_identifier() . '_cron' );
			do_action( $this->bgBookingUpgrader2_0_0->get_identifier() . '_cron' );
			wp_safe_redirect( admin_url() );
			exit;
		}
	}

	public function showUpgradeNotice(){
		if ( $this->bgUpgrader->is_in_progress() ) {

			// fix for bug with extra batches lead to negative procent
			$totalQueueSize		 = max( $this->getTotalQueueSize(), $this->getQueueSize() );
			$completedItemsCount = $totalQueueSize - $this->getQueueSize();

			if ( $totalQueueSize != 0 ) {
				$percent = round( ($completedItemsCount / $totalQueueSize) * 100 );
			} else {
				$percent = 100;
			}

			$forceUpgradeUrl = add_query_arg( 'mphb_force_upgrade', 'true', MPHB()->getSettingsMenuPage()->getUrl() );
			$message		 = '<p>';
			$message .= '<strong>' . __( 'Hotel Booking', 'motopress-hotel-booking' ) . '</strong> &#8211; ';
			$message .= __( 'Your database is being updated in the background.', 'motopress-hotel-booking' );
			$message .= '<a href="' . esc_url( $forceUpgradeUrl ) . '">' . __( 'Taking a while? Click here to run it now.', 'motopress-hotel-booking' ) . '</a>';
			$message .= " ($percent%)";
			$message .= '</p>';
			MPHB()->notices()->addNotice( $message );
		}
	}

	/**
	 * fix for 1.1.0
	 * - Change abandon cron name
	 * - Change option name for Cancellation Page
	 */
	public function fixForV1_1_0(){

		$deprecatedAction = 'mphb_abandon_bookings';
		if ( wp_next_scheduled( $deprecatedAction ) ) {
			wp_clear_scheduled_hook( $deprecatedAction );
			MPHB()->cronManager()->getCron( 'abandon_booking_pending_user' )->schedule();
		}

		$this->changeOptionName( 'mphb_user_cancel_redirect', 'mphb_user_cancel_redirect_page' );

		$this->updateDBVersion( '1.1.0' );

		return false;
	}

	/**
	 * fix for 2.0.0
	 * - update bookings structure in db ( create reserved rooms )
	 *
	 * @return string|boolean False when update completed, function name otherwise.
	 */
	public function fixForV2_0_0(){

		if ( $this->bgBookingUpgrader2_0_0->is_in_progress() ) {
			$this->bgUpgrader->pause();
			return __FUNCTION__;
		}

		$oldBookingsAtts = array(
			'posts_per_page'		 => -1,
			'post_type'				 => 'mphb_booking',
			'suppress_filters'		 => false,
			'ignore_sticky_posts'	 => true,
			'fields'				 => 'ids',
			'post_status'			 => 'any',
			'meta_query'			 => array(
				array(
					'key'		 => 'mphb_room_id',
					'compare'	 => 'EXISTS',
				)
			),
			'orderby'				 => 'ID',
			'order'					 => 'ASC'
		);

		$oldBookingsIds = get_posts( $oldBookingsAtts );

		if ( empty( $oldBookingsIds ) ) {
			// upgrade 2.0.0 completed
			return false;
		}

		$oldBookingsChunked = array_chunk( $oldBookingsIds, Upgrades\BackgroundBookingUpgrader_2_0_0::BATCH_SIZE );

		foreach ( $oldBookingsChunked as $bookings ) {
			$this->bgBookingUpgrader2_0_0->data( $bookings )->save();
		}

		$this->setTotalQueueSize( $this->getTotalQueueSize() + count( $oldBookingsChunked ) );

		$this->bgUpgrader->wait_action( $this->bgBookingUpgrader2_0_0->get_identifier() . '_complete' );

		$this->bgBookingUpgrader2_0_0->dispatch();

		$this->bgUpgrader->pause();

		return __FUNCTION__;
	}

	/**
	 *
	 * @param string $version
	 */
	public function updateDBVersion( $version = null ){

		if ( is_null( $version ) ) {
			$version = MPHB()->getVersion();
		}

		update_option( self::OPTION_DB_VERSION, $version );

		if ( version_compare( $this->getCurrentDBVersion(), $version, '!=' ) ) {
			$this->addDBVersionToHistory( $version );
		}

		if ( version_compare( $this->getScheduledVersion(), $version, '<=' ) ) {
			$this->setScheduledVersion( false );
		}
	}

	/**
	 *
	 * @return string
	 */
	private function getCurrentDBVersion(){
		return get_option( self::OPTION_DB_VERSION, self::OPTION_MIN_DB_VERSION );
	}

	public function setScheduledVersion( $version = null ){
		if ( !empty( $version ) ) {
			update_option( 'mphb_scheduled_version', $version );
		} else {
			delete_option( 'mphb_scheduled_version' );
		}
	}

	/**
	 *
	 * @return string
	 */
	public function getScheduledVersion(){
		return get_option( 'mphb_scheduled_version', $this->getCurrentDBVersion() );
	}

	/**
	 *
	 * @param string $version
	 */
	private function addDBVersionToHistory( $version ){
		$dbVersionHistory	 = get_option( self::OPTION_DB_VERSION_HISTORY, array() );
		$dbVersionHistory[]	 = $version;
		update_option( self::OPTION_DB_VERSION_HISTORY, $dbVersionHistory );
	}

	/**
	 * @todo add support to false value of option
	 *
	 * @param string $oldName
	 * @param string $name
	 */
	private function changeOptionName( $oldName, $name ){
		$optionValue = get_option( $oldName );

		if ( false !== $optionValue ) {
			delete_option( $oldName );
			update_option( $name, $optionValue );
		}
	}

	public function resetDBVersion(){
		delete_option( self::OPTION_DB_VERSION );
	}

	public function upgradeAfterImport(){
		$this->resetDBVersion();
	}

	private function getTotalQueueSize(){
		return (int) get_option( 'mphb_upgrade_queue_size', 0 );
	}

	private function setTotalQueueSize( $size ){
		update_option( 'mphb_upgrade_queue_size', $size );
	}

	private function getQueueSize(){
		return $this->bgUpgrader->get_queue_size() + $this->bgBookingUpgrader2_0_0->get_queue_size();
	}

	public function complete(){
		$this->updateDBVersion( MPHB()->getVersion() );

		// clear total size
		delete_option( 'mphb_upgrade_queue_size' );
	}

}
