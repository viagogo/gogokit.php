<?php

namespace Viagogo\Core;

use GuzzleHttp\Client;
use Viagogo\Core\ViagogoConfiguration;

/**
 *
 */
class OAuthClient {
	private $url;
	private $httpClient;
	private static $tokenUrl = 'https://account.viagogo.com/oauth2/token';

	function __construct(ViagogoConfiguration $configuration) {
		if ($configuration) 
		{
			$this->url = $configuration->tokenUrl ?: OAuthClient::$tokenUrl;
			$this->httpClient = new HttpClient(new Client(['defaults' => ['auth' => [$configuration->clientId, $configuration->clientSecret]]]));
		}
	}

	public function getClientAccessToken($scopes = "") {
		$params = [
			'grant_type' => 'client_credentials',
			'scope' => $scopes,
		];

		return $this->sendRequest($this->url, "POST", $params);
	}

	public function getPasswordAccessToken($login, $password, $scopes) {
		$params = [
			'grant_type' => 'password',
			'username' => $login,
			'password' => $password,
			'scope' => $scopes,
		];
		return $this->sendRequest($this->url, "POST", $params);
	}

	public function getRefreshToken($refreshToken = "") {
		$params = [
			'grant_type' => 'refresh_token',
			'refresh_token' => $refreshToken,
		];

		return $this->sendRequest($this->url, "POST", $params);
	}

	private function sendRequest($url, $method, $params) {
		$token = $this->httpClient->send($url, $method, null, $params);
		if (isset($token->error)) {
			throw new \Exception($token->error . "\n" . $token->error, 1);
		}

		return new OAuthToken($token);
	}
}