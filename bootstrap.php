<?php
/**
 * Plugin bootstrap.
 *
 * @package   Structure
 * @copyright Copyright (c) 2017 Cedaro, LLC
 * @license   GPL-2.0+
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Cedaro\WP\Plugin\Container;
use Cedaro\WP\Plugin\PluginFactory;
use Cedaro\WP\Plugin\Provider\I18n;
use Structure\ServiceProvider;

/**
 * Load the Composer autoloader.
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require( __DIR__ . '/vendor/autoload.php' );
}

// Create the main plugin instance.
$structure = PluginFactory::create(
	'structure',
	__DIR__ . '/structure.php'
);

// Register a service provider.
$structure
	->get_container()
	->register( new ServiceProvider() );

// Register hook providers.
$structure->register_hooks( new I18n() );
