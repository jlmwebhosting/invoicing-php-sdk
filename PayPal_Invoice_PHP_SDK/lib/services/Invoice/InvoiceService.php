<?php

 require('PPBaseService.php');

require_once('PPUtils.php');
if (!class_exists("InvoiceService")) {
/**
 * Invoice
 * @author WSDLInterpreter
 */
class InvoiceService extends PPBaseService {
	/**
	 * Default class map for wsdl=>php
	 * @access private
	 * @var array
	 */
	private static $classmap = array(
		"BaseAddress" => "BaseAddress",
		"ClientDetailsType" => "ClientDetailsType",
		"CurrencyType" => "CurrencyType",
		"ErrorData" => "ErrorData",
		"ErrorParameter" => "ErrorParameter",
		"FaultMessage" => "FaultMessage",
		"PhoneNumberType" => "PhoneNumberType",
		"RequestEnvelope" => "RequestEnvelope",
		"ResponseEnvelope" => "ResponseEnvelope",
		"BusinessInfoType" => "BusinessInfoType",
		"InvoiceItemType" => "InvoiceItemType",
		"InvoiceType" => "InvoiceType",
		"CreateInvoiceRequest" => "CreateInvoiceRequest",
		"CreateInvoiceResponse" => "CreateInvoiceResponse",
		"SendInvoiceRequest" => "SendInvoiceRequest",
		"SendInvoiceResponse" => "SendInvoiceResponse",
		"CreateAndSendInvoiceRequest" => "CreateAndSendInvoiceRequest",
		"CreateAndSendInvoiceResponse" => "CreateAndSendInvoiceResponse",
		"Invoice" => "Invoice",
	);

	/**
	 * No arg constructor
	 * @param string $wsdl WSDL location for this service
	 */
	public function __construct() {
		parent::__construct('Invoice');
	}

	/**
	 * Service Call: CreateInvoice

	 *  *

	 * @param CreateInvoiceRequest body
	 * @return CreateInvoiceResponse
	 * @throws APIException
	 */
	public function CreateInvoice($body) {
		return new CreateInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateInvoice", $body)));
	}


	/**
	 * Service Call: SendInvoice

	 *  *

	 * @param SendInvoiceRequest body
	 * @return SendInvoiceResponse
	 * @throws APIException
	 */
	public function SendInvoice($body) {
		return new SendInvoiceResponse( PPUtils::nvpToMap( $this->call("SendInvoice", $body)));
	}


	/**
	 * Service Call: CreateAndSendInvoice

	 *  *

	 * @param CreateAndSendInvoiceRequest body
	 * @return CreateAndSendInvoiceResponse
	 * @throws APIException
	 */
	public function CreateAndSendInvoice($body) {
		return new CreateAndSendInvoiceResponse( PPUtils::nvpToMap( $this->call("CreateAndSendInvoice", $body)));
	}


}}

?>