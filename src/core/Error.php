<?php

namespace Viagogo\Core;
/**
 *
 */
class Error extends ViagogoModel {
	protected $code;
	protected $message;
	protected $errors;

	public function getCode() {
		return $this->code;
	}

	public function getMessage() {
		return $this->message;
	}

	public function getErrors() {
		return $this->errors;
	}
}