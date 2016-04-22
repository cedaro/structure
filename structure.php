<?php
/**
 * Plugin Name: Structure
 * Plugin URI:  https://github.com/cedaro/structure
 * Description: An example plugin demonstrating a lightweight method for adding a bit of structure to plugins.
 * Version:     1.0.0
 * Author:      Cedaro
 * Author URI:  http://www.cedaro.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: structure
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Autoloader callback.
 *
 * Converts a class name to a file path and requires it if it exists.
 *
 * @since 1.0.0
 *
 * @param string $class Class name.
 */
function structure_autoloader( $class ) {
	if ( 0 !== strpos( $class, 'Structure_' ) ) {
		return;
	}

	$file  = dirname( __FILE__ ) . '/classes/';
	$file .= str_replace( array( 'Structure_', '_' ), array( '', '/' ), $class );
	$file .= '.php';

	if ( file_exists( $file ) ) {
		require_once( $file );
	}
}
spl_autoload_register( 'structure_autoloader' );

/**
 * Retrieve the main plugin instance.
 *
 * @since 1.0.0
 *
 * @return Structure_Plugin
 */
function structure() {
	static $instance;

	if ( null === $instance ) {
		$instance = new Structure_Plugin();
	}

	return $instance;
}

// Set up the main plugin instance.
structure()->set_basename( plugin_basename( __FILE__ ) )
           ->set_directory( plugin_dir_path( __FILE__ ) )
           ->set_file( __FILE__ )
           ->set_slug( 'structure' )
           ->set_url( plugin_dir_url( __FILE__ ) );

// Register hook providers.
structure()->register_hooks( new Structure_Provider_I18n() );

// Load the plugin.
add_action( 'plugins_loaded', array( structure(), 'load_plugin' ) );
