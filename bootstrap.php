<?php
/**
 * Plugin bootstrap.
 *
 * @package   Structure
 * @copyright Copyright (c) 2017 Cedaro, LLC
 * @license   GPL-2.0+
 */

namespace Structure;

use Cedaro\WP\Plugin\PluginFactory;
use Cedaro\WP\Plugin\Provider\I18n;
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

// Create the main plugin instance.
$structure = PluginFactory::create( 'structure', __FILE__ );

$container = new Container();
$container->register( new ServiceProvider() );

// Register a service provider.
$structure
	->set_container( $container )
	->register( new ServiceProvider() );

// Register hook providers.
$structure->register_hooks( new I18n() );
