<?php

namespace li3_mail\extensions\adapter;

abstract class Mail extends \lithium\core\Object {

	/**
	 * The list of object properties to be automatically assigned from configuration passed to
	 * `__construct()`.
	 *
	 * @var array
	 */
	protected $_autoConfig = array('classes' => 'merge');

	/**
	 * Class dependencies.
	 *
	 * @var array
	 */
	protected $_classes = array(
		'message' => 'li3_mail\action\mail\Message'
	);

	public function create(array $options = array()) {
		$defaults = array('class' => 'message');
		$options += $defaults;

		$class = $options['class'];
		$params = array(
			'transport' => $this
		);
		return $this->invokeMethod('_instance', array($class, $params));
	}

	abstract public function send($message, array $options = array());

}

?>