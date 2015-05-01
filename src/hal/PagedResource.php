<?php

namespace Viagogo\Hal;

/**
 *
 */
class PagedResource extends Resource {
	protected $total_items;
	protected $page;
	protected $page_size;
	protected $items;
	private $type;

	public function __construct($data, $type) {
		parent::__construct($data);
		$this->type = $type;
	}

	public function getTotalItems() {
		return $this->total_items;
	}

	public function getPage() {
		return $this->page;
	}

	public function getPageSize() {
		return $this->pageSize;
	}

	public function getItems() {
		if (isset($this->_embedded->items)) {
			$result = array();
			foreach ($this->_embedded->items as $item) {
				$rc = new \ReflectionClass($this->type);
				$result[] = $rc->newInstanceArgs(array($item));
			}

			return $result;
		}
	}
}