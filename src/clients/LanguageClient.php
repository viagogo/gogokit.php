<?php 

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;
use Viagogo\Resources\Language;
use Viagogo\Common\ViagogoRequestParams;

/**
* 
*/
class LanguageClient extends Client
{
	public function getLanguage($languageCode, ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref().'/'.$languageCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Country');
	}

	public function getLanguages(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Country');
	}

	public function getAllLanguages(ViagogoRequestParams $params = null)
	{
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Country');
	}	
}