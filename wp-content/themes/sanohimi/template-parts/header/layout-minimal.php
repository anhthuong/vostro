<?php
/**
 * Template part for minimal Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sanohimi
 */
?>

<div class="header-container__flex">
	<div class="site-branding">
		<?php sanohimi_header_logo() ?>
		<?php sanohimi_site_description(); ?>
	</div>
	<?php sanohimi_main_menu(); ?>
	<?php sanohimi_top_header_right( '%s' ); ?>
</div>
