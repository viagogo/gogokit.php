<?php

namespace Viagogo\Hal;

use Viagogo\Core\ViagogoModel;

/**
 *
 */
class Resource extends ViagogoModel {
	public function getLink($rel) {
		if (isset($this->_links) && isset($this->_links->{$rel})) {
			return new Link($this->_links->{$rel});
		}
	}
}