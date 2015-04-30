<?php 

namespace Viagogo\Exceptions;

use Viagogo\Resources\Error;
/**
 * Class ViagogoException
 * @package Viagogo
 */
class ViagogoRequestException extends ViagogoException
{
	public function __toString()
	{
		return $this->getMessage() ."\n".$this->getCode()."\n";
	}
}