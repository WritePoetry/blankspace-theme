<?php
/**
 * Blank Theme Frontend Class
 *
 * @package           WritePoetry/BlankSpace
 * @subpackage        WritePoetry/BlankSpace/Block_Bindings_API
 * @author            Giacomo Secchi <giacomo.secchi@gmail.com>
 * @copyright         2023 Giacomo Secchi
 * @license           GPL-2.0-or-later
 * @since             0.2.0
 */

 namespace WritePoetry\BlankSpace;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Block_Bindings_API' ) ) :

	/**
	 * The main Block_Bindings_API class
	 */
	class Block_Bindings_API {


		/**
		 * Setup class.
		 *
		 * @since 0.0.5
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_block_bindings' ) );
		}

		/**
		 * Register block bindings
		 *
		 * @since 0.0.5
		 */
		public function register_block_bindings() {

			$sources = array(
				'blankspace/copyright'   => array(
					'label'              => __( 'Copyright', 'blankspace' ),
					'get_value_callback' => array( $this, 'copyright_binding' ),
				),
				'blankspace/admin-email' => array(
					'label'              => __( 'Admin Email Address', 'blankspace' ),
					'get_value_callback' => array( $this, 'email_address_binding' ),
				),
			);

			foreach ( $sources as $source_name => $source_properties ) {
				register_block_bindings_source( $source_name, $source_properties );
			}
		}

		public function copyright_binding() {
			return '&copy; ' . date( 'Y' );
		}

		public function email_address_binding() {
			$admin_email = get_option( 'admin_email' );

			return '<a href="mailto:' . $admin_email . '">' . $admin_email . '</a>';
		}
	}
endif;