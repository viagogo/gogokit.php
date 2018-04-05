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

	public function confirmSale($saleId, ViagogoRequestParams $params = null) {
		$payload = array("confirmed" => true);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function rejectSale($saleI, ViagogoRequestParams $params = null) {
		$payload = array("confirmed" => false);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function uploadEticket($saleId, $fileContent, $fileName, ViagogoRequestParams $params = null) {
		$payload = array("confirmed" => false);
		return $this->postFile('sales/' . $saleId, $fileContent, $fileName, Resources::ETicketUpload);
	}

	public function saveEticketIds($saleId, array $eticketIds, ViagogoRequestParams $params = null) {
		$payload = array("eticket_ids" => $eticketIds);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}
}