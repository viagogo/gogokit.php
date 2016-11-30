<?php

namespace Viagogo\Core;

use GuzzleHttp\Client;

/**
 *
 */
class OAuthClient {
	private $url;
	private $httpClient;

	function __construct($clientId, $clientSecret) {
		$this->url = \Viagogo\ViagogoConfiguration::$tokenUrl;
		$this->httpClient = new HttpClient(new Client(['defaults' => ['auth' => [$clientId, $clientSecret]]]));
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