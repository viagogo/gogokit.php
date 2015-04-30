<?php 

namespace Viagogo\Clients;

use Viagogo\Hal\HalClient;

/**
* 
*/
abstract class Client
{
	protected $client;

	function __construct(HalClient $halClient)
	{
		$this->client = $halClient;
	}
}