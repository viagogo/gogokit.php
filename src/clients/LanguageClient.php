<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class LanguageClient extends Client {
	public function getLanguage($languageCode, ViagogoRequestParams $params = null) {
		return $this->getResource('languages/' . $languageCode, $params, Resources::Language);
	}

	public function getLanguages(ViagogoRequestParams $params = null) {
		return $this->getResources('languages', $params, Resources::Language);
	}

	public function getAllLanguages(ViagogoRequestParams $params = null) {
		return $this->getAllResources('languages', $params, Resources::Language);
	}
}