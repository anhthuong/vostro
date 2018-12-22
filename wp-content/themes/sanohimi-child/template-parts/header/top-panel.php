<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sanohimi
 */

// Don't show top panel if all elements are disabled.
if ( ! sanohimi_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel invert">
	<div <?php echo sanohimi_get_container_classes( array( 'top-panel__wrap container' ), 'header' ); ?>><?php
		sanohimi_top_message( '<div class="top-panel__message">%s</div>' );
		sanohimi_top_search( '<div class="top-panel__search">%s</div>' );
		sanohimi_top_menu();
		sanohimi_social_list( 'header' );
	?></div>
</div><!-- .top-panel -->
