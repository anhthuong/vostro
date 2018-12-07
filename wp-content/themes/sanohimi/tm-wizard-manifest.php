<?php
/**
 * Plugins configuration example.
 *
 * @var array
 */
$plugins = array(
				'contact-form-7' => array(
						'name' => esc_html__( 'Contact Form 7', 'sanohimi' ),
						'access' => 'skins',
				),
				'cherry-sidebars' => array(
						'name' => esc_html__( 'Cherry Sidebars', 'sanohimi' ),
						'access' => 'skins',
				),
				'power-builder' => array(
						'name'   => esc_html__( 'Power Builder', 'sanohimi' ),
						'source' => 'remote',
						'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-upd.zip',
						'access' => 'skins',
				),
				'power-builder-integrator' => array(
						'name'   => esc_html__( 'Power Builder Integrator', 'sanohimi' ),
						'source' => 'remote',
						'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-integrator.zip',
						'access' => 'skins',
				),
				'hotel-booking' => array(
						'name'   => esc_html__( 'Hotel Booking', 'sanohimi' ),
						'source' => 'local',
						'path'   => SANOHIMI_THEME_DIR . '/assets/plugins/hotel-booking.zip',
						'access' => 'skins',
				),
				'mp-restaurant-menu' => array(
					'name' => esc_html__( 'Restaurant Menu by MotoPress', 'sanohimi' ),
					'access' => 'skins',
				),
				'simple-file-downloader' => array(
						'name'   => esc_html__( 'Simple File Downloader', 'sanohimi' ),
						'access' => 'skins',
				),
				'tm-photo-gallery' => array(
						'name'   => esc_html__( 'TM Photo Gallery', 'sanohimi' ),
						'access' => 'skins',
				),
				'cherry-search' => array(
						'name' => esc_html__( 'Cherry Search', 'sanohimi' ),
						'access' => 'skins',
				),
				'cherry-data-importer' => array(
						'name'   => esc_html__( 'Cherry Data Importer', 'sanohimi' ),
						'source' => 'remote',
						'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
						'access' => 'base',
				),
				'cherry-socialize' => array(
						'name' => esc_html__( 'Cherry Socialize', 'sanohimi' ),
						'access' => 'skins',
				),
	);

/**
 * Skins configuration example
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'cherry-data-importer',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
								'contact-form-7',
								'cherry-sidebars',
								'power-builder',
								'power-builder-integrator',
								'hotel-booking',
								'mp-restaurant-menu',
								'simple-file-downloader',
								'tm-photo-gallery',
								'cherry-search',
								'cherry-socialize'
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp.template-help.com/wordpress_64142',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default/default-thumb.png',
			'name'  => esc_html__( 'Sanohimi', 'sanohimi' ),
		),
	),
);

$texts = array(
	'theme-name' => 'Sanohimi'
);
