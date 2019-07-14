<?php
/**
 * Processor types handling
 *
 * Handles all available processor types.
 *
 * @package Features
 * @author  Pierre Lannoy <https://pierre.lannoy.fr/>.
 * @since   1.0.0
 */

namespace Decalog\Plugin\Feature;

/**
 * Define the processor types functionality.
 *
 * Handles all available processor types.
 *
 * @package Features
 * @author  Pierre Lannoy <https://pierre.lannoy.fr/>.
 * @since   1.0.0
 */
class ProcessorTypes {

	/**
	 * The array of available processors.
	 *
	 * @since  1.0.0
	 * @var    array    $processors    The available processors.
	 */
	private $processors = [ 'IntrospectionProcessor', 'WWWProcessor', 'WordpressProcessor' ];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->processors[] = [
			'id'     => 'IntrospectionProcessor',
			'name'   => esc_html__( 'PHP introspection', 'decalog' ),
			'help'   => esc_html__( 'Allows to log line, file, class and function generating the event.', 'decalog' ),
			'params' => [],
		];
		$this->processors[] = [
			'id'     => 'WWWProcessor',
			'name'   => esc_html__( 'HTTP request', 'decalog' ),
			'help'   => esc_html__( 'Allows to log url, method, referrer and remote IP of the current web request.', 'decalog' ),
			'params' => [ 'null', 'null', 'obfuscation' ],
		];
		$this->processors[] = [
			'id'     => 'WordpressProcessor',
			'name'   => esc_html__( 'WordPress ', 'decalog' ),
			'help'   => esc_html__( 'Allows to log site, user and remote IP of the current request.', 'decalog' ),
			'params' => [ 'pseudonymisation', 'obfuscation' ],
		];
	}

	/**
	 * Get the processors list.
	 *
	 * @return  array   A list of all available processors.
	 * @since    1.0.0
	 */
	public function get_all() {
		return $this->processors;
	}

	/**
	 * Get a specific processor.
	 *
	 * @param   string  The processor id.
	 * @return  null|array   The detail of the processor, null if not found.
	 * @since    1.0.0
	 */
	public function get( $id ) {
		foreach ( $this->processors as $processor ) {
			if ( $processor['id'] === $id ) {
				return $processor;
			}
		}
		return null;
	}

}