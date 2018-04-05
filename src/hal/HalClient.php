<?php

namespace Viagogo\Hal;

use GuzzleHttp\Client;
use Viagogo\Core\HttpClient;
use Viagogo\Core\OAuthTokenStore;
use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Root;
use Viagogo\Core\ViagogoConfiguration;

/**
 *
 */
class HalClient {
	private $tokenStore;
	private $url;
	private $httpClient;
	private static $rootUrl = 'https://api.viagogo.net/v2/';

	function __construct(ViagogoConfiguration $configuration, OAuthTokenStore $tokenStore) {
		$this->tokenStore = $tokenStore;
		$this->url = $configuration ? $configuration->rootUrl : HalClient::$rootUrl;
		$this->httpClient = new HttpClient(new Client());

		if ($configuration && $configuration->currency) {
			$this->httpClient->setRequestHeader('Accept-Currency', $configuration->currency);
		}

		if ($configuration && $configuration->language) {
			$this->httpClient->setRequestHeader('Accept-Language', $configuration->language);
		}

		if ($configuration && $configuration->country) {
			$this->httpClient->setRequestHeader('VGG-Country', $configuration->country);
		}
	}

	public function createUrl($urlRoute) {
		return $this->url . '/' . $urlRoute;
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

	public function postFile($url, $fileContent, $fileName, $type = null) {
		$this->httpClient->setRequestHeader('Authorization', 'Bearer ' . $this->tokenStore->getToken()->getAccessToken());
		$result = $this->httpClient->sendFile($this->url, $fileContent, $fileName);

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