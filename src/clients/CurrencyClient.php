<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class CurrencyClient extends Client {
	public function getCurrency($currencyCode, ViagogoRequestParams $params = null) {
		return $this->getResource('currencies/' . $currencyCode, $params, Resources::Currency);
	}

	public function getCurrencies(ViagogoRequestParams $params = null) {
		return $this->getResources('currencies', $params, Resources::Currency);
	}

	public function getAllCurrencies(ViagogoRequestParams $params = null) {
		return $this->getAllResources('currencies', $params, Resources::Currency);
	}
}