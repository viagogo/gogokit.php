<?php

namespace Viagogo\Common;

/**
 *
 */
class ViagogoRequestParams {
	public $page;
	public $page_size;
	public $min_start_date;
	public $max_start_date;
	public $days;
	public $time_frame;
	public $max_ticket_price;
	public $price_currency_code;
	public $latitude;
	public $longitude;
	public $max_distance;
	public $metro_area_id;
	public $type;
	public $only_with_tickets;
	public $only_with_events;
	public $paymentmethodtype;
	public $embed;
	public $number_of_tickets;

	public function toArray() {
		return array_filter((array) $this);
	}

	public function toQueryString() {
		return http_build_query((array) $this);
	}
}