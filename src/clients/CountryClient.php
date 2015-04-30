<?php 

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;
use Viagogo\Resources\Country;
use Viagogo\Common\ViagogoRequestParams;

/**
* 
*/
class CountryClient extends Client
{
	public function getCountry($countryCode, ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref().'/countries/'.$countryCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Country');
	}

	public function getCountries(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref().'/countries';

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Country');
	}

	public function getAllCountries(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref().'/countries';

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Country');
	}	
}