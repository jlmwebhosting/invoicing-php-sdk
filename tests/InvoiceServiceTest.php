<?php
require_once 'PHPUnit/Framework.php';
require_once("services/Invoice/InvoiceService.php");


class InvoiceServiceTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @test 
	 */
	public function checkCreateInvoice() {
		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		
		$item = new InvoiceItemType();
		$item->name = "product1";
		$item->quantity = 10;
		$item->unitPrice = 1.2;
		
		
		$invo = new InvoiceType();
		$invo->currencyCode = 'USD';
		$invo->merchantEmail = "jb-us-seller1@paypal.com";
		$invo->payerEmail = "jbui-us-personal1@paypal.com";
		$invo->items = array($item);
		$invo->paymentTerms = "DueOnReceipt";

		$req = new CreateInvoiceRequest();
		$req->invoice = $invo;
		$req->requestEnvelope = $env;
		
		$invc = new InvoiceService();
		$ret = $invc->CreateInvoice($req);		

		$this->assertNotNull($ret);
		$this->assertNotNull($ret->invoiceID);
		$this->assertEquals(0, count($ret->error));		
	}
}
?>