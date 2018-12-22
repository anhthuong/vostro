<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Sanohimi
 */
?>

<div class="footer-area-wrap invert">
	<div class="container">
		<?php do_action( 'sanohimi_render_widget_area', 'footer-area' ); ?>
	</div>
</div>

<div class="footer-container invert">cccccccccc
	<div <?php echo sanohimi_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="container">
			<?php
				sanohimi_footer_logo();
				sanohimi_footer_menu();
				sanohimi_social_list( 'footer' );
				sanohimi_footer_copyright();
			?>
	</div>
	</div><!-- .site-info -->
</div><!-- .container -->
