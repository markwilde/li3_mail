<?php

namespace li3_mail\action;

class Mail extends \lithium\core\Adaptable {

	/**
	 * Libraries::locate() compatible path to adapters for this class.
	 *
	 * @see lithium\core\Libraries::locate()
	 * @var string Dot-delimited path.
	 */
	protected static $_adapters = 'adapter.mail';

	/**
	 * Re-define configurations to avoid overwrite configurations of other adapters
	 * @var array the configurations
	 */
	protected static $_configurations = array();

	/**
	 * Creates from the specified queue configuration
	 *
	 * @param string $name Configuration to be used for reading
	 * @param mixed $data Data to create message
	 * @param mixed $options Options for the method
	 * @return boolean True on successful cache write, false otherwise
	 */
	public static function create($name, $data, array $options = array()) {
		$method = static::adapter($name)->create($data, $options);
		return $method;
	}

}

?>