<?php
/**
 * Structure
 *
 * @package   Structure
 * @copyright Copyright (c) 2025 Cedaro, LLC
 * @license   MIT
 *
 * @wordpress-plugin
 * Plugin Name: Structure
 * Plugin URI:  https://github.com/cedaro/structure
 * Description: An example plugin demonstrating a lightweight method for adding a bit of structure to plugins.
 * Version:     1.0.0
 * Author:      Cedaro
 * Author URI:  https://www.cedaro.com/
 * License:     MIT
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: structure
 * Domain Path: /languages
 * Requires PHP: 8.1
 */

declare ( strict_types = 1 );

namespace Structure;

use Structure\Container;
use Structure\ServiceProvider;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load the Composer autoloader.
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require( __DIR__ . '/vendor/autoload.php' );
}

// Create a container and register a service provider.
$container = new Container();
$container->register( new ServiceProvider() );

// Initialize the plugin, set the container.
$structure = structure()
	->set_container( $container );

add_action( 'plugins_loaded', [ $structure, 'compose' ], 5 );
