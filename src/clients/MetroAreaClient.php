<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class MetroAreaClient extends Client {
	public function getMetroArea($metroAreaId, ViagogoRequestParams $params = null) {
		return $this->getResource('metroareas/' . $metroAreaId, $params, Resources::MetroArea);
	}

	public function getMetroAreas(ViagogoRequestParams $params = null) {
		return $this->getResources('metroareas', $params, Resources::MetroArea);
	}

	public function getAllMetroAreas(ViagogoRequestParams $params = null) {
		return $this->getAllResources('metroareas', $params, Resources::MetroArea);
	}
}