<?php

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

class Search extends Resource {
	protected $title;
	protected $type;
	protected $type_description;
	protected $category;
	protected $event;
	protected $venue;

	public function getTitle() {
		return $this->title;
	}

	public function getType() {
		return $this->type;
	}

	public function getTypeDescription() {
		return $this->type_description;
	}

	public function getCategory() {
		return $this->category;
	}

	public function getEvent() {
		return $this->event;
	}

	public function getVenue() {
		return $this->venue;
	}
}