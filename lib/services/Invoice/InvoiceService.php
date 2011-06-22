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


	/**
	 * Service Call: UpdateInvoice
	 * @param UpdateInvoiceRequest $updateInvoiceRequest
	 * @return UpdateInvoiceResponse
	 * @throws APIException
	 */
	public function UpdateInvoice($updateInvoiceRequest, $apiUsername=null) {
		return new UpdateInvoiceResponse( PPUtils::nvpToMap( $this->call("UpdateInvoice", $updateInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: GetInvoiceDetails
	 * @param GetInvoiceDetailsRequest $getInvoiceDetailsRequest
	 * @return GetInvoiceDetailsResponse
	 * @throws APIException
	 */
	public function GetInvoiceDetails($getInvoiceDetailsRequest, $apiUsername=null) {
		return new GetInvoiceDetailsResponse( PPUtils::nvpToMap( $this->call("GetInvoiceDetails", $getInvoiceDetailsRequest, $apiUsername)));
	}


	/**
	 * Service Call: CancelInvoice
	 * @param CancelInvoiceRequest $cancelInvoiceRequest
	 * @return CancelInvoiceResponse
	 * @throws APIException
	 */
	public function CancelInvoice($cancelInvoiceRequest, $apiUsername=null) {
		return new CancelInvoiceResponse( PPUtils::nvpToMap( $this->call("CancelInvoice", $cancelInvoiceRequest, $apiUsername)));
	}


	/**
	 * Service Call: SearchInvoices
	 * @param SearchInvoicesRequest $searchInvoicesRequest
	 * @return SearchInvoicesResponse
	 * @throws APIException
	 */
	public function SearchInvoices($searchInvoicesRequest, $apiUsername=null) {
		return new SearchInvoicesResponse( PPUtils::nvpToMap( $this->call("SearchInvoices", $searchInvoicesRequest, $apiUsername)));
	}


	/**
	 * Service Call: MarkInvoiceAsPaid
	 * @param MarkInvoiceAsPaidRequest $markInvoiceAsPaidRequest
	 * @return MarkInvoiceAsPaidResponse
	 * @throws APIException
	 */
	public function MarkInvoiceAsPaid($markInvoiceAsPaidRequest, $apiUsername=null) {
		return new MarkInvoiceAsPaidResponse( PPUtils::nvpToMap( $this->call("MarkInvoiceAsPaid", $markInvoiceAsPaidRequest, $apiUsername)));
	}


}

?>