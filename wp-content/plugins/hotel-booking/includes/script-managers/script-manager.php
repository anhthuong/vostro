<?php

namespace MPHB\ScriptManagers;

abstract class ScriptManager {

	/**
	 *
	 * @var array
	 */
	protected $styleDependencies = array();

	/**
	 *
	 * @var string[]
	 */
	protected $scriptDependencies = array( 'jquery' );

	public function addDependency( $dependency ){
		$this->scriptDependencies[] = $dependency;
	}

	public function addStyleDependency( $dependency ){
		$this->styleDependencies[] = $dependency;
	}

	/**
	 *
	 * @param string $locale Optional.
	 * @return string
	 */
	protected function getDatepickerLocale( $locale = null ){
		$availableLocales = include('datepick-locales.php');
		if ( is_null( $locale ) ) {
			$locale = get_locale();
		}
		if ( !in_array( $locale, $availableLocales ) ) {
			$locale = substr( $locale, 0, 2 );
			if ( !in_array( $locale, $availableLocales ) ) {
				$locale = 'en_US';
			}
		}
		return $locale;
	}

	protected function registerDatepickerLocalization(){

		$locale = $this->getDatepickerLocale();

		if ( $locale === 'en_US' ) {
			// en_US is default locale for datepicker and not needs localization
			return;
		}

		$datepickerLocale = str_replace( '-', '_', $locale );

		$datepickerLocaleFile = MPHB()->getPluginUrl( "vendors/kbwood/datepick/jquery.datepick-{$datepickerLocale}.js" );

		wp_register_script( 'mphb-kbwood-datepick-localization', $datepickerLocaleFile, array( 'mphb-kbwood-datepick' ), MPHB()->getVersion(), true );

		$this->addDependency( 'mphb-kbwood-datepick-localization' );
	}

	public function register(){
		wp_register_script( 'mphb-canjs', MPHB()->getPluginUrl( 'vendors/canjs/can.custom.min.js' ), array( 'jquery' ), MPHB()->getVersion(), true );
		$this->addDependency( 'mphb-canjs' );

		wp_register_script( 'mphb-kbwood-plugin', MPHB()->getPluginUrl( 'vendors/kbwood/datepick/jquery.plugin.min.js' ), array( 'jquery' ), MPHB()->getVersion(), true );
		wp_register_script( 'mphb-kbwood-datepick', MPHB()->getPluginUrl( 'vendors/kbwood/datepick/jquery.datepick.min.js' ), array( 'jquery', 'mphb-kbwood-plugin' ), MPHB()->getVersion(), true );
		$this->addDependency( 'mphb-kbwood-datepick' );

		$this->registerDatepickerLocalization();

		$this->registerStyles();
	}

	protected function registerStyles(){
		wp_register_style( 'mphb-kbwood-datepick-css', MPHB()->getPluginUrl( 'vendors/kbwood/datepick/jquery.datepick.css' ), null, MPHB()->getVersion() );
		$this->addStyleDependency( 'mphb-kbwood-datepick-css' );
	}

	abstract public function enqueue();
}
