<?php
/**
 * Theme Customizer.
 *
 * @package Sanohimi
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function sanohimi_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'sanohimi_get_customizer_options' , array(
		'prefix'     => 'sanohimi',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'sanohimi' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'sanohimi' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'sanohimi' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'sanohimi' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'       => esc_html__( 'Logo &amp; Favicon', 'sanohimi' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'sanohimi' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'sanohimi' ),
					'text'  => esc_html__( 'Text', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'sanohimi' ),
				'description'     => esc_html__( 'Upload logo image', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'sanohimi' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => 'Pathway Gothic One, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => sanohimi_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => sanohimi_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => '48',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'sanohimi' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => sanohimi_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'sanohimi' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'sanohimi' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'sanohimi' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'sanohimi' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'sanohimi' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'sanohimi' ),
					'minified' => esc_html__( 'Minified', 'sanohimi' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'sanohimi' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'sanohimi' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'sanohimi' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'sanohimi' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'sanohimi' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'sanohimi' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'sanohimi' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'sanohimi' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'sanohimi' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'sanohimi' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'sanohimi' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'sanohimi' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'sanohimi' ),
				'section'     => 'page_layout',
				'default'     => 1530,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'sanohimi' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'sanohimi' ),
				'description' => esc_html__( 'Configure Color Scheme', 'sanohimi' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'sanohimi' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#a0be66',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#382a1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_4' => array(
				'title'   => esc_html__( 'Accent color (4)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#db745e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_5' => array(
				'title'   => esc_html__( 'Accent color (5)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#faf6f1',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_6' => array(
				'title'   => esc_html__( 'Accent color (6)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#e4d7ce',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_7' => array(
				'title'   => esc_html__( 'Accent color (7)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#f5f5f5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_8' => array(
				'title'   => esc_html__( 'Accent color (8)', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#616161',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#7d7d7d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#e55a3c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#3a3228',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#473627',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#473627',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#473627',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#616161',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'sanohimi' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'sanohimi' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#303043',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#a0be66',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'sanohimi' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'sanohimi' ),
				'description' => esc_html__( 'Configure typography settings', 'sanohimi' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'sanohimi' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'body_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'body_typography',
				'default'     => '13',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'body_typography',
				'default'     => '1.7',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'sanohimi' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h1_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h1_typography',
				'default'     => '70',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h1_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h1_typography',
				'default'     => '-1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'sanohimi' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h2_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h2_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h2_typography',
				'default'     => '40',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h2_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h2_typography',
				'default'     => '-0.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'sanohimi' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h3_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h3_typography',
				'default'     => '36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h3_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h3_typography',
				'default'     => '-1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'sanohimi' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h4_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h4_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h4_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h4_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'sanohimi' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h5_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h5_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h5_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h5_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h5_typography',
				'default'     => '-0.7',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'sanohimi' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'h6_typography',
				'default' => 'Martel, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'h6_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'h6_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'h6_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'h6_typography',
				'default'     => '0.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'sanohimi' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => sanohimi_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs', 'sanohimi' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'sanohimi' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Lato, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'sanohimi' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => sanohimi_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'sanohimi' ),
				'section' => 'breadcrumbs_typography',
				'default' => '900',
				'field'   => 'select',
				'choices' => sanohimi_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'sanohimi' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '10',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'sanohimi' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'sanohimi' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'sanohimi' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'sanohimi' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => sanohimi_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'sanohimi' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'top_header_right_text' => array(
				'title'       => esc_html__( 'Header Right Disclaimer Text', 'sanohimi' ),
				'description' => esc_html__( 'HTML formatting support', 'sanohimi' ),
				'section'     => 'header_styles',
				'default'     => false,
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'sanohimi' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'sanohimi' ),
				'section' => 'header_styles',
				'default' => 'minimal',
				'field'   => 'select',
				'choices' => sanohimi_get_header_layout_options(),
				'type' => 'control',
			),
			'header_invert_textcolorscheme' => array(
				'title'           => esc_html__( 'Invert text colorscheme', 'sanohimi' ),
				'section'         => 'header_styles',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_transparent_header_layout_type',
			),
			'header_bg_color' => array(
				'title'           => esc_html__( 'Background Color', 'sanohimi' ),
				'section'         => 'header_styles',
				'field'           => 'hex_color',
				'default'         => '#3a3228',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_not_transparent_header_layout_type',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'sanohimi' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
				'active_callback' => 'sanohimi_is_not_transparent_header_layout_type',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'sanohimi' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'sanohimi' ),
					'repeat'     => esc_html__( 'Tile', 'sanohimi' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'sanohimi' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'sanohimi' ),
				),
				'type' => 'control',
				'active_callback' => 'sanohimi_is_not_transparent_header_layout_type',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'sanohimi' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'sanohimi' ),
					'center' => esc_html__( 'Center', 'sanohimi' ),
					'right'  => esc_html__( 'Right', 'sanohimi' ),
				),
				'type' => 'control',
				'active_callback' => 'sanohimi_is_not_transparent_header_layout_type',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'sanohimi' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'sanohimi' ),
					'fixed'  => esc_html__( 'Fixed', 'sanohimi' ),
				),
				'type' => 'control',
				'active_callback' => 'sanohimi_is_not_transparent_header_layout_type',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'sanohimi' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'sanohimi' ),
				'description' => esc_html__( 'HTML formatting support', 'sanohimi' ),
				'section'     => 'header_top_panel',
				'default'     => false,
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_search' => array(
				'title'   => esc_html__( 'Enable search', 'sanohimi' ),
				'section' => 'header_top_panel',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'sanohimi' ),
				'section' => 'header_top_panel',
				'default' => '#3a3228',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'sanohimi' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'sanohimi' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable title attributes', 'sanohimi' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'more_button_type' => array(
				'title'   => esc_html__( 'More Menu Button Type', 'sanohimi' ),
				'section' => 'header_main_menu',
				'default' => 'text',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'sanohimi' ),
					'icon' => esc_html__( 'Icon', 'sanohimi' ),
					'text'  => esc_html__( 'Text', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'more_button_text' => array(
				'title'           => esc_html__( 'More Menu Button Text', 'sanohimi' ),
				'section'         => 'header_main_menu',
				'default'         => esc_html__( 'More', 'sanohimi' ),
				'field'           => 'input',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_more_button_type_text',
			),
			'more_button_icon' => array(
				'title'           => esc_html__( 'More Menu Button Icon', 'sanohimi' ),
				'section'         => 'header_main_menu',
				'field'           => 'iconpicker',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_more_button_type_icon',
				'icon_data'       => array(
					'icon_set'    => 'moreButtonFontAwesome',
					'icon_css'    => SANOHIMI_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => sanohimi_get_icons_set(),
				),
			),
			'more_button_image_url' => array(
				'title'           => esc_html__( 'More Button Image Upload', 'sanohimi' ),
				'description'     => esc_html__( 'Upload More Button image', 'sanohimi' ),
				'section'         => 'header_main_menu',
				'default'         => '',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_more_button_type_image',
			),
			'retina_more_button_image_url' => array(
				'title'           => esc_html__( 'Retina More Button Image Upload', 'sanohimi' ),
				'description'     => esc_html__( 'Upload More Button image for retina-ready devices', 'sanohimi' ),
				'section'         => 'header_main_menu',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_more_button_type_image',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'sanohimi' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'sanohimi' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'sanohimi' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'sanohimi' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'sanohimi' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'sanohimi' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'sanohimi' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'sanohimi' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'sanohimi' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'sanohimi' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'sanohimi' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'sanohimi' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'sanohimi' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'sanohimi' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'sanohimi' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'sanohimi' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => '%s/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => sanohimi_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => '3',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control'
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => 'centered',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'sanohimi' ),
					'centered' => esc_html__( 'Style 2', 'sanohimi' ),
					'minimal'  => esc_html__( 'Style 3', 'sanohimi' ),
				),
				'type' => 'control'
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area color', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => '#463c31',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => '#3a3228',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'sanohimi' ),
				'section' => 'footer_options',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			 ),
			 'footer_menu_visibility' => array(
				 'title'   => esc_html__( 'Show Menu', 'sanohimi' ),
				 'section' => 'footer_options',
				 'default' => true,
				 'field'   => 'checkbox',
				 'type'    => 'control',
				),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'sanohimi' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'sanohimi' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'sanohimi' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'sanohimi' ),
					'grid-2-cols'      => esc_html__( 'Grid (2 Columns)', 'sanohimi' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'sanohimi' ),
					'masonry-2-cols'   => esc_html__( 'Masonry (2 Columns)', 'sanohimi' ),
					'masonry-3-cols'   => esc_html__( 'Masonry (3 Columns)', 'sanohimi' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'sanohimi' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'sanohimi' ),
					'icon'  => esc_html__( 'Font Icon', 'sanohimi' ),
					'both'  => esc_html__( 'Text with Icon', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'sanohimi' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'fa-star',
				'icon_data'       => array(
					'icon_set'    => 'cherryTeamFontAwesome',
					'icon_css'    => get_template_directory_uri() . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => sanohimi_get_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'sanohimi_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'sanohimi' ),
				'description'     => esc_html__( 'Label for sticky post', 'sanohimi' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'sanohimi' ),
				'field'           => 'text',
				'active_callback' => 'sanohimi_is_sticky_text',
				'type'            => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'sanohimi' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'sanohimi' ),
					'full'    => esc_html__( 'Full content', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'   => esc_html__( 'Featured image', 'sanohimi' ),
				'section' => 'blog',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'sanohimi' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'blog_read_more_text' => array(
				'title'   => esc_html__( 'Read More button text', 'sanohimi' ),
				'section' => 'blog',
				'default' => esc_html__( 'Read More', 'sanohimi' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'sanohimi' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'sanohimi' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'sanohimi' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'sanohimi' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'sanohimi' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'sanohimi' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'sanohimi' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			/** 404 panel */
			'page_404_options'           => array(
				'title'    => esc_html__( '404', 'sanohimi' ),
				'priority' => 118,
				'type'     => 'section',
			),
			'page_404_bg_color'          => array(
				'title'   => esc_html__( 'Background Color', 'sanohimi' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'page_404_bg_image'          => array(
				'title'   => esc_html__( 'Background Image', 'sanohimi' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat'         => array(
				'title'   => esc_html__( 'Background Repeat', 'sanohimi' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'sanohimi' ),
					'repeat'    => esc_html__( 'Tile', 'sanohimi' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'sanohimi' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'sanohimi' ),
				),
				'type'    => 'control',
			),
			'page_404_bg_position_x'     => array(
				'title'   => esc_html__( 'Background Position', 'sanohimi' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'sanohimi' ),
					'center' => esc_html__( 'Center', 'sanohimi' ),
					'right'  => esc_html__( 'Right', 'sanohimi' ),
				),
				'type'    => 'control',
			),
			'page_404_bg_attachment'     => array(
				'title'   => esc_html__( 'Background Attachment', 'sanohimi' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'sanohimi' ),
					'fixed'  => esc_html__( 'Fixed', 'sanohimi' ),
				),
				'type'    => 'control',
			),


			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'sanohimi' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => 'Related Posts',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => '3',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => '3',
				'field'   => 'select',
				'choices' => array(
					'2'        => esc_html__( '2 columns', 'sanohimi' ),
					'3'        => esc_html__( '3 columns', 'sanohimi' ),
					'4'        => esc_html__( '4 columns', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title_length' => array(
				'title'   => esc_html__( 'Number of words in the title', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => '5',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_content' => array(
				'title'   => esc_html__( 'Display content', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => 'post_excerpt',
				'field'   => 'select',
				'choices' => array(
					'hide'				=> esc_html__( 'Hide', 'sanohimi' ),
					'post_excerpt'		=> esc_html__( 'Excerpt', 'sanohimi' ),
					'post_content'		=> esc_html__( 'Content', 'sanohimi' ),
				),
				'type' => 'control',
			),
			'related_posts_content_length' => array(
				'title'   => esc_html__( 'Number of words in the content', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => '15',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'sanohimi' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),		) ) );
}

/**
 * Return true if header layout type is transparent. Otherwise - return false.
 *
 * @param  object  $control
 * @return bool
 */
function sanohimi_is_transparent_header_layout_type( $control ) {

	if ( $control->manager->get_setting( 'header_layout_type' )->value() == 'transparent' ) {
		return true;
	}

	return false;
}

/**
 * Return true if header layout type is NOT transparent. Otherwise - return false.
 *
 * @param  object  $control
 * @return bool
 */
function sanohimi_is_not_transparent_header_layout_type( $control ) {
	return ! sanohimi_is_transparent_header_layout_type( $control );
}

/**
* Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function sanohimi_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function sanohimi_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function sanohimi_is_header_logo_image( $control ) {
	return sanohimi_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function sanohimi_is_header_logo_text( $control ) {
	return sanohimi_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function sanohimi_is_sticky_text( $control ) {
	return sanohimi_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function sanohimi_is_sticky_icon( $control ) {
	return sanohimi_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if More button (in the main menu) has image type. Otherwise - return false.
 * @param  object $control
 * @return bool
 */
function sanohimi_is_more_button_type_image( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has text type. Otherwise - return false.
 * @param  object $control
 * @return bool
 */
function sanohimi_is_more_button_type_text( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has icon type. Otherwise - return false.
 * @param  object $control
 * @return bool
 */
function sanohimi_is_more_button_type_icon( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'icon' ) {
		return true;
	}

	return false;
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function sanohimi_get_header_layout_options() {
	return apply_filters( 'sanohimi_header_layout_options', array(
		'minimal'      => esc_html__( 'Minimal', 'sanohimi' ),
		'centered'     => esc_html__( 'Centered', 'sanohimi' ),
		'default'      => esc_html__( 'Default', 'sanohimi' ),
		'transparent'  => esc_html__( 'Transparent', 'sanohimi' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 * @return [type] [description]
 */
function sanohimi_get_header_layout_pm_options() {
	$options = array(
		'inherit' => array(
			'label'   => esc_html__( 'Inherit', 'sanohimi' ),
			'img_src' => trailingslashit( SANOHIMI_THEME_URI ) . 'assets/images/admin/inherit.svg',
		),
	);

	foreach( sanohimi_get_header_layout_options() as $key => $label ) {
		$options[ $key ] = array(
			'label' => $label,
			'img_src' => trailingslashit( SANOHIMI_THEME_URI ) . 'assets/images/admin/header-layout-' . $key . '.svg',
		);
	}

	return $options;
}

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function sanohimi_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'sanohimi_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'sanohimi' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'sanohimi_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function sanohimi_get_font_styles() {
	return apply_filters( 'sanohimi_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'sanohimi' ),
		'italic'  => esc_html__( 'Italic', 'sanohimi' ),
		'oblique' => esc_html__( 'Oblique', 'sanohimi' ),
		'inherit' => esc_html__( 'Inherit', 'sanohimi' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function sanohimi_get_character_sets() {
	return apply_filters( 'sanohimi_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'sanohimi' ),
		'greek'        => esc_html__( 'Greek', 'sanohimi' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'sanohimi' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'sanohimi' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'sanohimi' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'sanohimi' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'sanohimi' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function sanohimi_get_text_aligns() {
	return apply_filters( 'sanohimi_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'sanohimi' ),
		'center'  => esc_html__( 'Center', 'sanohimi' ),
		'justify' => esc_html__( 'Justify', 'sanohimi' ),
		'left'    => esc_html__( 'Left', 'sanohimi' ),
		'right'   => esc_html__( 'Right', 'sanohimi' ),
	) );
}

/**
 * Get font weights
 *  * @since 1.0.0
 * @return array
 */
function sanohimi_get_font_weight() {
	return apply_filters( 'sanohimi_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function sanohimi_get_dynamic_css_options() {
	return apply_filters( 'sanohimi_get_dynamic_css_options', array(
		'prefix'    => 'sanohimi',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			SANOHIMI_THEME_DIR . '/assets/css/dynamic.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/header.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/social.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/post.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/site/buttons.css',

			SANOHIMI_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/widgets/contact-information.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/map.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/brands-showcase.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/blog.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/bar-counters.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/slider.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/booking.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/restaurant-menu.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/toggle.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/text.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/social-media-follow.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/circle-counter.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/number-counter.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/carousel.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/person.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/post-slider.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/taxonomy.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/gallery.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/cherry-search.css',
			SANOHIMI_THEME_DIR . '/assets/css/dynamic/builder/subscribe.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_accent_color_4',
			'regular_accent_color_5',
			'regular_accent_color_6',
			'regular_accent_color_7',
			'regular_accent_color_8',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function sanohimi_get_fonts_options() {
	return apply_filters( 'sanohimi_get_fonts_options', array(
		'prefix'  => 'sanohimi',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		)
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function sanohimi_get_default_footer_copyright() {
	return esc_html__( 'Sanohimi Hotel %%year%% All Rights Reserved', 'sanohimi' );
}

/**
 * Get icons set
 *
 * @return array
 */
function sanohimi_get_icons_set() {

	ob_start();

	include SANOHIMI_THEME_DIR . '/assets/js/icons.json';
	$json = ob_get_clean();

	$result = array();

	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}
