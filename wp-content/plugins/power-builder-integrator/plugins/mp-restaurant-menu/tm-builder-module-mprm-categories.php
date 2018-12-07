<?php
class Tm_Builder_Mprm_Categories extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Restaurant Categories', 'power-builder-integrator' );
		$this->icon = 'f0f4';
		$this->slug = 'tm_pb_menu_categories';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'view',
			'categ',
			'col',
			'categ_name',
			'feat_img',
			'categ_icon',
			'categ_descr',
			'desc_length',
			'module_id',
			'module_class',
		);
	}

	function get_fields() {

		$fields = array(
			'view' => array(
				'label'           => esc_html__( 'View mode', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'select',
				'options'         => array(
					'grid' => esc_html__( 'Grid', 'power-builder-integrator' ),
					'list' => esc_html__( 'List', 'power-builder-integrator' ),
				),
			),
			'categ' => array(
				'label'           => esc_html__( 'Categories', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
				'description'     => esc_html__( 'Comma separated categories IDs list', 'power-builder-integrator' ),
			),
			'col' => array(
				'label'           => esc_html__( 'Columns', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'select',
				'options'         => array(
					'1' => __( '1 column', 'power-builder-integrator' ),
					'2' => __( '2 columns', 'power-builder-integrator' ),
					'3' => __( '3 columns', 'power-builder-integrator' ),
					'4' => __( '4 columns', 'power-builder-integrator' ),
					'6' => __( '6 columns', 'power-builder-integrator' ),
				),
			),
			'categ_name' => array(
				'label'           => esc_html__( 'Show category name', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'tm_builder' ),
					'off' => esc_html__( 'No', 'tm_builder' ),
				),
			),
			'feat_img' => array(
				'label'           => esc_html__( 'Show featured image', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'tm_builder' ),
					'off' => esc_html__( 'No', 'tm_builder' ),
				),
			),
			'categ_icon' => array(
				'label'           => esc_html__( 'Show category icon', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'tm_builder' ),
					'off' => esc_html__( 'No', 'tm_builder' ),
				),
			),
			'categ_descr' => array(
				'label'           => esc_html__( 'Show description', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'tm_builder' ),
					'off' => esc_html__( 'No', 'tm_builder' ),
				),
			),
			'desc_length' => array(
				'label'           => esc_html__( 'Description length', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'power-builder-integrator' ),
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
				'view',
				'categ',
				'col',
				'categ_name',
				'feat_img',
				'categ_icon',
				'categ_descr',
				'desc_length',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'mp-restaurant-menu', 'mprm_categories' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func(
			$callback,
			array(
				'view'        => $this->_var( 'view' ),
				'categ'       => $this->_var( 'categ' ),
				'col'         => $this->_var( 'col' ),
				'categ_name'  => ( 'on' === $this->_var( 'categ_name' ) ) ? 1 : 0,
				'feat_img'    => ( 'on' === $this->_var( 'feat_img' ) ) ? 1 : 0,
				'categ_icon'  => ( 'on' === $this->_var( 'categ_icon' ) ) ? 1 : 0,
				'categ_descr' => ( 'on' === $this->_var( 'categ_descr' ) ) ? 1 : 0,
				'desc_length' => $this->_var( 'desc_length' ),
			)
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}
}

new Tm_Builder_Mprm_Categories;
