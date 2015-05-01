<?php

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

/**
 *
 */
class Root extends Resource {
	public function getSelfLink() {
		return $this->getLink("self");
	}

	public function getUserLink() {
		return $this->getLink("viagogo:user");
	}

	public function getSearchLink() {
		return $this->getLink("viagogo:search");
	}

	public function getGenresLink() {
		return $this->getLink("viagogo:genres");
	}

	public function getCountriesLink() {
		return $this->getLink("viagogo:countries");
	}

	public function getCurrenciesLink() {
		return $this->getLink("viagogo:currencies");
	}

	public function getLanguagesLink() {
		return $this->getLink("viagogo:languages");
	}

	public function getMetroAreasLink() {
		return $this->getLink("viagogo:metroareas");
	}

	public function getVenuesLink() {
		return $this->getLink("viagogo:venues");
	}
}