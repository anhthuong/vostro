<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Sanohimi
 */
?>

<div class="footer-container invert">bbbbbbbbbbbb
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
