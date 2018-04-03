<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class EventClient extends Client {
	public function getEvent($eventId, ViagogoRequestParams $params = null) {
		return $this->getResource('events/' . $eventId, $params, Resources::Event);
	}

	public function getEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getResources('categories/' . $categoryId . '/events/', $params, Resources::Event);
	}

	public function getAllEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getAllResources('categories/' . $categoryId . '/events/', $params, Resources::Event);
	}
}