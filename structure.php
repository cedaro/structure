<?php
/**
 * Plugin Name: Structure
 * Plugin URI:  https://github.com/cedaro/structure
 * Description: An example plugin demonstrating a lightweight method for adding a bit of structure to plugins.
 * Version:     1.0.0
 * Author:      Cedaro
 * Author URI:  https://www.cedaro.com/
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: structure
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STRUCTURE_VERSION', '0.1.0' );

/**
 * Load the compatibility checker.
 */
require_once( dirname( __FILE__ ) . '/includes/compatibility.php' );

/**
 * Load the plugin or display a notice about requirements.
 */
if ( version_compare( phpversion(), Structure_Compatibility::MINIMUM_PHP_VERSION, '<' ) ) {
	$action = is_multisite() ? 'network_admin_notices' : 'admin_notices';
	add_action( $action, array( 'Structure_Compatibility', 'display_php_version_notice' ) );
} elseif( version_compare( $GLOBALS['wp_version'], Structure_Compatibility::MINIMUM_WORDPRESS_VERSION, '<' ) ) {
	$action = is_multisite() ? 'network_admin_notices' : 'admin_notices';
	add_action( $action, array( 'Structure_Compatibility', 'display_wordpress_version_notice' ) );
} else {
	require( dirname( __FILE__ ) . '/bootstrap.php' );
}
