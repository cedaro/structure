<?php
/**
 * Main plugin class.
 *
 * @package   Structure
 * @copyright Copyright (c) 2025 Cedaro, LLC
 * @license   MIT
 */

declare ( strict_types = 1 );

namespace Structure;

use Structure\Plugin\Provider\I18n;
use Structure\Plugin\Plugin as BasePlugin;

/**
 * Main plugin class.
 */
class Plugin extends BasePlugin {
	/**
	 * Compose the object graph.
	 */
	public function compose() {
		// Register hook providers.
		$this->register_hooks( new I18n() );
	}
}
