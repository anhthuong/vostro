<?php
class Tm_Builder_Product extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Product', 'power-builder-integrator' );
		$this->icon = 'f07a';
		$this->slug = 'tm_pb_product';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'sku',
			'id',
			'module_id',
			'module_class',
		);
	}

	function get_fields() {

		$fields = array(
			'id' => array(
				'label'           => esc_html__( 'Product ID', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
			),
			'sku' => array(
				'label'           => esc_html__( 'Product SKU', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
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
				'sku',
				'id',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'woocommerce', 'product' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func(
			$callback,
			array(
				'sku' => $this->_var( 'sku' ),
				'id'  => $this->_var( 'id' ),
			)
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}
}

new Tm_Builder_Product;
