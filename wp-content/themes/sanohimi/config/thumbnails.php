<?php
/**
 * Thumbnails configuration.
 *
 * @package Sanohimi
 */

add_action( 'after_setup_theme', 'sanohimi_register_image_sizes', 5 );
function sanohimi_register_image_sizes() {
	set_post_thumbnail_size( 410, 267, true );

	// Registers a new image sizes.
	add_image_size( 'sanohimi-thumb-s', 150, 150, true );
	add_image_size( 'sanohimi-thumb-m', 400, 400, true );
	add_image_size( 'sanohimi-thumb-l', 1051, 943, true );
	add_image_size( 'sanohimi-thumb-xl', 1920, 1080, true );
	add_image_size( 'sanohimi-author-avatar', 512, 512, true );

	add_image_size( 'sanohimi-thumb-240-100', 240, 100, true );
	add_image_size( 'sanohimi-thumb-560-350', 560, 350, true );

	add_image_size( 'sanohimi-blog-module', 490, 290, true );
	add_image_size( 'sanohimi-room-type', 580, 387, true );
	add_image_size( 'sanohimi-thumb-493-380', 493, 380, true );
	add_image_size( 'sanohimi-thumb-372-372', 372, 372, true );

	add_image_size( 'sanohimi-thumb-140-117', 140, 117, true );
	add_image_size( 'sanohimi-thumb-post', 1500, 768, true );

	add_image_size( 'sanohimi-thumb-1500-554', 1500, 554, true );
	add_image_size( 'sanohimi-thumb-150-150', 200, 200, true );
}
