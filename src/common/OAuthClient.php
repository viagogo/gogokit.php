<?php

namespace Viagogo\Common;

use Viagogo\Exceptions\ViagogoException;

/**
 *
 */
class OAuthClient {
	private $url;
	private $httpClient;

	function __construct($clientId, $clientSecret) {
		$this->url = ViagogoConfiguration::$tokenUrl;
		$this->httpClient = new HttpClient([$clientId, $clientSecret]);
	}

	public function getClientAccessToken($scopes = "") {
		$params = [
			'grant_type' => 'client_credentials',
			'scope' => $scopes,
		];

		return $this->sendRequest($this->url, "POST", $params);
	}

	public function getPasswordAccessToken($login, $passowrd, $scopes) {
		$params = [
			'grant_type' => 'password',
			'username' => $login,
			'password' => $passowrd,
			'scope' => $scopes,
		];

		$token = $this->httpClient->send($this->url, "POST", null, $params);

		return $this->sendRequest($this->url, "POST", $params);
	}

	public function getRefreshToken($refeshToken = "") {
		$params = [
			'grant_type' => 'refresh_token',
			'refresh_token' => $refeshToken,
		];

		return $this->sendRequest($this->url, "POST", $params);
	}

	private function sendRequest($url, $method, $params) {
		$token = $this->httpClient->send($this->url, "POST", null, $params);
		if (isset($token->error)) {
			throw new ViagogoException($token->error . "\n" . $token->error_description, 1);
		}

		return new OAuthToken($token);
	}
}