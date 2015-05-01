<?php

namespace Viagogo\Hal;

use Viagogo\Common\HttpClient;
use Viagogo\Common\OAuthTokenStore;
use Viagogo\Common\ViagogoConfiguration;
use Viagogo\Common\ViagogoRequestParams;
use Viagogo\Resources\Root;

/**
 *
 */
class HalClient {
	private $tokenStore;
	private $url;
	private $httpClient;

	function __construct(OAuthTokenStore $tokenStore) {
		$this->tokenStore = $tokenStore;
		$this->url = ViagogoConfiguration::$rootUrl;
		$this->httpClient = new HttpClient();

		if (ViagogoConfiguration::$currency) {
			$this->httpClient->setRequestHeader('Accept-Currency', ViagogoConfiguration::$currency);
		}

		if (ViagogoConfiguration::$language) {
			$this->httpClient->setRequestHeader('Accept-Language', ViagogoConfiguration::$language);
		}

		if (ViagogoConfiguration::$country) {
			$this->httpClient->setRequestHeader('VGG-Country', ViagogoConfiguration::$country);
		}
	}

	public function getRoot(ViagogoRequestParams $params = null) {
		$params = $params ?: new ViagogoRequestParams();

		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());
		$root = $this->httpClient->send($this->url, "GET", $params->toArray(), null);

		return new Root($root);
	}

	public function getResource($url, ViagogoRequestParams $params = null, $type = null) {
		$params = $params ?: new ViagogoRequestParams();

		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());

		return $this->httpClient->send($url, "GET", $params->toArray(), null);
	}

	public function getAllResources($url, ViagogoRequestParams $params = null, $type) {
		$params = $params ?: new ViagogoRequestParams();
		$params->page = 1;
		$params->page_size = 1000;

		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());

		$result = array();
		$hasNextPage = true;

		while ($hasNextPage) {
			$page = $this->httpClient->send($url, "GET", $params->toArray(), null);

			if (isset($page->_embedded->items)) {
				foreach ($page->_embedded->items as $item) {
					$rc = new \ReflectionClass($type);
					$result[] = $rc->newInstanceArgs(array($item));
				}
			} else {
				break;
			}

			if (!isset($page->_links->next)) {
				$hasNextPage = false;
			} else {
				$url = $page->_links->next->href;
			}
		}

		return $result;
	}
}