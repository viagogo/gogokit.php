<?php

namespace Viagogo\Hal;

/**
 *
 */
class ChangedResource {
    protected $new_or_updated_items;
    protected $deleted_items;
    public $next_link;
    
	private $type;

	public function __construct($new_or_updated_items, $deleted_items, $next_link, $type) {
        $this->type = $type;
        $this->new_or_updated_items = $new_or_updated_items;
        $this->deleted_items = $deleted_items;
        $this->next_link = $next_link;
	}

	public function getItems() {
		if (isset($this->new_or_updated_items)) {
			$result = array();
			foreach ($this->new_or_updated_items as $item) {
				$rc = new \ReflectionClass($this->type);
				$result[] = $rc->newInstanceArgs(array($item));
			}

			return $result;
		}
    }
    
    public function getDeletedItems() {
		if (isset($this->deleted_items)) {
			$result = array();
			foreach ($this->deleted_items as $item) {
				$rc = new \ReflectionClass($this->type);
				$result[] = $rc->newInstanceArgs(array($item));
			}

			return $result;
		}
	}
}