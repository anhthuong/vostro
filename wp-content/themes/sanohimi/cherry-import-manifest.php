<?php
/**
 * Default manifest file
 *
 * @var array
 */
$settings = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => esc_html__( 'Sanohimi', 'sanohimi' ),
			'full'     => get_template_directory() . '/assets/demo-content/default/default-full.xml',
			'lite'     => get_template_directory() . '/assets/demo-content/default/default-min.xml',
			'thumb'    => get_template_directory_uri() . '/assets/demo-content/default/default-thumb.png',
			'demo_url' => 'http://ld-wp.template-help.com/wordpress-64142',
		),
		
	),
	'import' => array(
		'chunk_size' => 3,
	),
	'export' => array(
		'options' => array(
			'cherry_projects_options',
			'cherry_projects_options_default',
			'cherry-team',
			'cherry-team_default',
			'cherry-services',
			'cherry-services_default',
		),
	),
	'slider'   => array(
        'path' => 'https://raw.githubusercontent.com/templatemonster/tm-wizard-slider/default/slides.json',
    ),
);
