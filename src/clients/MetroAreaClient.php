<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class MetroAreaClient extends Client {
	public function getMetroArea($metroAreaId, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('viagogo:metroareas', $metroAreaId, $params, 'Viagogo\Resources\MetroArea');
	}

	public function getMetroAreas(ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('viagogo:metroareas', null, $params, 'Viagogo\Resources\MetroArea');
	}

	public function getAllMetroAreas(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:metroareas', null, $params, 'Viagogo\Resources\MetroArea');
	}
}