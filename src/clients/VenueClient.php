<?php

namespace Viagogo\Clients;

use Viagogo\Common\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class VenueClient extends Client {
	public function getVenue($venueId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref() . '/' . $venueId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Venue');
	}

	public function getVenues(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Venue');
	}

	public function getAllVenues(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Venue');
	}
}