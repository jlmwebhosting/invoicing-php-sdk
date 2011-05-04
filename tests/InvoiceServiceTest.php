<?php
require_once 'PHPUnit/Framework.php';
require_once 'services/Invoice/InvoiceService.php';


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
		$invo->dueDate = "1968-01-01";
		$invo->invoiceDate = "1968-01-01";
		$invo->merchantEmail = "jbui-us-business1@paypal.com";
		$invo->payerEmail = "jb-us-seller1@paypal.com";
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
	
	/**
	 * @test 
	 */
	public function checkCreateInvoiceUsingAlternateConstructor() {
		
		$env = new RequestEnvelope("en_US");
		$invoice = new InvoiceType("jbui-us-business1@paypal.com", "jb-us-seller1@paypal.com",
					"USD", "DueOnReceipt");
		$invoiceItems = array(new InvoiceItemType("product1", 10, 1.5));
		$invoice->items = $invoiceItems;
				
		$req = new CreateInvoiceRequest($env, $invoice);		
		$invc = new InvoiceService();
		$ret = $invc->CreateInvoice($req);
		
		$this->assertNotNull($ret);
		$this->assertNotNull($ret->invoiceID);
		$this->assertEquals(0, count($ret->error));		
		
	}
	
}
?>