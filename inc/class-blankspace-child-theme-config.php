<?php
/**
 * Main Init Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Config
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

namespace WritePoetry\BlankSpace;

/**
 * Main Init class for theme configuration
 */
class Child_Theme_Config extends Theme_Config {
	/**
	 * Stores the current active theme object.
	 *
	 * @var WP_Theme
	 */
	private static $theme;
	
	
	public static $theme_name;


	/**
	 * Initializes the theme object.
	 */
	public static function init() {
		self::$theme = wp_get_theme( self::get_theme_name() );
		self::$theme_name = self::get_theme_name();
	}

	/**
	 * Get the current theme version.
	 * Ensures the theme is initialized before accessing it.
	 *
	 * @return string|false Theme version or false if not available.
	 */
	public static function get_theme_version() {
		if ( ! self::$theme ) {
			self::init();
		}
		

		$theme_version = self::$theme->get( 'Version' );

		return is_string( $theme_version ) ? $theme_version : false;
	}

	/**
	 * Get the active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
	public static function get_theme_name() {
		return get_stylesheet();
	}
	
 
	/**
	 * Get the name of the parent active theme name.
	 *
	 * @return string Active theme name (stylesheet for child theme or template).
	 */
	public static function get_parent_theme_version() {
		return is_child_theme() ?  wp_get_theme( get_template() )->get( 'Version' )  : null;
	}
}
