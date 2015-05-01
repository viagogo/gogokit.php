<?php

namespace Viagogo\Common;

/**
 *
 */
class OAuthToken extends ViagogoModel {
	protected $access_token;
	protected $token_type;
	protected $expires_in;
	protected $refresh_token;
	protected $scopes;

	public function getAccessToken() {
		return $this->access_token;
	}
}