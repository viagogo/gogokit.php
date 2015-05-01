<?php

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

/**
 *
 */
class Event extends Resource {
	protected $id;
	protected $name;
	protected $start_date;
	protected $date_confirmed;
	protected $end_date;
	protected $notes_html;
	protected $restrictions_html;
	protected $min_ticket_price;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getStartDate() {
		if (!isset($this->start_date)) {
			return $this->start_date;
		}

		return new DateTime($this->start_date);
	}

	public function getIsDateConfirmed() {
		return $this->date_confirmed;
	}

	public function getEndDate() {
		if (!isset($this->end_date)) {
			return $this->end_date;
		}

		return new DateTime($this->end_date);
	}

	public function getNotes() {
		return $this->notes_html;
	}

	public function getRestrictions() {
		return $this->restrictions_html;
	}

	public function getMinTicketPrice() {
		if (!isset($this->min_ticket_price)) {
			return $this->min_ticket_price;
		}

		return new Money($this->min_ticket_price);
	}
}