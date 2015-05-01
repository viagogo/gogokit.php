<?php

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

/**
 *
 */
class Listing extends Resource {
	protected $id;
	protected $pickup_available;
	protected $download_available;
	protected $number_of_tickets;
	protected $seating;
	protected $ticket_price;
	protected $estimated_ticket_price;
	protected $estimated_total_ticket_price;
	protected $estimated_booking_fee;
	protected $estimated_shipping;
	protected $estimated_vat;
	protected $estimated_total_charge;

	public function getId() {
		return $this->id;
	}

	public function getIsPickupAvailable() {
		return $this->pickup_available;
	}

	public function getIsDownlowdAvailable() {
		return $this->download_available;
	}

	public function getNumberOfTickets() {
		return $this->number_of_tickets;
	}

	public function getSeating() {
		if (!isset($this->seating)) {
			return $this->seating;
		}

		return new Seating($this->seating);
	}

	public function getTicketPrice() {
		if (!isset($this->ticket_price)) {
			return $this->ticket_price;
		}

		return new Money($this->ticket_price);
	}

	public function getEstimatedTicketPrice() {
		if (!isset($this->estimated_ticket_price)) {
			return $this->estimated_ticket_price;
		}

		return new Money($this->estimated_ticket_price);
	}

	public function getEstimatedTotalTicketPrice() {
		if (!isset($this->estimated_total_ticket_price)) {
			return $this->estimated_total_ticket_price;
		}

		return new Money($this->estimated_total_ticket_price);
	}

	public function getEstimatedBookingFee() {
		if (!isset($this->estimated_booking_fee)) {
			return $this->estimated_booking_fee;
		}

		return new Money($this->estimated_booking_fee);
	}

	public function getEstimatedShipping() {
		if (!isset($this->estimated_shipping)) {
			return $this->estimated_shipping;
		}

		return new Money($this->estimated_shipping);
	}

	public function getEstimatedVat() {
		if (!isset($this->estimated_vat)) {
			return $this->estimated_vat;
		}

		return new Money($this->estimated_vat);
	}

	public function getEstimatedTotalCharge() {
		if (!isset($this->estimated_total_charge)) {
			return $this->estimated_total_charge;
		}

		return new Money($this->estimated_total_charge);
	}
}