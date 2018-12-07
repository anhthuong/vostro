<?php
class Tm_Builder_Recent_Products extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Recent Products', 'power-builder-integrator' );
		$this->icon = 'f07a';
		$this->slug = 'tm_pb_recent_products';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'per_page',
			'columns',
			'orderby',
			'order',
			'module_id',
			'module_class',
		);
	}

	function get_fields() {

		$fields = array(
			'per_page' => array(
				'label'           => esc_html__( 'Products Per Page', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '12',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '60',
					'step' => '1',
				),
			),
			'columns' => array(
				'label'           => esc_html__( 'Columns', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '4',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '6',
					'step' => '1',
				),
			),
			'orderby' => array(
				'label'             => esc_html__( 'Order By', 'power-builder-integrator' ),
				'type'              => 'select',
				'option_category'   => 'basic_option',
				'options'           => array(
					'date'   => esc_html__( 'Date', 'power-builder-integrator' ),
					'ID'     => esc_html__( 'Product ID', 'power-builder-integrator' ),
					'author' => esc_html__( 'Author', 'power-builder-integrator' ),
					'title'  => esc_html__( 'Title', 'power-builder-integrator' ),
					'name'   => esc_html__( 'Name', 'power-builder-integrator' ),
				),
			),
			'order' => array(
				'label'             => esc_html__( 'Order', 'power-builder-integrator' ),
				'type'              => 'select',
				'option_category'   => 'basic_option',
				'options'           => array(
					'DESC'   => esc_html__( 'DESC', 'power-builder-integrator' ),
					'ASC'     => esc_html__( 'ASC', 'power-builder-integrator' ),
				),
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'power-builder-integrator' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'power-builder-integrator' ),
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
				'per_page',
				'columns',
				'orderby',
				'order',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'woocommerce', 'recent_products' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func(
			$callback,
			array(
				'per_page' => $this->_var( 'per_page' ),
				'columns'  => $this->_var( 'columns' ),
				'orderby'  => $this->_var( 'orderby' ),
				'order'    => $this->_var( 'order' ),
			)
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}
}

new Tm_Builder_Recent_Products;
