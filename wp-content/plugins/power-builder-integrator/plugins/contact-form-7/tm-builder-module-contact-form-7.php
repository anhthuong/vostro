<?php
class Tm_Builder_Contact_Form_7 extends Tm_Builder_Module {

	function init() {
		$this->name = esc_html__( 'Contact Form 7', 'power-builder-integrator' );
		$this->icon = 'f0e0';
		$this->slug = 'tm_pb_contact_form_7';
		$this->main_css_element = '%%order_class%%.' . $this->slug;

		$this->whitelisted_fields = array(
			'id',
		);

		$this->fields_defaults = array(
			'id' => array( '' ),
		);
	}

	function get_fields() {

		$fields = array(
			'id' => array(
				'label'           => esc_html__( 'Contact form 7 instance', 'power-builder-integrator' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => $this->get_contact_form_7_list(),
				'description'     => esc_html__( 'Choose contact form, which has already been created', 'power-builder-integrator' ),
			),
		);
		return $fields;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {

		$this->set_vars(
			array( 'id' )
		);

		$callback = power_builder_integrator()->get_shortcode_cb( 'contact-form-7', 'contact-form-7' );

		if ( ! is_callable( $callback ) ) {
			return;
		}

		$content = call_user_func(
			$callback,
			array(
				'id' => $this->_var( 'id' ),
			),
			null,
			'contact-form-7'
		);

		$output = $this->wrap_clean( $content, array(), $function_name );

		return $output;
	}

	/**
	 * Get contact form 7 avaliable form items
	 *
	 * @return array
	 */
	public function get_contact_form_7_list() {
		$result_array = array();

		$posts_query = new WP_Query(
			array(
				'post_type' => 'wpcf7_contact_form',
				'order'     => 'ASC',
			)
		);

		if ( ! is_wp_error( $posts_query ) ) {
			if ( $posts_query->have_posts() ) {
				while ( $posts_query->have_posts() ) : $posts_query->the_post();
					$post_id  = $posts_query->post->ID;
					$post_title = get_the_title( $post_id );

					$result_array[ $post_id ] = $post_title;
				endwhile;

				return $result_array;
			} else {
				// Posts not found
				return $result_array;
			}
		} else {
			// Query error result
			return $result_array;
		}

	}

}

new Tm_Builder_Contact_Form_7;
