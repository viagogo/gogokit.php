<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class CategoryClient extends Client {
	public function getCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('self', 'categories/' . $categoryId, $params, 'Viagogo\Resources\Category');
	}

	public function getAllGenres(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:genres', null, $params, 'Viagogo\Resources\Category');
	}
}