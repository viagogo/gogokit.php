<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;

/**
 *
 */
class EventClient extends Client {
	public function getEvent($eventId, ViagogoRequestParams $params = null) {
		return $this->getResourceFromRoot('self', 'events/' . $eventId, $params, 'Viagogo\Resources\Event');
	}

	public function getEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getResourcesFromRoot('self', 'categories/' . $categoryId, $params, 'Viagogo\Resources\Event');
	}

	public function getAllEventsByCategory($categoryId, ViagogoRequestParams $params = null) {
		return $this->getAllResourcesFromRoot('self', 'categories/' . $categoryId, $params, 'Viagogo\Resources\Event');
	}
}