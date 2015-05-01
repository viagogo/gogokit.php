<?php

namespace Viagogo\Resources;

use Viagogo\Common\ViagogoModel;

/**
 *
 */
class Seating extends ViagogoModel {
	protected $section;
	protected $row;
	protected $seat_from;
	protected $seat_to;

	public function getSection() {
		return $this->section;
	}

	public function getRow() {
		return $this->row;
	}

	public function getSeatFrom() {
		return $this->seat_from;
	}

	public function getSeatTo() {
		return $this->seat_to;
	}
}