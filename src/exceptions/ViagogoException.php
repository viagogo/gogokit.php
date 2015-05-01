<?php

namespace Viagogo\Exceptions;

/**
 * Class ViagogoException
 * @package Viagogo
 */
abstract class ViagogoException extends \Exception {
	protected $errorResource;
	public function __construct($errorResource, $code = 0, \Exception $previous = null) {
		$this->errorResource = $errorResource;

		parent::__construct($errorResource, $code, $previous);
	}

	public function __toString() {
		return $this->errorResource;
	}
}