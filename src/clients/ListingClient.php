<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class ListingClient extends Client {
	public function getListing($listingId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/listings/' . $listingId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Listing');
	}

	public function getListingsByEvent($eventId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/events/' . $eventId . '/listings';

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Listing');
	}

	public function getAllListingsByEvent($eventId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/events/' . $eventId . '/listings';

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Listing');
	}
}