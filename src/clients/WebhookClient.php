<?php

namespace Viagogo\Clients;

use Viagogo\Core\ViagogoRequestParams;
use Viagogo\Resources\Resources;

/**
 *
 */
class WebhookClient extends Client {

	public function getAllWebhooks(ViagogoRequestParams $params = null) {
		return $this->getAllResources('webhooks', $params, Resources::Webhook);
	}

	public function createWebhook($webhook, ViagogoRequestParams $params = null) {
		return $this->post('webhooks', $webhook, $params, Resources::Webhook);
	}

	public function deleteWebhook($webhookId, ViagogoRequestParams $params = null) {
		return $this->delete('webhooks/'. $webhookId, $params, Resources::Webhook);
	}
}