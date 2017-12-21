<?php
/**
 * Environment ompatibility checks and notices.
 *
 * @package   Structure
 * @copyright Copyright (c) 2017 Cedaro, LLC
 * @license   GPL-2.0+
 */

/**
 * Class for checking environment compatibility.
 *
 * @package Structure
 */
class Structure_Compatibility {
	/**
	 * Minimum PHP version.
	 *
	 * @var string
	 */
	const MINIMUM_PHP_VERSION = '5.4';

	/**
	 * Minimum WordPress version.
	 *
	 * @var string
	 */
	const MINIMUM_WORDPRESS_VERSION = '4.9';

	/**
	 * Display a notice about the minimum PHP version supported.
	 */
	public static function display_php_version_notice() {
		$notice = sprintf(
			esc_html__( 'Structure requires PHP %s or later to run. Your current version is %s.', 'structure' ),
			self::MINIMUM_PHP_VERSION,
			phpversion()
		);

		self::display_notice( $notice );
	}

	/**
	 * Display a notice about the minimum WordPress version supported.
	 */
	public static function display_wordpress_version_notice() {
		$notice = sprintf(
			esc_html__( 'Structure requires WordPress %s or later to run. Your current version is %s.', 'structure' ),
			self::MINIMUM_WORDPRESS_VERSION,
			$GLOBALS['wp_version']
		);

		self::display_notice( $notice );
	}

	/**
	 * Display an admin notice.
	 *
	 * @param string $message Message to print.
	 * @param string $type    Type of notice.
	 */
	protected static function display_notice( $message, $type = 'error' ) {
		?>
		<div class="structure-compatibility-notice notice notice-<?php echo esc_attr( $type ); ?>">
			<p>
				<?php
				echo wp_kses( $message, array(
					'a' => array( 'href' => true ),
				) );
				?>
			</p>
		</div>
		<?php
	}
}
