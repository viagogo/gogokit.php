<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class CountryClient extends Client {
	public function getCountry($countryCode, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCountriesLink()->getHref() . '/' . $countryCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Country');
	}

	public function getCountries(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCountriesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Country');
	}

	public function getAllCountries(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCountriesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Country');
	}
}