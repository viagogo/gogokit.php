<?php

namespace Viagogo\Core;

/**
 *
 */
class OAuthTokenStore {
	private $token;

	public function setToken(OAuthToken $token) {
		$this->token = $token;

		return $this;
	}

	public function getToken() {
		return $this->token;
	}
}