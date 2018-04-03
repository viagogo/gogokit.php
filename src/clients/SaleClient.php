<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class SaleClient extends Client {
	public function getSale($saleId, ViagogoRequestParams $params = null) {
		return $this->getResource('sales/' . $saleId, $params, Resources::Sale);
	}

	public function getAllSales(ViagogoRequestParams $params = null) {
		return $this->getAllResources('sales', $params, Resources::Sale);
	}

	public function updateSale( $ViagogoRequestParams $params = null) {
		return $this->getResources('sales/' . $eventId . '/listings', $params, Resources::Sale);
	}
}