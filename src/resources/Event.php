<?php 

namespace Viagogo\Resources;

use Viagogo\Hal\Resource;

/**
* 
*/
class Event extends Resource
{	
	protected $min_ticket_price;

	public function getMinTicketPrice()
	{
		if (!isset($this->min_ticket_price))
		{
			return $this->min_ticket_price;
		}

		return new Money($this->min_ticket_price);
	}
}