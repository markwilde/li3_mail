<?php

namespace li3_mail\action\mail;

use BadMethodCallException;

class Message extends \lithium\core\Object {

	protected $_autoConfig = array(
		'queue'
	);

	public $to = null;

	public $from = null;

	public $subject = null;

	public $body = null;

	public function send() {
		$method = __FUNCTION__;
		if ($transport = $this->_transport) {
			return call_user_func_array(array(&$transport, $method), array($this));
		}
		$message = "No queue bound to call `{$method}`.";
		throw new BadMethodCallException($message);
	}

}

?>