<?php

namespace Viagogo\Hal;

use GuzzleHttp\Client;
use Viagogo\Core\HttpClient;
use Viagogo\Core\OAuthTokenStore;
use Viagogo\Core\ViagogoConfiguration;
use Viagogo\Core\ViagogoRequestParams;
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
		$this->httpClient = new HttpClient(new Client());

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

		$result = $this->httpClient->send($url, "GET", $params->toArray(), null);

		return $this->createResource($result, $type);
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
					$result[] = $this->createResource($item, $type);
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

	public function patch($url, array $requestBody = array(), $type = null) {
		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());
		$result = $this->httpClient->send($this->url, "PATCH", array(), $requestBody);

		return $this->createResource($result, $type);
	}

	public function post($url, array $requestBody = array(), $type = null) {
		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());
		$result = $this->httpClient->send($this->url, "POST", array(), $requestBody);

		return $this->createResource($result, $type);
	}

	public function put($url, array $requestBody = array(), $type = null) {
		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());
		$result = $this->httpClient->send($this->url, "PUT", array(), $requestBody);

		return $this->createResource($result, $type);
	}

	private function createResource($item, $type) {
		if ($type === null) {
			return $item;
		}

		$rc = new \ReflectionClass($type);
		return $rc->newInstanceArgs(array($item));
	}
}