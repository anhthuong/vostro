<?php
class Tm_Builder_Cherry_Testi extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Cherry Testimonials', 'power-builder-integrator' );
		$this->icon = 'f10d';
		$this->slug = 'tm_pb_cherry_testi';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'type',
			'sup_title',
			'title',
			'sub_title',
			'limit',
			'orderby',
			'order',
			'category',
			'ids',
			'size',
			'content_length',
			'divider',
			'show_avatar',
			'show_email',
			'show_position',
			'show_company',
			'autoplay',
			'effect',
			'loop',
			'pagination',
			'navigation',
			'slides_per_view',
			'slides_per_view_laptop',
			'slides_per_view_tablet',
			'slides_per_view_phone',
			'space_between',
			'space_between_laptop',
			'space_between_tablet',
			'space_between_phone',
			'template',
			'custom_class',
			'module_id',
			'module_class',
		);

		$this->fields_defaults = array(
			'limit'                  => array( '3' ),
			'order'                  => array( 'desc' ),
			'orderby'                => array( 'date' ),
			'size'                   => array( '100' ),
			'divider'                => array( 'off' ),
			'show_avatar'            => array( 'on' ),
			'show_email'             => array( 'on' ),
			'show_position'          => array( 'on' ),
			'show_company'           => array( 'on' ),
			'content_length'         => array( '55' ),
			'type'                   => array( 'list' ),
			'autoplay'               => array( '7000' ),
			'effect'                 => array( 'slide' ),
			'loop'                   => array( 'on' ),
			'pagination'             => array( 'on' ),
			'navigation'             => array( 'on' ),
			'slides_per_view'        => array( '1' ),
			'slides_per_view_laptop' => array( '1' ),
			'slides_per_view_tablet' => array( '1' ),
			'slides_per_view_phone'  => array( '1' ),
			'space_between'          => array( '15' ),
			'space_between_laptop'   => array( '15' ),
			'space_between_tablet'   => array( '15' ),
			'space_between_phone'    => array( '15' ),
			'template'               => array( 'default.tmpl' ),
		);
	}

	function get_fields() {
		$fields = array(
			'source' => array(
				'label'           => esc_html__( 'Choose Source', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'category' => esc_html__( 'Categories', 'power-builder-integrator' ),
					'ids'      => esc_html__( 'Testimonial ids', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_category',
					'#tm_pb_ids',
				),
			),
			'category' => array(
				'label'            => esc_html__( 'Include categories', 'power-builder-integrator' ),
				'description'      => esc_html__( 'Choose which categories you would like to include.', 'power-builder-integrator' ),
				'option_category'  => 'basic_option',
				'renderer'         => 'tm_builder_include_categories_option',
				'renderer_options' => array(
					'use_terms'  => true,
					'term_name'  => 'tm-testimonials_category',
					'input_name' => 'tm_pb_category',
				),
				'depends_show_if' => 'category',
			),
			'ids' => array(
				'label'           => esc_html__( 'Include post id', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Enter post id you would like to include. The separator gap. Example: 256 472 23 6', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'text',
				'depends_show_if' => 'ids',
			),
			'limit' => array(
				'label'           => esc_html__( 'Posts count ( Set -1 to show all )', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => -1,
					'max'  => 30,
					'step' => 1,
				),
				'default' => '3',
			),
			'order' => array(
				'label'           => esc_html__( 'Order', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Testimonials order.', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'desc' => esc_html__( 'Descending', 'power-builder-integrator' ),
					'asc'  => esc_html__( 'Ascending', 'power-builder-integrator' ),
				),
			),
			'orderby' => array(
				'label'           => esc_html__( 'Order by', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Order testimonials by.', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'date'     => esc_html__( 'Date', 'power-builder-integrator' ),
					'none'     => esc_html__( 'None', 'power-builder-integrator' ),
					'id'       => esc_html__( 'ID', 'power-builder-integrator' ),
					'title'    => esc_html__( 'Author', 'power-builder-integrator' ),
					'name'     => esc_html__( 'Slug', 'power-builder-integrator' ),
					'modified' => esc_html__( 'Last modified date', 'power-builder-integrator' ),
					'rand'     => esc_html__( 'Random', 'power-builder-integrator' ),
				),
			),
			'sup_title' => array(
				'label'           => esc_html__( 'Super Title', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
			),
			'title' => array(
				'label'           => esc_html__( 'Title', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
			),
			'sub_title' => array(
				'label'           => esc_html__( 'Sub Title', 'power-builder-integrator' ),
				'type'            => 'text',
				'option_category' => 'configuration',
			),
			'divider' => array(
				'label'           => esc_html__( 'Show Divider', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Toggle a separator between title & testimonials.', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
				),
			),
			'show_avatar' => array(
				'label'           => esc_html__( 'Show Avatar', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_size',
				),
			),
			'size' => array(
				'label'          => esc_html__( 'Avatar Size', 'power-builder-integrator' ),
				'description'    => esc_html__( 'Select avatar size.', 'power-builder-integrator' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => 1,
					'max'  => 512,
					'step' => 1,
				),
				'default'         => '100',
				'depends_show_if' => 'on',
			),
			'show_email' => array(
				'label'           => esc_html__( 'Show E-mail', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_position' => array(
				'label'   => esc_html__( 'Show Position', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'show_company' => array(
				'label'   => esc_html__( 'Show Company Name', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'content_length' => array(
				'label'           => esc_html__( 'Content Length', 'power-builder-integrator' ),
				'description'     => esc_html__( 'Insert the number of words you want to show in the post content.', 'power-builder-integrator' ),
				'option_category' => 'configuration',
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => -1,
					'max'  => 100,
					'step' => 1,
				),
				'default' => '55',
			),
			'type' => array(
				'label'           => esc_html__( 'Type', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => array(
					'list'   => esc_html__( 'List', 'power-builder-integrator' ),
					'slider' => esc_html__( 'Slider', 'power-builder-integrator' ),
				),
				'affects' => array(
					'#tm_pb_autoplay',
					'#tm_pb_effect',
					'#tm_pb_loop',
					'#tm_pb_pagination',
					'#tm_pb_navigation',
					'#tm_pb_slides_per_view',
					'#tm_pb_space_between',
				),
			),
			'autoplay' => array(
				'label'           => esc_html__( 'Autoplay, ms ( Set 0 to stop autoplay )', 'power-builder-integrator' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'depends_show_if' => 'slider',
				'range_settings'  => array(
					'min'  => 0,
					'max'  => 10000,
					'step' => 500,
				),
				'default' => '7000',
			),
			'effect' => array(
				'label'           => esc_html__( 'Effect', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'depends_show_if' => 'slider',
				'options'         => array(
					'slide'     => esc_html__( 'Slide', 'power-builder-integrator' ),
					'coverflow' => esc_html__( 'Coverflow', 'power-builder-integrator' ),
				),
			),
			'loop' => array(
				'label'           => esc_html__( 'Enable loop mode', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'depends_show_if' => 'slider',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'pagination' => array(
				'label'           => esc_html__( 'Display pagination', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'depends_show_if' => 'slider',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'navigation' => array(
				'label'           => esc_html__( 'Display navigation', 'power-builder-integrator' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'depends_show_if' => 'slider',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'power-builder-integrator' ),
					'off' => esc_html__( 'No', 'power-builder-integrator' ),
				),
			),
			'slides_per_view' => array(
				'label'           => esc_html__( 'Number of slides per view', 'power-builder-integrator' ),
				'description'     => esc_html__( "Slides visible at the same time on slider's container", 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'depends_show_if' => 'slider',
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => 1,
					'max'  => 4,
					'step' => 1,
				),
				'default'        => '1',
				'mobile_options' => true,
				'mobile_global'  => true,
			),
			'space_between' => array(
				'label'           => esc_html__( 'Distance between slides (px)', 'power-builder-integrator' ),
				'option_category' => 'basic_option',
				'depends_show_if' => 'slider',
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'default'        => '15',
				'mobile_options' => true,
				'mobile_global'  => true,
			),
			'template' => array(
				'label'           => esc_html__( 'Layout', 'power-builder-integrator' ),
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
				'type',
				'sup_title',
				'title',
				'sub_title',
				'limit',
				'orderby',
				'order',
				'category',
				'ids',
				'size',
				'content_length',
				'divider',
				'show_avatar',
				'show_email',
				'show_position',
				'show_company',
				'autoplay',
				'effect',
				'loop',
				'pagination',
				'navigation',
				'slides_per_view',
				'slides_per_view_laptop',
				'slides_per_view_tablet',
				'slides_per_view_phone',
				'space_between',
				'space_between_laptop',
				'space_between_tablet',
				'space_between_phone',
				'template',
				'custom_class',
			)
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'cherry-testi', 'tm_testimonials' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func( $callback, array(
			'category'               => $this->_var( 'category' ),
			'ids'                    => $this->_var( 'ids' ),
			'limit'                  => $this->_var( 'limit' ),
			'order'                  => $this->_var( 'order' ),
			'orderby'                => $this->_var( 'orderby' ),
			'sup_title'              => $this->_var( 'sup_title' ),
			'title'                  => $this->_var( 'title' ),
			'sub_title'              => $this->_var( 'sub_title' ),
			'size'                   => $this->_var( 'size' ),
			'content_length'         => $this->_var( 'content_length' ),
			'divider'                => $this->_var( 'divider' ),
			'show_avatar'            => $this->_var( 'show_avatar' ),
			'show_email'             => $this->_var( 'show_email' ),
			'show_position'          => $this->_var( 'show_position' ),
			'show_company'           => $this->_var( 'show_company' ),
			'type'                   => $this->_var( 'type' ),
			'autoplay'               => $this->_var( 'autoplay' ),
			'effect'                 => $this->_var( 'effect' ),
			'loop'                   => $this->_var( 'loop' ),
			'pagination'             => $this->_var( 'pagination' ),
			'navigation'             => $this->_var( 'navigation' ),
			'slides_per_view'        => $this->_var( 'slides_per_view' ),
			'slides_per_view_laptop' => $this->_var( 'slides_per_view_laptop' ),
			'slides_per_view_tablet' => $this->_var( 'slides_per_view_tablet' ),
			'slides_per_view_phone'  => $this->_var( 'slides_per_view_phone' ),
			'space_between'          => $this->_var( 'space_between' ),
			'space_between_laptop'   => $this->_var( 'space_between_laptop' ),
			'space_between_tablet'   => $this->_var( 'space_between_tablet' ),
			'space_between_phone'    => $this->_var( 'space_between_phone' ),
			'template'               => $this->_var( 'template' ),
		) );

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}

	function _prepare_template_select() {

		if ( ! class_exists( 'TM_Testimonials_Page_Template' ) ) {
			return array();
		}

		$page_templater = TM_Testimonials_Page_Template::get_instance();

		return $page_templater->get_templates_list();
	}
}

new Tm_Builder_Cherry_Testi;
