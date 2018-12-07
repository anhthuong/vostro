<?php
class Tm_Builder_Cherry_RE_Property_List extends Tm_Builder_Module {

	function init() {
		$this->name             = esc_html__( 'Cherry RE Property List', 'power-builder-integrator' );
		$this->icon             = 'f00b';
		$this->slug             = 'tm_pb_cherry_re_property_list';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'number',
			'order',
			'orderby',
			'show_title',
			'show_image',
			'image_size',
			'show_status',
			'show_area',
			'show_bedrooms',
			'show_bathrooms',
			'show_price',
			'show_location',
			'show_excerpt',
			'excerpt_length',
			'show_more_button',
			'more_button_text',
			'template',
			'module_id',
			'module_class',
		);

		$this->fields_defaults = array(
			'number'           => array( '5' ),
			'order'            => array( 'desc' ),
			'orderby'          => array( 'date' ),
			'show_title'       => array( 'on' ),
			'show_image'       => array( 'on' ),
			'image_size'       => array( 'thumbnail' ),
			'show_excerpt'     => array( 'on' ),
			'excerpt_length'   => array( '15' ),
			'show_status'      => array( 'on' ),
			'show_area'        => array( 'on' ),
			'show_bedrooms'    => array( 'on' ),
			'show_bathrooms'   => array( 'on' ),
			'show_price'       => array( 'on' ),
			'show_location'    => array( 'on' ),
			'show_more_button' => array( 'on' ),
			'more_button_text' => array( esc_html__( 'read more', 'power-builder-integrator' ) ),
			'template'         => array( 'default.tmpl' ),
		);
	}

	function get_fields() {
		$image_sizes = get_intermediate_image_sizes();

		$fields = array(
			'number' => array(
				'label'           => esc_html__( 'How Many?', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => -1,
					'max'  => 100,
					'step' => 1,
				),
				'default' => '5',
			),
			'orderby' => array(
				'label'           => esc_html__( 'Order by', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'date'       => esc_html__( 'Date', 'power-builder-integrator' ),
					'id'         => esc_html__( 'Property ID', 'power-builder-integrator' ),
					'author'     => esc_html__( 'Property author', 'power-builder-integrator' ),
					'title'      => esc_html__( 'Property title', 'power-builder-integrator' ),
					'name'       => esc_html__( 'Property slug', 'power-builder-integrator' ),
					'modified'   => esc_html__( 'Last modified date', 'power-builder-integrator' ),
					'parent'     => esc_html__( 'Property parent', 'power-builder-integrator' ),
					'rand'       => esc_html__( 'Random', 'power-builder-integrator' ),
					'menu_order' => esc_html__( 'Menu order', 'power-builder-integrator' ),
				),
				'default' => 'date',
			),
			'order' => array(
				'label'           => esc_html__( 'Order', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'desc' => esc_html__( 'Descending', 'power-builder-integrator' ),
					'asc'  => esc_html__( 'Ascending', 'power-builder-integrator' ),
				),
				'default' => 'desc',
			),
			'show_title' => array(
				'label'           => esc_html__( 'Show Title', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_image' => array(
				'label'           => esc_html__( 'Show Image', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_image_size',
				),
			),
			'image_size' => array(
				'label'           => esc_html__( 'Photo Size', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Select photo size.', 'power-builder-integrator' ),
				'type'            => 'select',
				'options'         => array_combine( $image_sizes, $image_sizes ),
				'default'         => 'thumbnail',
				'depends_show_if' => 'on',
			),
			'show_status' => array(
				'label'           => esc_html__( 'Show Status', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_area' => array(
				'label'           => esc_html__( 'Show Area', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_bedrooms' => array(
				'label'           => esc_html__( 'Show Bedrooms', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_bathrooms' => array(
				'label'           => esc_html__( 'Show Bathrooms', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_price' => array(
				'label'           => esc_html__( 'Show Price', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_location' => array(
				'label'           => esc_html__( 'Show Location', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_excerpt' => array(
				'label'           => esc_html__( 'Show Excerpt', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_excerpt_length',
				),
			),
			'excerpt_length' => array(
				'label'           => esc_html__( 'Excerpt Length', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Auto-generated excerpt length (in words)', 'power-builder-integrator' ),
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'default'         => '15',
				'depends_show_if' => 'on',
			),
			'show_more_button' => array(
				'label'           => esc_html__( 'Show More Button', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_more_button_text',
				),
			),
			'more_button_text' => array(
				'label'           => esc_html__( 'More Button Text', 'power-builder-integrator' ),
				'type'            => 'text',
				'default'         => esc_html__( 'read more', 'power-builder-integrator' ),
				'depends_show_if' => 'on',
			),
			'template' => array(
				'label'           => esc_html__( 'Template', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Choose template file (*.tmpl)', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => $this->_prepare_template_select(),
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'power-builder-integrator' ),
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'power-builder-integrator' ),
				'type'        => 'text',
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
		);

		return $fields;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		$this->set_vars(
			array(
				'number',
				'order',
				'orderby',
				'show_title',
				'show_image',
				'image_size',
				'show_excerpt',
				'excerpt_length',
				'show_status',
				'show_area',
				'show_bedrooms',
				'show_bathrooms',
				'show_bathrooms',
				'show_price',
				'show_location',
				'show_more_button',
				'more_button_text',
				'template',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'cherry-real-estate', 'tm_re_property_list' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func( $callback, array(
			'number'           => $this->_var( 'number' ),
			'order'            => $this->_var( 'order' ),
			'orderby'          => $this->_var( 'orderby' ),
			'show_title'       => $this->_var( 'show_title' ),
			'show_image'       => $this->_var( 'show_image' ),
			'image_size'       => $this->_var( 'image_size' ),
			'show_excerpt'     => $this->_var( 'show_excerpt' ),
			'excerpt_length'   => $this->_var( 'excerpt_length' ),
			'show_status'      => $this->_var( 'show_status' ),
			'show_area'        => $this->_var( 'show_area' ),
			'show_bedrooms'    => $this->_var( 'show_bedrooms' ),
			'show_bathrooms'   => $this->_var( 'show_bathrooms' ),
			'show_price'       => $this->_var( 'show_price' ),
			'show_location'    => $this->_var( 'show_location' ),
			'show_more_button' => $this->_var( 'show_more_button' ),
			'more_button_text' => $this->_var( 'more_button_text' ),
			'template'         => $this->_var( 'template' ),
		) );

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}

	function _prepare_template_select() {

		if ( ! function_exists( 'cherry_re_templater' ) ) {
			return array();
		}

		return cherry_re_templater()->get_property_templates_list();
	}
}

new Tm_Builder_Cherry_RE_Property_List;
