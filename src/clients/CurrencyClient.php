<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class CurrencyClient extends Client {
	public function getCurrency($currencyCode, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref() . '/' . $countryCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Currency');
	}

	public function getCurrencies(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Currency');
	}

	public function getAllCurrencies(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Currency');
	}
}