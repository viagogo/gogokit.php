<?php

namespace Viagogo\Core;

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
		"internal_server_error" => 'Viagogo\Exceptions\InternalServerErrorException',
		"invalid_sale_action" => 'Viagogo\Exceptions\InvalidSaleActionException',
		"invalid_seller_listing_action" => 'Viagogo\Exceptions\InvalidSellerListingActionException',
		"sale_eticket_already_uploaded" => 'Viagogo\Exceptions\SaleETicketAlreadyUploadedException');

	public static function handleError($clientException) {
		$codeStatus = $clientException->getCode();

		if ($codeStatus == 404) {
			return new \Viagogo\Exceptions\ResourceNotFoundException($codeStatus, $clientException->getMessage(), 1, $clientException);
		}

		$response = $clientException->getResponse();

		if ($response->json() != null) {
			$body = $response->getBody();
			return self::handleErrorBody($codeStatus, $body, $clientException);
		} else if ($codeStatus == 401) {
			return new \Viagogo\Exceptions\UnauthorizedException($codeStatus, self::ParseValueFromAuthenticatedHeader($response), 1, $clientException);
		}

		return $clientException;
	}

	public static function handleErrorBody($codeStatus, $body, $clientException) {
		$error = json_decode($body);
		if (isset($error->code) && array_key_exists($error->code, self::$exceptionLookup)) {
			$rc = new \ReflectionClass(self::$exceptionLookup[$error->code]);
			return $rc->newInstanceArgs(array($codeStatus, $error->message, 1, $clientException));
		} else if (isset($error->error)) {
			return new \Viagogo\Exceptions\BadRequestException($codeStatus, $error->error, 1, $clientException);
		}

		return $clientException;
	}

	public static function ParseValueFromAuthenticatedHeader($response) {
		$headers = $response->getHeaders();
		if (array_key_exists("WWW-Authenticate", $headers)) {
			if (preg_match('/,error_description="(?<value>.+)"/', $headers["WWW-Authenticate"][0], $error) > 0) {
				return $error[1];
			}
		}

		return null;
	}
}