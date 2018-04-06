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

	function post($urlRoute, $requestBody, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->post($link, json_encode($requestBody), $type);
	}

	function patch($urlRoute, $requestBody, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->patch($link, json_encode($requestBody), $type);
	}

	function delete($urlRoute, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->delete($link, $type);
	}

	function postFile($urlRoute, $fileContent, $fileName, ViagogoRequestParams $params = null, $type) {
		$link = $this->client->createUrl($urlRoute);

		return $this->client->postFile($link, $fileContent, $fileName, $type);
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
