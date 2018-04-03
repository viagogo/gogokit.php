<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class CategoryClient extends Client {
	public function getCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getResource('categories/' . $categoryId, $params, Resources::Category);
	}

	public function getAllGenres(ViagogoRequestParams $params = null) {
		return $this->getAllResources('viagogo:genres', null, $params, Resources::Category);
	}
}