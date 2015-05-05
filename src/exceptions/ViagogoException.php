<?php

namespace Viagogo\Exceptions;

/**
 * Class ViagogoException
 * @package Viagogo
 */
abstract class ViagogoException extends \Exception {
	public $errorMessage;
	public $statusCode;

	public function __construct($statusCode, $errorMessage, $code = 0, \Exception $previous = null) {
		$this->errorMessage = $errorMessage;
		$this->statusCode = $statusCode;

		parent::__construct($errorMessage, $code, $previous);
	}

	public function __toString() {
		return get_class($this) . ': [status code] ' . $this->statusCode . ' [message] ' . $this->errorMessage . " in " . $this->getFile() . "\nInner exception: \n" . parent::__toString();
	}
}