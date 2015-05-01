<?php

namespace Viagogo\Common;

/**
 *
 */
class ErrorHandler {
	private static $exceptionLookup = array(
		"https_required" => 'Viagogo\Exceptions\SslConnectionRequiredException',
		"insufficient_scope" => 'Viagogo\Exceptions\InsufficientScopeException',
		"user_agent_required" => 'Viagogo\Exceptions\UserAgentRequiredException',
		"invalid_request_body" => 'Viagogo\Exceptions\InvalidRequestBodyException',
		"validation_failed" => 'Viagogo\Exceptions\ValidationFailedException',
		"invalid_password" => 'Viagogo\Exceptions\InvalidPasswordException',
		"email_already_exists" => 'Viagogo\Exceptions\EmailAlreadyExistsException',
		"invalid_purchase_action" => 'Viagogo\Exceptions\InvalidPurchaseActionException',
		"purchase_not_allowed" => 'Viagogo\Exceptions\PurchaseNotAllowedException',
		"listing_conflict" => 'Viagogo\Exceptions\ListingConflictException',
		"purchase_still_processing" => 'Viagogo\Exceptions\PurchaseStillProcessingException',
		"invalid_delete" => 'Viagogo\Exceptions\InvalidDeleteException',
		"internal_server_error" => 'Viagogo\Exceptions\InternalServerErrorException');

	public static function validateResponseBody($body) {
		$error = new Error($body);
		if (isset($error->code) && array_key_exists($error->code, self::exceptionLookup)) {
			$rc = new \ReflectionClass(self::exceptionLookup[$error->code]);
			throw $rc->newInstanceArgs(array($error->message));
		}
	}

	public static function handleStatusCode($codeStatus, $ex) {
		switch ((int) $codeStatus) {
			case 403:
				throw new \Viagogo\Exceptions\ForbiddenException($ex->getMessage(), 1, $ex);
				break;
			case 404:
				throw new \Viagogo\Exceptions\ResourceNotFoundException($ex->getMessage(), 1, $ex);
				break;
			default:
				throw new \Viagogo\Exceptions\RequestException($ex->getMessage(), 1, $ex);
				break;
		}
	}
}