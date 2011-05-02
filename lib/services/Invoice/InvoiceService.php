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

	 *  

	 * @param CreateInvoiceRequest CreateInvoiceRequest
	 * @return CreateInvoiceResponse
	 * @throws APIException
	 */
	public function CreateInvoice($createInvoiceRequest, $apiUsername=null) {
		return new CreateInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateInvoice", $createInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: SendInvoice

	 *  

	 * @param SendInvoiceRequest SendInvoiceRequest
	 * @return SendInvoiceResponse
	 * @throws APIException
	 */
	public function SendInvoice($sendInvoiceRequest, $apiUsername=null) {
		return new SendInvoiceResponse( PPUtils::nvpToMap( $this->call("SendInvoice", $sendInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: CreateAndSendInvoice

	 *  

	 * @param CreateAndSendInvoiceRequest CreateAndSendInvoiceRequest
	 * @return CreateAndSendInvoiceResponse
	 * @throws APIException
	 */
	public function CreateAndSendInvoice($createAndSendInvoiceRequest, $apiUsername=null) {
		return new CreateAndSendInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateAndSendInvoice", $createAndSendInvoiceRequest, $apiUsername)));
	}


}

?>