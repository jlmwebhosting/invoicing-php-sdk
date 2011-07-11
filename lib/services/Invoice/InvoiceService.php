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

	/**
	 * Service Call: CreateInvoice
	 * @param CreateInvoiceRequest $createInvoiceRequest
	 * @return CreateInvoiceResponse
	 * @throws APIException
	 */
	public function CreateInvoice($createInvoiceRequest, $apiUsername=null) {
		return new CreateInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateInvoice", $createInvoiceRequest, 
																$apiUsername, $this->accessToken, $this->tokenSecret)));
	}


	/**
	 * Service Call: SendInvoice
	 * @param SendInvoiceRequest $sendInvoiceRequest
	 * @return SendInvoiceResponse
	 * @throws APIException
	 */
	public function SendInvoice($sendInvoiceRequest, $apiUsername=null) {
		return new SendInvoiceResponse( PPUtils::nvpToMap( $this->call("SendInvoice", $sendInvoiceRequest, 
															$apiUsername, $this->accessToken, $this->tokenSecret)));
	}


	/**
	 * Service Call: CreateAndSendInvoice
	 * @param CreateAndSendInvoiceRequest $createAndSendInvoiceRequest
	 * @return CreateAndSendInvoiceResponse
	 * @throws APIException
	 */
	public function CreateAndSendInvoice($createAndSendInvoiceRequest, $apiUsername=null) {
		return new CreateAndSendInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateAndSendInvoice", $createAndSendInvoiceRequest, 
																		$apiUsername, $this->accessToken, $this->tokenSecret)));
	}


}

?>