<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class SellerListingClient extends Client {
	public function createSellerListing($listing, ViagogoRequestParams $params = null) {
		return $this->post('sellerlistings', (array) $listing, $params, Resources::SellerListing);
	}

	public function updateSellerListing($listingId, $listing, ViagogoRequestParams $params = null) {
		return $this->patch('sellerlistings/' . $listingId, (array) $listing, $params, Resources::SellerListing);
	}

	public function deleteSellerListing($listingId, $listing, ViagogoRequestParams $params = null) {
		return $this->delete('sellerlistings/' . $listingId, $params, Resources::SellerListing);
	}

	public function getSellerListing($listingId, ViagogoRequestParams $params = null) {
		return $this->getResource('sellerlistings/' . $listingId, $params, Resources::SellerListing);
	}

	public function getSellerListings($eventId, ViagogoRequestParams $params = null) {
		return $this->getResources('sellerlistings', $params, Resources::SellerListing);
	}

	public function getAllSellerListings($eventId, ViagogoRequestParams $params = null) {
		return $this->getAllResources('sellerlistings', $params, Resources::SellerListing);
	}
}