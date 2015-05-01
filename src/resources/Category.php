<?php

namespace Viagogo\Resources;

/**
 *
 */
class Category extends Resource {

	protected $id;
	protected $name;
	protected $description_html;
	protected $min_ticket_price;
	protected $min_event_date;
	protected $max_event_date;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getDescription() {
		return $this->description_html;
	}

	public function getMinTicketPrice() {
		if (!isset($this->min_ticket_price)) {
			return $this->min_ticket_price;
		}

		return new Money($this->min_ticket_price);
	}

	public function getMinEventDate() {
		if (!isset($this->min_event_date)) {
			return $this->min_event_date;
		}

		return new DateTime($this->min_event_date);
	}

	public function getMaxEventDate() {
		if (!isset($this->max_event_date)) {
			return $this->max_event_date;
		}

		return new DateTime($this->max_event_date);
	}
}