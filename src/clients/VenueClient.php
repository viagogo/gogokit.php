<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class VenueClient extends Client {
	public function getVenue($venueId, ViagogoRequestParams $params = null) {
		return $this->getResource('venues/' . $venueId, $params, Resources::Venue);
	}

	public function getVenues(ViagogoRequestParams $params = null) {
		return $this->getResources('venues', $params, Resources::Venue);
	}

	public function getAllVenues(ViagogoRequestParams $params = null) {
		return $this->getAllResources('venues', $params, Resources::Venue);
	}
}