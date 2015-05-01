<?php

namespace Viagogo\Exceptions;

/**
 *
 */
class RequestException extends ViagogoException {
	public function __toString() {
		return $this->getMessage() . "\n" . $this->getCode() . "\n";
	}
}