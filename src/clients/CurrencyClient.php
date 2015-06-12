<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class CurrencyClient extends Client {
	public function getCurrency($currencyCode, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('viagogo:currencies', $currencyCode, $params, Resources::Currency);
	}

	public function getCurrencies(ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('viagogo:currencies', null, $params, Resources::Currency);
	}

	public function getAllCurrencies(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:currencies', null, $params, Resources::Currency);
	}
}