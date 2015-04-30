<?php 

namespace Viagogo;

use Viagogo\Clients as Clients;
use Viagogo\Common as Common;
use Viagogo\Hal\HalClient;
/**
* 
*/
class ViagogoClient
{
	private $oauthClient;
	private $tokenStore;
	private $halClient;
	private $categoryClient;
	private $eventClient;
	private $venueClient;
	private $listingClient;
	private $searchClient;
	private $currencyClient;
	private $countryClient;
	private $languageClient;

	function __construct($clientId, $clientSecret)
	{
		$this->oauthClient = new Common\OAuthClient($clientId, $clientSecret);
		$this->tokenStore = new Common\OAuthTokenStore();
		$this->halClient = new HalClient($this->tokenStore);
		$this->categoryClient = new Clients\CategoryClient($this->halClient);
		$this->eventClient = new Clients\EventClient($this->halClient);
		$this->venueClient = new Clients\VenueClient($this->halClient);
		$this->listingClient = new Clients\ListingClient($this->halClient);
		$this->searchClient = new Clients\SearchClient($this->halClient);
		$this->currencyClient = new Clients\CurrencyClient($this->halClient);
		$this->countryClient = new Clients\CountryClient($this->halClient);
		$this->languageClient = new Clients\LanguageClient($this->halClient);
	}

	public function setToken(Common\OAuthToken $token)
	{
		$this->tokenStore->setToken($token);
		
		return $this;
	}

	public function getOAuthClient()
	{
		return $this->oauthClient;
	}

	public function getHalClient()
	{
		return $this->halClient;
	}
	
	public function getCategoryClient()
	{
		return $this->categoryClient;
	}
	
	public function getEventClient()
	{
		return $this->eventClient;
	}
	
	public function getVenueClient()
	{
		return $this->venueClient;
	}
	
	public function getListingClient()
	{
		return $this->listingClient;
	}

	public function getSearchClient()
	{
		return $this->searchClient;
	}

	public function getCountryClient()
	{
		return $this->countryClient;
	}

	public function getCurrencyClient()
	{
		return $this->currencyClient;
	}

	public function getLanguageClient()
	{
		return $this->languageClient;
	}
}
