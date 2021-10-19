<?php

namespace app;

class TasksException extends \Exception {
	protected array $messages = [
		0 => 'This page isn`t exist',
		1 => 'Site under maintenance',
	];

	public function __construct($message = "", $code = 0)
	{
		parent::__construct($message, $code);

		// generating a message for the log
		$error = $this->getMessage() ? $this->getMessage() : $this->messages[$this->getCode()];
		$error .= "\r\n" . 'file ' . $this->getFile() . "\r\n" . 'in line ' . $this->getLine() . "\r\n";

		// message for the user: check project message list
		if ($this->messages[$this->getCode()]) {
			$this->message = $this->messages[$this->getCode()];
		}
	}
}