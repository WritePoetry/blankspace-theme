<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankTheme
 * @subpackage        WritePoetry/BlankTheme/Styles
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankTheme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Main_Theme_Assets' ) ) :

	/**
	 * The Assets class
	 */
	class Main_Theme_Assets extends Assets {
		
		private $theme_name;
		

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			parent::__construct();
			
			// Get the theme name.
			$this->theme_name = get_template();
			
			
			add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
		}

		/**
		 * Load Parent theme front-end assets.
		 *
		 * @return void
		 */
		public function load_assets() {
		
			$js = $this->get_files( $this->assets_js_path );
			// Load theme assets.
			$this->load_theme_assets( $js, $this->get_files( $this->assets_css_path ), $this->theme_name );

			// Load active plugin assets.
			$this->load_plugins_assets( $this->theme_name );
		}
		
		
		private function get_files( $file_path ) {
			 
			
			// Get the asset files.
			return $this->get_dependencies_files_from_folder( get_parent_theme_file_path( $file_path ) );			
		}
	}
endif;
