<?php
/**
 * Plugin service definitions.
 *
 * @package   Structure
 * @copyright Copyright (c) 2025 Cedaro, LLC
 * @license   MIT
 */

declare ( strict_types = 1 );

namespace Structure;

use Structure\Pimple\Container;
use Structure\Pimple\ServiceProviderInterface;

/**
 * Plugin service provider class.
 *
 * @package Structure
 */
class ServiceProvider implements ServiceProviderInterface {
	/**
	 * Register services.
	 *
	 * @param Container $container Container instance.
	 */
	public function register( Container $container ) {
		// @todo Define services.
	}
}
