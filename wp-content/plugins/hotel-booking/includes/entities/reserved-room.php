<?php

namespace MPHB\Entities;

class ReservedRoom {

	/**
	 *
	 * @var int
	 */
	private $id;

	/**
	 *
	 * @var int
	 */
	private $roomId;

	/**
	 *
	 * @var int
	 */
	private $bookingId;

	/**
	 *
	 * @var int
	 */
	private $rateId;

	/**
	 *
	 * @var int
	 */
	private $adults;

	/**
	 *
	 * @var int
	 */
	private $children;

	/**
	 *
	 * @var \ReservedService[]
	 */
	private $reservedServices;

	/**
	 *
	 * @var string
	 */
	private $guestName;

	/**
	 *
	 * @var string
	 */
	private $status;

	/**
	 *
	 * @param array				 $atts Array of atts
	 * @param int				 $atts['id'] Id of room reservation record
	 * @param int				 $atts['room_id'] Id of room
	 * @param int				 $atts['booking_id'] Id of booking
	 * @param int				 $atts['rate_id'] Id of reserved rate
	 * @param int				 $atts['adults'] Adults count
	 * @param int				 $atts['children'] Children count
	 * @param \ReservedService[] $atts['reserved_services'] Array of Reserved Services
	 * @param string			 $atts['guest_name'] Full name of guest
	 *
	 */
	public function __construct( $atts ){
		if ( isset( $atts['id'] ) ) {
			$this->id = $atts['id'];
		}

		if ( isset( $atts['room_id'] ) ) {
			$this->roomId = (int) $atts['room_id'];
		}

		$this->rateId	 = (int) $atts['rate_id'];
		$this->adults	 = (int) $atts['adults'];
		$this->children	 = (int) $atts['children'];

		$this->reservedServices = isset( $atts['reserved_services'] ) ? $atts['reserved_services'] : array();

		$this->guestName = isset( $atts['guest_name'] ) ? $atts['guest_name'] : '';

		$this->bookingId = isset( $atts['booking_id'] ) ? (int) $atts['booking_id'] : 0;

		$this->status = isset( $atts['status'] ) ? $atts['status'] : 'publish';
	}

	/**
	 *
	 * @param array				 $atts Array of atts
	 * @param int				 $atts['id'] Id of room reservation record
	 * @param int				 $atts['room_id'] Id of room
	 * @param int				 $atts['booking_id'] Id of booking
	 * @param int				 $atts['rate_id'] Id of reserved rate
	 * @param int				 $atts['adults'] Adults count
	 * @param int				 $atts['children'] Children count
	 * @param \ReservedService[] $atts['reserved_services'] Array of Reserved Services
	 * @param string			 $atts['guest_name'] Full name of guest
	 * @return ReservedRoom
	 */
	public static function create( $atts ){
		return new self( $atts );
	}

	/**
	 *
	 * @return int
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 *
	 * @return int
	 */
	public function getRoomId(){
		return $this->roomId;
	}

	/**
	 *
	 * @return int
	 */
	public function getRateId(){
		return $this->rateId;
	}

	/**
	 *
	 * @return int
	 */
	public function getBookingId(){
		return $this->bookingId;
	}

	/**
	 * Retrieve room type id of reserved room
	 *
	 * @return int
	 */
	public function getRoomTypeId(){
		$roomTypeId = 0;
		if ( isset( $this->roomId ) ) {
			$room		 = MPHB()->getRoomRepository()->findById( $this->roomId );
			$roomTypeId	 = $room->getRoomTypeId();
		}
		if ( !$roomTypeId && isset( $this->rateId ) ) {
			$rate		 = MPHB()->getRateRepository()->findById( $this->rateId );
			$roomTypeId	 = $rate->getRoomTypeId();
		}
		return $roomTypeId;
	}

	/**
	 *
	 * @return int
	 */
	public function getAdults(){
		return $this->adults;
	}

	/**
	 *
	 * @return int
	 */
	public function getChildren(){
		return $this->children;
	}

	/**
	 *
	 * @return ReservedService[]
	 */
	public function getReservedServices(){
		return $this->reservedServices;
	}

	/**
	 *
	 * @return string
	 */
	public function getGuestName(){
		return $this->guestName;
	}

	/**
	 *
	 * @return string
	 */
	public function getStatus(){
		return $this->status;
	}

	/**
	 *
	 * @param \DateTime $checkInDate
	 * @param \DateTime $checkOutDate
	 * @return float
	 */
	public function calcRoomPrice( $checkInDate, $checkOutDate ){

		$price = 0;

		if ( !empty( $this->rateId ) ) {
			$rate	 = MPHB()->getRateRepository()->findById( $this->rateId );
			$price	 = $rate->calcPrice( $checkInDate, $checkOutDate );
		}

		return $price;
	}

	/**
	 *
	 * @param \DateTime $checkInDate
	 * @param \DateTime $checkOutDate
	 * @return float
	 */
	public function calcPrice( $checkInDate, $checkOutDate ){
		$price = 0.0;

		$price += $this->calcRoomPrice( $checkInDate, $checkOutDate );

		if ( !empty( $this->reservedServices ) ) {
			foreach ( $this->reservedServices as $reservedService ) {
				$price += $reservedService->calcPrice( $checkInDate, $checkOutDate );
			}
		}

		return $price;
	}

	/**
	 *
	 * @param \DateTime $checkInDate
	 * @param \DateTime $checkOutDate
	 * @return array
	 */
	public function getPriceBreakdown( $checkInDate, $checkOutDate, $language = null ){

		if ( !$language ) {
			$language = MPHB()->translation()->getCurrentLanguage();
		}

		$rateId	 = apply_filters( '_mphb_translate_post_id', $this->rateId, $language );
		$rate	 = MPHB()->getRateRepository()->findById( $rateId );

		$roomPriceBreakdown	 = $rate->getPriceBreakdown( $checkInDate, $checkOutDate );
		$roomTotal			 = $rate->calcPrice( $checkInDate, $checkOutDate );

		$servicesBreakdown = array(
			'list'	 => array(),
			'total'	 => 0.0
		);

		foreach ( $this->reservedServices as $reservedService ) {
			$servicesBreakdown['list'][] = $reservedService->getPriceBreakdown( $checkInDate, $checkOutDate, $language );
			$servicesBreakdown['total'] += $reservedService->calcPrice( $checkInDate, $checkOutDate );
		}

		$roomTypeId	 = apply_filters( '_mphb_translate_post_id', $this->getRoomTypeId() );
		$roomType	 = $roomTypeId ? MPHB()->getRoomTypeRepository()->findById( $roomTypeId ) : null;

		$priceBreakdown = array(
			'room'		 => array(
				'type'	 => $roomType ? $roomType->getTitle() : '',
				'rate'	 => $rate->getTitle(),
				'list'	 => $roomPriceBreakdown,
				'total'	 => $roomTotal
			),
			'services'	 => $servicesBreakdown,
			'total'		 => $this->calcPrice( $checkInDate, $checkOutDate )
		);

		return $priceBreakdown;
	}

	/**
	 *
	 * @param int $bookingId
	 */
	public function setBookingId( $bookingId ){
		$this->bookingId = $bookingId;
	}

}
