<?php

namespace Viagogo\Clients;

use Viagogo\Common\ViagogoRequestParams;
use Viagogo\Hal\PagedResource;

/**
 *
 */
class EventClient extends Client {
	public function getEvent($eventId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/events/' . $eventId;

		return $this->client->getResource($link, $params, 'Viagogo\Resources\Event');
	}

	public function getEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/categories/' . $categoryId . '/events';

		return new PagedResource($this->client->getResource($link, $params), 'Viagogo\Resources\Event');
	}

	public function getAllEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		$root = $this->client->getRoot();
		$link = $root->getSelfLink()->getHref() . '/categories/' . $categoryId . '/events';

		return $this->client->getAllResources($link, $params, 'Viagogo\Resources\Event');
	}
}