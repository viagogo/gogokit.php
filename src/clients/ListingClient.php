<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class ListingClient extends Client {
	public function getListing($listingId, ViagogoRequestParams $params = null) {
		return $this->getResource('listings/' . $listingId, $params, Resources::Listing);
	}

	public function getListingsByEvent($eventId, ViagogoRequestParams $params = null) {
		return $this->getResources('events/' . $eventId . '/listings', $params, Resources::Listing);
	}

	public function getAllListingsByEvent($eventId, ViagogoRequestParams $params = null) {
		return $this->getAllResources('events/' . $eventId . '/listings', $params, Resources::Listing);
	}
}