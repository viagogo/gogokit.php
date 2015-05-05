<?php

namespace Viagogo\Exceptions;

/**
 *
 */
class RequestException extends ViagogoException {
	public function __toString() {
		return get_class($this) . ':' . $this->getMessage() . "\n" . $this->getCode() . "\n";
	}
}