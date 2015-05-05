<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class VenueClient extends Client {
	public function getVenue($venueId, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('viagogo:venues', $venueId, $params, 'Viagogo\Resources\Venue');
	}

	public function getVenues(ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('viagogo:venues', null, $params, 'Viagogo\Resources\Venue');
	}

	public function getAllVenues(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:venues', null, $params, 'Viagogo\Resources\Venue');
	}
}