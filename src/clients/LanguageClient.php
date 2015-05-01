<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class LanguageClient extends Client {
	public function getLanguage($languageCode, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref() . '/' . $languageCode;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Language');
	}

	public function getLanguages(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref();

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Language');
	}

	public function getAllLanguages(ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getLanguagesLink()->getHref();

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Language');
	}
}