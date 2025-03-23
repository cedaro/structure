<?php
/**
 * Container class.
 *
 * @package   Structure
 * @copyright Copyright (c) 2025 Cedaro, LLC
 * @license   MIT
 */

declare ( strict_types = 1 );

namespace Structure;

use Structure\Pimple\Container as PimpleContainer;
use Structure\Plugin\ContainerInterface;

/**
 * Container.
 *
 * @package Structure
 */
class Container extends PimpleContainer implements ContainerInterface {
	/**
	 * Finds an entry of the container by its identifier and returns it.
	 *
	 * @param string $id Identifier of the entry to look for.
	 * @return mixed Entry.
	 */
	public function get( $id ) {
		return $this->offsetGet( $id );
	}

	/**
	 * Whether the container has an entry for the given identifier.
	 *
	 * @param string $id Identifier of the entry to look for.
	 * @return bool
	 */
	public function has( $id ): bool {
		return $this->offsetExists( $id );
	}
}
