<?php

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;
use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
abstract class Client {
	protected $client;

	function __construct(HalClient $halClient) {
		$this->client = $halClient;
	}

	function post($urlRoute, array $requestBody, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->post($url, $requestBody, $type);
	}

	function patch($urlRoute, array $requestBody, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->patch($url, $requestBody, $type);
	}

	function delete($urlRoute, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->delete($url, $type);
	}

	function getResource($urlRoute, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->getResource($link, $params, $type);
	}

	function getResources($urlRoute, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return new PagedResource($this->client->getResource($link, $params), $type);
	}

	function getAllResources($urlRoute, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->getAllResources($link, $params, $type);
	}
}
