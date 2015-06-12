<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class EventClient extends Client {
	public function getEvent($eventId, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('self', 'events/' . $eventId, $params, Resources::Event);
	}

	public function getEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('self', 'categories/' . $categoryId . '/events/', $params, Resources::Event);
	}

	public function getAllEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('self', 'categories/' . $categoryId . '/events/', $params, Resources::Event);
	}
}