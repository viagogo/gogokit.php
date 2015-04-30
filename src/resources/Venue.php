<?php 

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

class Venue extends Resource
{
	protected $id;
	protected $name;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}	
}