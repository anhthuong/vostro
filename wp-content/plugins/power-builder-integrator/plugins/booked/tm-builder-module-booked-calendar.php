<?php
class Tm_Builder_Booked_Calendar extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Booked Calendar', 'power-builder-integrator' );
		$this->icon = 'f274';
		$this->slug = 'tm_pb_booked_calendar';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'calendar',
			'year',
			'month',
			'switcher',
			'module_id',
			'module_class',
		);
	}

	function get_fields() {

		$fields = array(
			'calendar' => array(
				'label'           => esc_html__( 'Calendar ID', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
			),
			'year' => array(
				'label'           => esc_html__( 'Year', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
			),
			'month' => array(
				'label'           => esc_html__( 'Month', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => '',
			),
			'switcher' => array(
				'label'           => esc_html__( 'Show calendar switcher?', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'size' => array(
				'label'           => esc_html__( 'Calendar size', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'large' => esc_html__( 'Large', 'power-builder-integrator' ),
					'small' => esc_html__( 'Small', 'power-builder-integrator' ),
				),
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
				'calendar',
				'year',
				'month',
				'switcher',
				'size',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'booked', 'booked-calendar' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		if ( 'off' !== $this->_var( 'switcher' ) ) {
			$this->_var( 'switcher', 'true' );
		} else {
			$this->_var( 'switcher', false );
		}

		$content = call_user_func(
			$callback,
			array(
				'calendar' => $this->_var( 'calendar' ),
				'year'     => $this->_var( 'year' ),
				'month'    => $this->_var( 'month' ),
				'switcher' => $this->_var( 'switcher' ),
				'size'     => $this->_var( 'size' ),
			)
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}
}

new Tm_Builder_Booked_Calendar;
