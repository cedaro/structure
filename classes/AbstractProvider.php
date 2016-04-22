<?php
/**
 * Base hook provider.
 *
 * @package   Structure
 * @copyright Copyright (c) 2016, Cedaro, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Base hook provider class.
 *
 * @package Structure
 * @since   1.0.0
 */
abstract class Structure_AbstractProvider {
	/**
	 * Plugin instance.
	 *
	 * @since 1.0.0
	 * @var Structure_Plugin
	 */
	protected $plugin;

	/**
	 * Set a reference to the main plugin instance.
	 *
	 * @since 1.0.0
	 *
	 * @param Structure_Plugin $plugin Main plugin instance.
	 */
	public function set_plugin( $plugin ) {
		$this->plugin = $plugin;
		return $this;
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 */
	abstract public function register_hooks();
}
