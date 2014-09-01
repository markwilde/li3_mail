<?php

namespace li3_mail\extensions\adapter\mail;

class Php extends \li3_mail\extensions\adapter\Mail {

	public function send($message, array $options = array()) {
		if($message->validates()) {
			return mail($message->to, $message->subject, $message->body, $message->headers());
		}
		return false;
	}

}

?>