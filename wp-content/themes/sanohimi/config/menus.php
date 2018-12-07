<?php
/**
 * Menus configuration.
 *
 * @package Sanohimi
 */

add_action( 'after_setup_theme', 'sanohimi_register_menus', 5 );
function sanohimi_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'sanohimi' ),
		'main'   => esc_html__( 'Main', 'sanohimi' ),
		'footer' => esc_html__( 'Footer', 'sanohimi' ),
		'social' => esc_html__( 'Social', 'sanohimi' ),
	) );
}
