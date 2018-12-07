<?php

namespace MPHB\Views;

use \MPHB\Entities;

class BookingView {

	public static function renderPriceBreakdown( Entities\Booking $booking ){
		echo self::generatePriceBreakdown( $booking );
	}

	public static function generatePriceBreakdown( Entities\Booking $booking ){
		$priceBreakdown = $booking->getPriceBreakdown();
		ob_start();
		if ( !empty( $priceBreakdown ) ) :

			$hasServices = false !== array_search( true, array_map( function( $roomBreakdown ) {
						return isset( $roomBreakdown['services'] ) && !empty( $roomBreakdown['services']['list'] );
					}, $priceBreakdown['rooms'] ) );

			$useThreeColumns = $hasServices;
			?>
			<table class="mphb-price-breakdown">
				<tbody>
					<?php foreach ( $priceBreakdown['rooms'] as $key => $roomBreakdown ) : ?>
						<?php if ( isset( $roomBreakdown['room'] ) ) : ?>
							<tr class="mphb-price-breakdown-group">
								<td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
									<a href="#" class="mphb-price-breakdown-expand" title="<?php _e( 'Expand', 'motopress-hotel-booking' ); ?>">
										<?php printf( _x( '#%d %s', 'Accommodation type in price breakdown table. Example: #1 Double Room', 'motopress-hotel-booking' ), $key + 1, $roomBreakdown['room']['type'] ); ?>
									</a>
									<div class="mphb-price-breakdown-rate mphb-hide"><?php printf( __( 'Rate: %s', 'motopress-hotel-booking' ), $roomBreakdown['room']['rate'] ); ?></div>
								</td>
								<td class="mphb-table-price-column"><?php echo mphb_format_price( $roomBreakdown['total'] ); ?></td>
							</tr>
							<tr class="mphb-hide">
								<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php _e( 'Dates', 'motopress-hotel-booking' ); ?></th>
								<th class="mphb-table-price-column"><?php _e( 'Price', 'motopress-hotel-booking' ); ?></th>
							</tr>
							<?php foreach ( $roomBreakdown['room']['list'] as $date => $datePrice ) : ?>
								<tr class="mphb-hide">
									<td colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php echo \MPHB\Utils\DateUtils::formatDateWPFront( \DateTime::createFromFormat( 'Y-m-d', $date ) ); ?></td>
									<td class="mphb-table-price-column"><?php echo mphb_format_price( $datePrice ); ?></td>
								</tr>
							<?php endforeach; ?>
							<tr class="mphb-hide">
								<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php _e( 'Dates Subtotal', 'motopress-hotel-booking' ); ?></th>
								<th class="mphb-table-price-column"><?php echo mphb_format_price( $roomBreakdown['room']['total'] ); ?></th>
							</tr>

							<?php if ( isset( $roomBreakdown['services'] ) && !empty( $roomBreakdown['services']['list'] ) ) : ?>
								<tr class="mphb-hide">
									<th colspan="<?php echo ( $useThreeColumns ? 3 : 2 ); ?>">
										<?php _e( 'Services', 'motopress-hotel-booking' ); ?>
									</th>
								</tr>
								<tr class="mphb-hide">
									<th><?php _e( 'Service', 'motopress-hotel-booking' ); ?></th>
									<th><?php _e( 'Details', 'motopress-hotel-booking' ); ?></th>
									<th class="mphb-table-price-column"><?php _e( 'Price', 'motopress-hotel-booking' ); ?></th>
								</tr>
								<?php foreach ( $roomBreakdown['services']['list'] as $serviceDetails ) : ?>
									<tr class="mphb-hide">
										<td><?php echo $serviceDetails['title']; ?></td>
										<td><?php echo $serviceDetails['details']; ?></td>
										<td class="mphb-table-price-column"><?php echo mphb_format_price( $serviceDetails['total'] ); ?></td>
									</tr>
								<?php endforeach; ?>
								<tr class="mphb-hide">
									<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
										<?php _e( 'Services Subtotal', 'motopress-hotel-booking' ); ?>
									</th>
									<th class="mphb-table-price-column">
										<?php echo mphb_format_price( $roomBreakdown['services']['total'] ); ?>
									</th>
								</tr>
							<?php endif; ?>

						<?php endif; ?>
						<tr class="mphb-hide">
							<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php _e( 'Subtotal', 'motopress-hotel-booking' ); ?></th>
							<th class="mphb-table-price-column"><?php echo mphb_format_price( $roomBreakdown['total'] ); ?></th>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<?php if ( !empty( $priceBreakdown['coupon'] ) ) : ?>
						<tr>
							<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>"><?php printf( __( 'Coupon: %s' ), $priceBreakdown['coupon']['code'] ); ?></th>
							<td class="mphb-table-price-column">
								<?php echo mphb_format_price( -1 * $priceBreakdown['coupon']['discount'] ); ?>
								<a href="#" class="mphb-remove-coupon"><?php _e( 'Remove', 'motopress-hotel-booking' ); ?></a>
							</td>
						</tr>
					<?php endif; ?>
					<tr>
						<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
							<?php _e( 'Total', 'motopress-hotel-booking' ); ?>
						</th>
						<th class="mphb-table-price-column">
							<?php
							echo mphb_format_price( $priceBreakdown['total'] );
							?>
						</th>
					</tr>
					<?php if ( !empty( $priceBreakdown['deposit'] ) ) : ?>
						<tr>
							<th colspan="<?php echo ( $useThreeColumns ? 2 : 1 ); ?>">
								<?php _e( 'Deposit', 'motopress-hotel-booking' ); ?>
							</th>
							<th class="mphb-table-price-column">
								<?php
								echo mphb_format_price( $priceBreakdown['deposit'] );
								?>
							</th>
						</tr>
					<?php endif; ?>
				</tfoot>
			</table>
			<?php
		endif;
		return ob_get_clean();
	}

	public static function renderCheckInDateWPFormatted( Entities\Booking $booking ){
		echo date_i18n( MPHB()->settings()->dateTime()->getDateFormatWP(), $booking->getCheckInDate()->getTimestamp() );
	}

	public static function renderCheckOutDateWPFormatted( Entities\Booking $booking ){
		echo date_i18n( MPHB()->settings()->dateTime()->getDateFormatWP(), $booking->getCheckOutDate()->getTimestamp() );
	}

	public static function renderTotalPriceHTML( Entities\Booking $booking ){
		echo mphb_format_price( $booking->getTotalPrice() );
	}

}
