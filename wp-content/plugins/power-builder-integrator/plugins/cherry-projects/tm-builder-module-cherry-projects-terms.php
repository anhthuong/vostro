<?php
class Tm_Builder_Cherry_Projects_Terms extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Projects Terms', 'power-builder-integrator' );
		$this->icon = 'f288';
		$this->slug = 'tm_pb_cherry_projects_terms';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'term_type',
			'listing_layout',
			'load_animation',
			'column_number',
			'column_number_laptop',
			'column_number_album_tablet',
			'column_number_portrait_tablet',
			'column_number_mobile',
			'post_per_page',
			'item_margin',
			'grid_template',
			'masonry_template',
			'cascading_grid_template',
			'list_template',
		);

		$this->fields_defaults = array(
			'term_type'                     => array( 'category' ),
			'listing_layout'                => array( 'masonry-layout' ),
			'load_animation'                => array( 'loading-animation-fade' ),
			'column_number'                 => array( 4 ),
			'column_number_laptop'          => array( 4 ),
			'column_number_album_tablet'    => array( 3 ),
			'column_number_portrait_tablet' => array( 2 ),
			'column_number_mobile'          => array( 1 ),
			'post_per_page'                 => array( 6 ),
			'item_margin'                   => array( 10 ),
			'grid_template'                 => array( 'terms-grid-default.tmpl' ),
			'masonry_template'              => array( 'terms-masonry-default.tmpl' ),
			'cascading_grid_template'       => array( 'terms-cascading-grid-default.tmpl' ),
			'list_template'                 => array( 'terms-list-default.tmpl' ),
		);
	}


	function get_fields() {

		$fields = array(
			'term_type' => array(
				'label'           => esc_html__( 'Term type', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'category' => esc_html__( 'Category', 'power-builder-integrator' ),
					'tag'      => esc_html__( 'Tag', 'power-builder-integrator' ),
				),
				'description'     => esc_html__( 'Choose term type', 'power-builder-integrator' ),
			),
			'listing_layout' => array(
				'label'           => esc_html__( 'Projects listing layout', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'grid-layout'           => esc_html__( 'Grid', 'power-builder-integrator' ),
					'masonry-layout'        => esc_html__( 'Masonry', 'power-builder-integrator' ),
					'cascading-grid-layout' => esc_html__( 'Cascading grid', 'power-builder-integrator' ),
					'list-layout'           => esc_html__( 'List', 'power-builder-integrator' ),
				),
				'description'     => esc_html__( 'Choose terms listing view layout.', 'power-builder-integrator' ),
			),
			'load_animation' => array(
				'label'           => esc_html__( 'Loading animation', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'loading-animation-fade'             => esc_html__( 'Fade animation', 'power-builder-integrator' ),
					'loading-animation-scale'            => esc_html__( 'Scale animation', 'power-builder-integrator' ),
					'loading-animation-move-up'          => esc_html__( 'Move Up animation', 'power-builder-integrator' ),
					'loading-animation-flip'             => esc_html__( 'Flip animation', 'power-builder-integrator' ),
					'loading-animation-helix'            => esc_html__( 'Helix animation', 'power-builder-integrator' ),
					'loading-animation-fall-perspective' => esc_html__( 'Fall perspective animation', 'power-builder-integrator' ),
				),
				'description'     => esc_html__( 'Choose terms loading animation.', 'power-builder-integrator' ),
			),
			'column_number' => array(
				'label'           => esc_html__( 'Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '4',
				'range_settings' => array(
					'min'  => 2,
					'max'  => 10,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'column_number_laptop' => array(
				'label'           => esc_html__( 'Laptop Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '4',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'column_number_album_tablet' => array(
				'label'           => esc_html__( 'Album Tablet Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '3',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'column_number_portrait_tablet' => array(
				'label'           => esc_html__( 'Portrait Tablet Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '2',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'column_number_mobile' => array(
				'label'           => esc_html__( 'Mobile Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '1',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'post_per_page' => array(
				'label'           => esc_html__( 'Posts per page', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '6',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
			),
			'item_margin' => array(
				'label'           => esc_html__( 'Item margin', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '10',
				'range_settings' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'      => false,
				'mobile_global'       => false,
				'description'     => esc_html__( 'Select projects item margin (outer indent) value.', 'power-builder-integrator' ),
			),
			'grid_template' => array(
				'label'           => esc_html__( 'Grid template', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'text',
				'default'         => 'terms-grid-default.tmpl',
				'value'           => 'terms-grid-default.tmpl',
			),
			'masonry_template' => array(
				'label'           => esc_html__( 'Masonry template', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'text',
				'default'         => 'terms-masonry-default.tmpl',
				'value'           => 'terms-masonry-default.tmpl',
			),
			'cascading_grid_template' => array(
				'label'           => esc_html__( 'Cascading grid template', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'text',
				'default'         => 'terms-cascading-grid-default.tmpl',
				'value'           => 'terms-cascading-grid-default.tmpl',
			),
			'list_template' => array(
				'label'           => esc_html__( 'List template', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'text',
				'default'         => 'terms-list-default.tmpl',
				'value'           => 'terms-list-default.tmpl',
			),

		);
		return $fields;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {

		$this->set_vars(
			array(
				'term_type',
				'listing_layout',
				'load_animation',
				'column_number',
				'column_number_laptop',
				'column_number_album_tablet',
				'column_number_portrait_tablet',
				'column_number_mobile',
				'post_per_page',
				'item_margin',
				'grid_template',
				'masonry_template',
				'cascading_grid_template',
				'list_template',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'cherry-projects', 'cherry_projects_terms' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func(
			$callback,
			array(
				'term_type'                     => $this->_var( 'term_type' ),
				'listing_layout'                => $this->_var( 'listing_layout' ),
				'loading_animation'             => $this->_var( 'load_animation' ),
				'column_number'                 => $this->_var( 'column_number' ),
				'column_number_laptop'          => $this->_var( 'column_number_laptop' ),
				'column_number_album_tablet'    => $this->_var( 'column_number_album_tablet' ),
				'column_number_portrait_tablet' => $this->_var( 'column_number_portrait_tablet' ),
				'column_number_mobile'          => $this->_var( 'column_number_mobile' ),
				'post_per_page'                 => $this->_var( 'post_per_page' ),
				'item_margin'                   => $this->_var( 'item_margin' ),
				'grid_template'                 => $this->_var( 'grid_template' ),
				'masonry_template'              => $this->_var( 'masonry_template' ),
				'cascading_grid_template'       => $this->_var( 'cascading_grid_template' ),
				'list_template'                 => $this->_var( 'list_template' ),
			)
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}
}

new Tm_Builder_Cherry_Projects_Terms;
