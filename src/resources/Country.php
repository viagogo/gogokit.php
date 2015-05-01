<?php

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

/**
 *
 */
class Country extends Resource {
	protected $code;
	protected $name;

	public function getCode() {
		return $this->code;
	}

	public function getName() {
		return $this->name;
	}
}