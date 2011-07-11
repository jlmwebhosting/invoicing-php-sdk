<?php

require_once('PPBaseService.php');
require_once('Invoice.php');
require_once('PPUtils.php');
/**
 * Invoice wrapper class
 * Auto generated code
 */
class InvoiceService extends PPBaseService {
	public function __construct() {
		parent::__construct('Invoice');
	}
/*
 * Setters and getters for Third party authentication (Permission Services)
 */
	public $accessToken;
	public $tokenSecret;
	public function getAccessToken() {
		return $this->accessToken;
	}

	public function setAccessToken($accessToken) {
		$this->accessToken = $accessToken;
	}

	public function getTokenSecret() {
		return $this->tokenSecret;
	}

	public function setTokenSecret($tokenSecret) {
		$this->tokenSecret = $tokenSecret;
	}
	/**
	 * Service Call: CreateInvoice
	 * @param CreateInvoiceRequest $createInvoiceRequest
	 * @return CreateInvoiceResponse
	 * @throws APIException
	 */
	public function CreateInvoice($createInvoiceRequest, $apiUsername=null) {
		return new CreateInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateInvoice", $createInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: SendInvoice
	 * @param SendInvoiceRequest $sendInvoiceRequest
	 * @return SendInvoiceResponse
	 * @throws APIException
	 */
	public function SendInvoice($sendInvoiceRequest, $apiUsername=null) {
		return new SendInvoiceResponse( PPUtils::nvpToMap( $this->call("SendInvoice", $sendInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: CreateAndSendInvoice
	 * @param CreateAndSendInvoiceRequest $createAndSendInvoiceRequest
	 * @return CreateAndSendInvoiceResponse
	 * @throws APIException
	 */
	public function CreateAndSendInvoice($createAndSendInvoiceRequest, $apiUsername=null) {
		return new CreateAndSendInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateAndSendInvoice", $createAndSendInvoiceRequest, $apiUsername)));
	}


}

?>