<?php

namespace Viagogo\Common;

/**
 * Generic Model class that all API domain classes extend
 * that enables easy JSON encoding/decoding
 */
abstract class ViagogoModel {
	/**
	 * Default Constructor
	 *
	 * You can pass data as a json representation or array object.
	 *
	 * @param $data
	 * @throws \InvalidArgumentException
	 */
	public function __construct($data) {
		if (gettype($data) == 'StdClass') {
			$data = (array) $data;
		}

		foreach ($data as $name => $value) {
			$this->{$name} = $value;
		}
	}
}
