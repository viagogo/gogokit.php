<?php 

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;
use Viagogo\Resources\Currency;
use Viagogo\Common\ViagogoRequestParams;

/**
* 
*/
class CurrencyClient extends Client
{
	public function getCurrency($currencyCode, ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref().'/'.$countryCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Country');
	}

	public function getCurrencies(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Country');
	}

	public function getAllCurrencies(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getCurrenciesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Country');
	}	
}