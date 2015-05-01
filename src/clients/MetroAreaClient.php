<?php

namespace Viagogo\Clients;

use Viagogo\Common\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class MetroAreaClient extends Client {
	public function getMetroArea($metroAreaId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getMetroAreasLink()->getHref() . '/' . $metroAreaId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\MetroArea');
	}

	public function getMetroAreas(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getMetroAreasLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\MetroArea');
	}

	public function getAllMetroAreas(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getMetroAreasLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\MetroArea');
	}
}