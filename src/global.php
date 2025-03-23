<?php
/**
 * Global definitions.
 *
 * @package   Structure
 * @copyright Copyright (c) 2025 Cedaro, LLC
 * @license   MIT
 */

declare ( strict_types = 1 );

use Structure\Plugin;
use Structure\Plugin\PluginFactory;

/**
 * Main plugin instance.
 *
 * Provides access to the main plugin instance globally by calling structure().
 * Rather than use the default plugin, a custom plugin implementation is passed
 * to the factory using the create_with() method.
 *
 * @return Plugin
 */
function structure(): Plugin {
	static $instance;

	if ( ! $instance ) {
		$instance = PluginFactory::create_with(
			new Plugin(),
			'structure',
			dirname( __DIR__ ) . '/structure.php'
		);
	}

	return $instance;
}
