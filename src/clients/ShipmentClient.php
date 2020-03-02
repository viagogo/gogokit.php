<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class ShipmentClient extends Client {
	public function createShipment($saleId, ViagogoRequestParams $params = null) {
		return $this->put('sales/' . $saleId .'/shipments', null, $params, Resources::Sale);
	}

	public function downloadShipmentLabel($labelUrl, ViagogoRequestParams $params = null) {
		return $this->getBytes($labelUrl, $params, Resources::Sale);
	}




}