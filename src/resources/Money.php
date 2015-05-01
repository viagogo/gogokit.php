<?php

namespace Viagogo\Resources;

use Viagogo\Core\ViagogoModel;

/**
 *
 */
class Money extends ViagogoModel {
	protected $amount;
	protected $currency_code;
	protected $display;

	public function getAmount() {
		return $this->amount;
	}

	public function getCurrencyCode() {
		return $this->currency_code;
	}

	public function getDisplay() {
		return $this->display;
	}
}