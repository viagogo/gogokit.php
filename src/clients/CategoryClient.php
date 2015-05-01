<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class CategoryClient extends Client {
	public function getCategory($categoryId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/categories/' . $categoryId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Category');
	}

	public function getAllGenres(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getGenresLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Category');
	}
}