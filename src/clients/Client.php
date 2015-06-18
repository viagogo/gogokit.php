<?php

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;
use Viagogo\Hal\PagedResource;

/**
 *
 */
abstract class Client {
	protected $client;

	function __construct(HalClient $halClient) {
		$this->client = $halClient;
	}

	function getResourceFromRoot($linkRel, $linkParams, ViagogoRequestParams $params = null, $type) {
		$root = $this->client->getRoot();
		$link = $root->getLink($linkRel)->getHref() . '/' . $linkParams;

		return $this->client->getResource($link, $params, $type);
	}

	function getResourcesFromRoot($linkRel, $linkParams = null, ViagogoRequestParams $params = null, $type) {
		$root = $this->client->getRoot();
		$link = $root->getLink($linkRel)->getHref() . '/' . $linkParams;

		return new PagedResource($this->client->getResource($link, $params), $type);
	}

	function getAllResourcesFromRoot($linkRel, $linkParams = null, ViagogoRequestParams $params = null, $type) {
		$root = $this->client->getRoot();
		$link = $root->getLink($linkRel)->getHref() . '/' . $linkParams;

		return $this->client->getAllResources($link, $params, $type);
	}
}
