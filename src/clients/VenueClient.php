<?php 

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;
use Viagogo\Resources\Venue;
use Viagogo\Common\ViagogoRequestParams;

/**
* 
*/
class VenueClient extends Client
{
	public function getVenue($venueId, ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref().'/'.$venueId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Country');
	}

	public function getVenues(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Country');
	}

	public function getAllVenues(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getVenuesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Country');
	}
}