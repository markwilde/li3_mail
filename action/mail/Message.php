<?php

namespace li3_mail\action\mail;

use BadMethodCallException;

class Message extends \lithium\core\Object {

	protected $_autoConfig = array(
		'transport'
	);

	protected $to = null;

	protected $from = null;

	protected $subject = null;

	protected $body = null;

	public function headers() {
		return null;
	}

	public function from($address = null) {
		if($address) {
			return $this->from = $address;
		}
		return $this->from;
	}

	public function to($address = null) {
		if($address) {
			return $this->to = $address;
		}
		return $this->to;
	}

	public function subject($subject = null) {
		if($subject) {
			return $this->subject = $subject;
		}
		return $this->subject;
	}

	public function body($body = null) {
		if($body) {
			return $this->body = $body;
		}
		return $this->body;
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