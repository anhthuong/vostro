<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sanohimi
 */

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_format() );

	//the_post_navigation();
	the_post_navigation( array( 'prev_text' =>  esc_html__( 'Previous Post', 'sanohimi' ), 'next_text' =>  esc_html__( 'Next Post', 'sanohimi' ) ) );

	sanohimi_post_author_bio();

	sanohimi_related_posts();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
