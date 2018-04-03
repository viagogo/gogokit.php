<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class CountryClient extends Client {
	public function getCountry($countryCode, ViagogoRequestParams $params = null) {
		return $this->getResource('countries/' . $countryCode, $params, Resources::Country);
	}

	public function getCountries(ViagogoRequestParams $params = null) {
		return $this->getResources('countries', $params, Resources::Country);
	}

	public function getAllCountries(ViagogoRequestParams $params = null) {
		return $this->getAllResources('countries', $params, Resources::Country);
	}
}