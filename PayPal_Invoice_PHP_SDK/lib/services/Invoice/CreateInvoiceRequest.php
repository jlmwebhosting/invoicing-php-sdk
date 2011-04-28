<?php
require_once("InvoiceService.php");
require_once("Invoice.php");

class CreateInvoice
{
	public function doCreateInvoice()
	{
		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		
		$item = new InvoiceItemType();
		$item->name = "product1";
		$item->quantity = 10;
		$item->unitPrice = 1.2;
		
		
		$invo = new InvoiceType();
		//$invo->billingInfo
		$invo->currencyCode = 'USD';
		$invo->dueDate = "1968-01-01";
		$invo->invoiceDate = "1968-01-01";
		$invo->merchantEmail = "jbui-us-business1@paypal.com";
		$invo->payerEmail = "jb-us-seller1@paypal.com";
		$invo->items = array($item);
		$invo->paymentTerms = "DueOnReceipt";
		/*$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->
		$invo->*/
		$req = new CreateInvoiceRequest();
		$req->invoice = $invo;
		$req->requestEnvelope = $env;
		$invc = new InvoiceService();
		$ret = $invc->CreateInvoice($req);
		
		}
}
$invoice = New CreateInvoice();
$invoice->doCreateInvoice();