<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class CountryClient extends Client {
	public function getCountry($countryCode, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('viagogo:countries', $countryCode, $params, 'Viagogo\Resources\Country');
	}

	public function getCountries(ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('viagogo:countries', null, $params, 'Viagogo\Resources\Country');
	}

	public function getAllCountries(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:countries', null, $params, 'Viagogo\Resources\Country');
	}
}