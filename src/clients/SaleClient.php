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

	public function getChangedSales($nextLink, ViagogoRequestParams $params = null) {

		$nextLink = $nextLink ?: $this->client->createUrl("sales?sort=resource_version");
		return $this->getChangedResources($nextLink, $params, Resources::Sale);
	}

	public function confirmSale($saleId, ViagogoRequestParams $params = null) {
		$payload = array("confirmed" => true);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function rejectSale($saleId, ViagogoRequestParams $params = null) {
		$payload = array("confirmed" => false);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function uploadEticket($saleId, $fileContent, $fileName, ViagogoRequestParams $params = null) {
		$eticketUpload = $this->postFile('sales/' . $saleId . '/eticketuploads', $fileContent, $fileName, $params, Resources::ETicketUpload);
		return $eticketUpload->{'_embedded'}->{'items'};
	}

	public function getEticketUploads($saleId, ViagogoRequestParams $params = null) {
		return $this->getAllResources('sales/' . $saleId . '/eticketuploads', $params, Resources::ETicketUpload);
	}

	public function saveEticketIds($saleId, array $eticketIds, ViagogoRequestParams $params = null) {
		$payload = array("eticket_ids" => $eticketIds);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}
	
	public function changeTicketType($saleId, $ticketType, ViagogoRequestParams $params = null) {
		$payload = array("eticket_type" => $ticketType);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function uploadETicketUrls($saleId, array $eticketUrls, ViagogoRequestParams $params = null) {
		$payload = array("eticket_urls" => $eticketUrls);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function getTicketHolderDetails($saleId,  ViagogoRequestParams $params = null) {
		return $this->getAllResources('sales/' . $saleId . '/ticketholders', $params, Resources::Sale);
	}
	
	public function uploadTransferConfirmation($saleId, $confirmationNumber, ViagogoRequestParams $params = null) {
		$payload = array("transfer_confirmation_number" => $confirmationNumber);
		return $this->patch('sales/' . $saleId, $payload, $params, Resources::Sale);
	}

	public function createShipment($saleId, ViagogoRequestParams $params = null) {
		return $this->put('sales/' . $saleId .'/shipments', null, $params, Resources::Sale);
	}


}