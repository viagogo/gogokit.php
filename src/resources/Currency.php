<?php

namespace Viagogo\Resources;

/**
 *
 */
class Currency extends Resource {
	protected $code;
	protected $name;

	public function getCode() {
		return $this->code;
	}

	public function getName() {
		return $this->name;
	}
}