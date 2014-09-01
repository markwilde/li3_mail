<?php

namespace li3_mail\action\mail;

use BadMethodCallException;

class Message extends \lithium\core\Object {

	protected $_autoConfig = array(
		'transport'
	);

	public $to = null;

	public $from = null;

	public $subject = null;

	public $body = null;

	public function headers() {
		return null;
	}

	public function validates() {
		return true;
	}

	public function send() {
		$method = __FUNCTION__;
		if ($transport = $this->_transport) {
			return call_user_func_array(array(&$transport, $method), array($this));
		}
		$message = "No transport bound to call `{$method}`.";
		throw new BadMethodCallException($message);
	}

}

?>