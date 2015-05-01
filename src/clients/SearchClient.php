<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class SearchClient extends Client {
	public function getSearch($query, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSearchLink()->getHref();

		$params = $params ?: new ViagogoRequestParams();
		$params->query = $query;

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Search');
	}

	public function getAllSearches($query, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSearchLink()->getHref();

		$params = $params ?: new ViagogoRequestParams();
		$params->query = $query;

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Search');
	}
}