<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class LanguageClient extends Client {
	public function getLanguage($languageCode, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('viagogo:languages', $languageCode, $params, Resources::Language);
	}

	public function getLanguages(ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('viagogo:languages', null, $params, Resources::Language);
	}

	public function getAllLanguages(ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('viagogo:languages', null, $params, Resources::Language);
	}
}