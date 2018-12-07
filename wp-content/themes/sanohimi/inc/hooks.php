<?php
/**
 * Theme hooks.
 *
 * @package Sanohimi
 */

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'sanohimi_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'sanohimi_widget_area_classes', 'sanohimi_set_sidebar_classes', 10, 2 );

// Add row to footer area classes.
add_filter( 'sanohimi_widget_area_classes', 'sanohimi_add_footer_widgets_wrapper_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'sanohimi_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'sanohimi_add_image_format_classes', 10, 2 );

// Enqueue sticky menu if required.
add_filter( 'sanohimi_theme_script_depends', 'sanohimi_enqueue_misc' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'sanohimi_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'sanohimi_modify_comment_form' );

// Additional body classes.
add_filter( 'body_class', 'sanohimi_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'sanohimi_render_widget_macros' );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'sanohimi_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'sanohimi_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'sanohimi_excerpt_more' );

// Single room featured image
add_filter( 'mphb_single_room_type_image_size', 'sanohimi_single_room_type_image_size' );

// Restaurant Menu single post action
remove_action( 'mprm_menu_item_content', 'mprm_menu_item_content_comments', 30 );
remove_action('mprm_menu_item_single_theme_view', 'get_price_theme_view', 10);
remove_action('mprm_menu_item_single_theme_view', 'get_related_items_theme_view', 35);
remove_action('mprm_menu_item_single_theme_view', 'mprm_get_purchase_template', 15);
remove_action('mprm_menu_item_single_theme_view', 'get_ingredients_theme_view', 20);
remove_action('mprm_menu_item_single_theme_view', 'get_attributes_theme_view', 25);

// Restaurant Menu shortcode menu item grid actions
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_image', 20 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_title', 30 );
remove_action( 'mphb_render_loop_service_before_title', array('MPHBLoopServiceView', '_renderTitleHeadingOpen' ), 10);
remove_action( 'mphb_render_loop_service_before_title', array('MPHBLoopServiceView', '_renderTitleHeadingOpen' ), 10);
remove_action( 'mphb_render_loop_service_after_title', array('MPHBLoopServiceView', '_renderTitleHeadingClose' ), 10);
remove_action('mprm_menu_item_slidebar', 'mprm_menu_item_price', 5);
remove_action('mprm_menu_item_slidebar', 'mprm_menu_item_slidebar_ingredients', 25);

add_action( 'mprm_shortcode_menu_item_grid', 'sanohimi_mprm_menu_item_grid_image', 20 );
add_action( 'mprm_shortcode_menu_item_grid', 'sanohimi_mprm_menu_item_title', 30 );
add_action( 'mphb_render_loop_service_before_title', 'sanohimi_render_loop_service_before_title', 20 );
add_action( 'mphb_render_loop_service_after_title', 'sanohimi_render_loop_service_after_title', 30 );
add_action('mprm_menu_item_slidebar', 'mprm_menu_item_price', 25);
add_action('mprm_menu_item_slidebar', 'mprm_menu_item_slidebar_ingredients', 5);

/*
* Booking Single Room
* Content Wrapper & Sidebar Wrapper
*/

//Remove Elements Booking Single Room
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderTitle'),				  10);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderFeaturedImage'),	20);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderDescription'),		30);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderPrice'),				  40);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderAttributes'),		50);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderCalendar'),			60);
remove_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderReservationForm'),	70);

//Custom Content Wrapper
add_action('mphb_render_single_room_type_content', 'prefix_open_content_wrapper', 5);
function prefix_open_content_wrapper() {
 echo '<div class="single-content-primary row">';
}


//Custom Content Wrapper
add_action('mphb_render_single_room_type_content', 'prefix_open_primary_content', 5);
function prefix_open_primary_content() {
 echo '<div class="mphb-single-room-content col-xs-12 col-xl-8">';
}

add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderTitle'),					  5);
add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderFeaturedImage'), 		5);
add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderDescription'),	 		5);
add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderReservationForm'),	5);

add_action('mphb_render_single_room_type_content', 'prefix_close_primary_content', 5);
function prefix_close_primary_content() {
 echo '</div>';
}
//End Custom Content Wrapper

//Custom Sidebar Wrapper
add_action('mphb_render_single_room_type_content', 'prefix_open_sidebar_wrapper', 5);
function prefix_open_sidebar_wrapper() {
 echo '<div class="mphb-single-room-sidebar col-xs-12 col-xl-4">';
}

add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderAttributes'),				5);
add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderPrice'),						5);
add_action('mphb_render_single_room_type_content', array('\MPHB\Views\SingleRoomTypeView', 'renderCalendar'),			    5);

//Custom Designations
add_action('mphb_render_single_room_type_content', 'prefix_open_calendar_designations', 5);
function prefix_open_calendar_designations() {
	echo( '<div class="calendar_designations">' .
		'<ol>' .
			'<li>' . esc_html__( 'Current date —', 'sanohimi' ) . '</li>' .
			'<li>' . esc_html__( 'Booked room —', 'sanohimi' ) . '</li>' .
			'<li>' . esc_html__( 'Free room —', 'sanohimi' ) . '</li>' .
		'</ol>'
 );
}

add_action('mphb_render_single_room_type_content', 'prefix_close_calendar_designations', 32);
function prefix_close_calendar_designations() {
 echo '</div>';
}
//End Custom Designations

add_action('mphb_render_single_room_type_content', 'prefix_close_sidebar_wrapper', 32);
function prefix_close_sidebar_wrapper() {
 echo '</div>';
}
//End Custom Sidebar Wrapper


add_action('mphb_render_single_room_type_content', 'prefix_close_content_wrapper', 32);
function prefix_close_content_wrapper() {
 echo '</div>';
}
//End Custom Content Wrapper

/*
* end Booking Loop Room Type View, Booking Single Room Type View
*/


// Disable mp_rm breadcrumbs
add_filter( 'mprm-item-breadcrumbs', '__return_false' );

// Restaurant Menu widget menu item grid actions
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_image', 20 );

add_action( 'mprm_widget_menu_item_list', 'sanohimi_mprm_shortcode_menu_item_list_image', 15 );

// Restaurant Menu widget menu item list actions
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_image', 15 );

add_action( 'mprm_widget_menu_item_grid', 'sanohimi_mprm_menu_item_grid_image', 20 );

// Search availability shortcode, set text logo
//add_action('mphb_sc_search_render_form_top', 'sanohimi_search_availability', 5);

function sanohimi_search_availability() {
	echo (
		'<div class="form_logo_wrapper">' .	'<p class="title">' .	esc_html__('Book Now 111111111', 'sanohimi') . '</p>' .	'<p class="description">' . esc_html__('Best price online 22222222', 'sanohimi')	.	'</p>' .	'</div>'
	);
}

/*============================================================================*/

/**
 * Restaurant Menu shortcode menu item list image
 */
function sanohimi_mprm_shortcode_menu_item_list_image() {
	global $mprm_view_args;

	if ( empty( $mprm_view_args['feat_img'] ) ) {
		return;
	}

	$utility = sanohimi_utility()->utility;
	$html    = ( ! empty( $mprm_view_args['link_item'] ) ) ? '<a href="%1$s" %2$s><img class="mprm-image" src="%3$s" alt="%4$s" %5$s></a>' : '<img class="mprm-image" src="%3$s" alt="%4$s" %5$s>';

	$utility->media->get_image( array(
		'size'        => 'sanohimi-thumb-493-380',
		'mobile_size' => 'sanohimi-thumb-493-380',
		'class'       => 'mprm-link',
		'html'        => '<figure class="mprm-side mprm-left-side">' . $html . '</figure>',
		'placeholder' => false,
		'echo'        => true,
	) );
}

/**
 * Restaurant Menu shortcode, widget menu item grid image
 */
function sanohimi_mprm_menu_item_grid_image() {
	global $mprm_view_args;

	if ( empty($mprm_view_args['feat_img']) ) {
		return;
	}

	$utility = sanohimi_utility()->utility;
	$html = (!empty($mprm_view_args['link_item'])) ? '<a href="%1$s" %2$s><i class="material-icons">arrow_forward</i><img class="mprm-image" src="%3$s" alt="%4$s" %5$s></a>' : '<img class="mprm-image" src="%3$s" alt="%4$s" %5$s>';

	$utility->media->get_image( array(
			'size'        => 'sanohimi-thumb-493-380',
			'mobile_size' => 'sanohimi-thumb-493-380',
			'class'       => 'mprm-link',
			'html'        => $html,
			'placeholder' => false,
			'echo'        => true,
	) );
}

/**
 * Restaurant Menu shortcode, widget menu item title
 */
function sanohimi_mprm_menu_item_title() {
	global $mprm_view_args;

	$utility = sanohimi_utility()->utility;

	$title_html = (!empty($mprm_view_args['link_item'])) ? '<h4 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h4>' : '<h4 %1$s>%4$s</h4>';

	$utility->attributes->get_title( array(
			'class' => 'mprm-item-title',
			'html'  => $title_html,
			'echo'  => true,
	) );
}

/**
 * Single room featured image
 */
function sanohimi_single_room_type_image_size($size) {
	$size = 'sanohimi-thumb-l';

	return $size;
}

/**
 * Bookin services item title
 */
function sanohimi_render_loop_service_before_title() {
	echo '<h3 itemprop="name" class="mphb-service-title">';
}

function sanohimi_render_loop_service_after_title() {
	echo '</h3>';
}

/**
 * Room menu related-items images
 */
add_filter( 'mprm-related-item-image-size', 'sanohimi_related_item_image_size');

function sanohimi_related_item_image_size( ) {
	return 'sanohimi-thumb-140-117';
}

// Custom icon
add_filter( 'tm_builder_custom_font_icons', 'sanohimi_add_builder_icons' );

function sanohimi_add_builder_icons( $icons ) {
		$icons['hotel-regular'] = array(
				'src'  => get_stylesheet_directory_uri() . '/assets/css/hotel.css',
				'base' => 'hotel-regular',
		);
		return $icons;
}

/**
 * Add superscript & subscript to call-to-action-booking
 *
 * @return array
 */
add_filter( 'mce_buttons_2', 'sanohimi_mce_buttons' );

function sanohimi_mce_buttons($buttons) {
		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;
}

/**
 * Append description into nav items
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string
 */
function sanohimi_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = get_theme_mod(
		'header_menu_attributes',
		sanohimi_theme()->customizer->get_default( 'header_menu_attributes' )
	);

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . $item->description . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   sanohimi_get_layout_classes.
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 * @return array
 */
function sanohimi_set_sidebar_classes( $classes, $area_id ) {

	if ( 'sidebar' !== $area_id ) {
		return $classes;
	}

	return sanohimi_get_layout_classes( 'sidebar', $classes );
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 * @return array
 */
function sanohimi_add_footer_widgets_wrapper_classes( $classes, $area_id ) {

	if ( 'footer-area' !== $area_id ) {
		return $classes;
	}

	$classes[] = 'row';

	return $classes;
}


/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 * @param  string $params Existing widget classes.
 * @return string
 */
function sanohimi_get_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = get_theme_mod(
		'footer_widget_columns',
		sanohimi_theme()->customizer->get_default( 'footer_widget_columns' )
	);

	$columns = intval( $columns );
	$classes = 'class="col-xs-12 col-sm-%2$s col-md-%1$s %3$s ';

	switch ( $columns ) {
		case 4:
			$md_col = 3;
			$sm_col = 6;
			$extra  = '';
			break;

		case 3:
			$md_col = 4;
			$sm_col = 4;
			$extra  = '';
			break;

		case 2:
			$md_col = 6;
			$sm_col = 6;
			$extra  = '';
			break;

		default:
			$md_col = 12;
			$sm_col = 12;
			$extra  = 'footer-area--centered';
			break;
	}

	$params[0]['before_widget'] = str_replace(
		'class="',
		sprintf( $classes, $md_col, $sm_col, $extra ),
		$params[0]['before_widget']
	);

	return $params;
}

/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args      Post formats module arguments.
 * @return array
 */
function sanohimi_add_image_format_classes( $css_model, $args ) {
	$css_model['link'] .= ' post-thumbnail--fullwidth';

	return $css_model;
}

/**
 * Add jQuery Stickup to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function sanohimi_enqueue_misc( $depends ) {
	$header_menu_sticky = get_theme_mod( 'header_menu_sticky', sanohimi_theme()->customizer->get_default( 'header_menu_sticky' ) );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$depends[] = 'jquery-stickup';
	}

	$totop_visibility = get_theme_mod( 'totop_visibility', sanohimi_theme()->customizer->get_default( 'totop_visibility' ) );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function sanohimi_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function sanohimi_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit Comment', 'sanohimi' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_html__( 'Your name', 'sanohimi' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your e-mail', 'sanohimi' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your website', 'sanohimi' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_html__( 'Comments *', 'sanohimi' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	return $args;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function sanohimi_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! sanohimi_is_top_panel_visible() ) {
		$classes[] = 'top-panel-invisible';
	}

	// Adds a class based on header layout type.
	$header_layout = get_theme_mod( 'header_layout_type', sanohimi_theme()->customizer->get_default( 'header_layout_type' ) );
	$classes[] = 'header-layout-' . $header_layout;

	// Adds a options-based classes.
	$header_layout      = get_theme_mod( 'page_layout_type', sanohimi_theme()->customizer->get_default( 'header_container_type' ) );
	$content_layout      = get_theme_mod( 'content_container_type', sanohimi_theme()->customizer->get_default( 'content_container_type' ) );
	$footer_layout      = get_theme_mod( 'footer_container_type', sanohimi_theme()->customizer->get_default( 'footer_container_type' ) );
	$blog_layout = get_theme_mod( 'blog_layout_type', sanohimi_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sb_position = get_theme_mod( 'sidebar_position', sanohimi_theme()->customizer->get_default( 'sidebar_position' ) );
	$sidebar     = get_theme_mod( 'sidebar_width', sanohimi_theme()->customizer->get_default( 'sidebar_width' ) );

	return array_merge( $classes, array(
		'header-layout-' . $header_layout,
		'content-layout-' . $content_layout,
		'footer-layout-' . $footer_layout,
		'blog-' . $blog_layout,
		'position-' . $sb_position,
		'sidebar-' . str_replace( '/', '-', $sidebar ),
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string $text Default text.
 * @return string
 */
function sanohimi_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url( '/' ) ),
		'/%%theme_url%%/'   => get_stylesheet_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 * @return string `<meta>` tag for viewport.
 */
function sanohimi_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 * @param  array $args Widget arguments.
 * @return array
 */
function sanohimi_customize_tag_cloud( $args ) {
	$args['smallest'] = 14;
	$args['largest']  = 14;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 * @param  string $more The string shown within the more link.
 * @return string
 */
function sanohimi_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}

/**
 * Remap thumbanil ID's and menu terms
 */
add_action( 'cherry_data_import_remap_posts', 'sanohimi_remap_menus' );
function sanohimi_remap_menus( $posts ) {

	global $wpdb;

	$query = "
		SELECT *
		FROM $wpdb->termmeta
		WHERE meta_key LIKE 'mprm_taxonomy_%'
	";

	$taxmeta = $wpdb->get_results( $query );

	if ( empty( $taxmeta ) ) {
		return;
	}

	foreach ( $taxmeta as $tax ) {

		$value = unserialize( $tax->meta_value );
		if ( is_string( $value ) ) {
			$value = unserialize( $value );
		}

		if ( isset( $value['thumbnail_id'] ) && isset( $posts[ $value['thumbnail_id'] ] ) ) {
			$value['thumbnail_id'] = $posts[ $value['thumbnail_id'] ];
		}

		$wpdb->update(
			$wpdb->termmeta,
			array(
				'meta_id'    => $tax->meta_id,
				'term_id'    => $tax->term_id,
				'meta_key'   => 'mprm_taxonomy_' . $tax->term_id,
				'meta_value' => serialize( $value ),
			),
			array(
				'term_id' => $tax->term_id,
			),
			$format = array(
				'meta_id'    => '%d',
				'term_id'    => '%d',
				'meta_key'   => '%s',
				'meta_value' => '%s',
			),
			$where_format = array(
				'term_id' => '%d',
			)
		);
	}
}

/**
 * Remap menu term IDs in shortcode [mprm_items]
 */
add_filter( 'cherry_data_import_home_regex_replace', 'sanohimi_home_regex_args' );
function sanohimi_home_regex_args( $regex ) {

	$regex[] = array(
		'shortcode' => 'mprm_items',
		'attr'      => 'categ',
	);

	return $regex;
}
