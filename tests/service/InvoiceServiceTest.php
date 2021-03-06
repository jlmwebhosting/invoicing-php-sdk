<?php
require_once 'PHPUnit/Framework.php';

require_once 'services\Invoice\InvoiceService.php';

/**
 * Test class for InvoiceService.
 * 
 */
class InvoiceServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var InvoiceService
     */
    protected $object;
	public static $invoicID;
	
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new InvoiceService;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @test
     */
    public function testCreateInvoice()
    {
       $env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		
		$item = new InvoiceItemType();
		$item->name = "product1";
		$item->quantity = 10;
		$item->unitPrice = 1.2;
		
		
		$invo = new InvoiceType();
		$invo->currencyCode = 'USD';
		$invo->merchantEmail = "jb-us-seller@paypal.com";
		$invo->payerEmail = "jbui-us-personal1@paypal.com";
		$invo->items = array($item);
		$invo->paymentTerms = "DueOnReceipt";

		$req = new CreateInvoiceRequest();
		$req->invoice = $invo;
		$req->requestEnvelope = $env;
		
		$invc = new InvoiceService();
		$ret = $invc->CreateInvoice($req);		
		self::$invoicID = $ret->invoiceID;
		$this->assertNotNull($ret);
		$this->assertNotNull($ret->invoiceID);
		$this->assertEquals(0, count($ret->error));		
		
    }

    /**
     * @test
     * Test case for permissions service integration
     */
    public function testCreateInvoiceForThirdParty()
    {
       $env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		
		$item = new InvoiceItemType();
		$item->name = "product1";
		$item->quantity = 10;
		$item->unitPrice = 1.2;
		
		
		$invo = new InvoiceType();
		$invo->currencyCode = 'USD';
		$invo->merchantEmail = "jb-us-seller2@paypal.com";
		$invo->payerEmail = "jbui-us-personal1@paypal.com";
		$invo->items = array($item);
		$invo->paymentTerms = "DueOnReceipt";

		$req = new CreateInvoiceRequest();
		$req->invoice = $invo;
		$req->requestEnvelope = $env;
		
		$invc = new InvoiceService();
		$invc->setAccessToken("iHJRdaLaHlROHt6OxkH29I53ZvCHdgEhBdMWxu4OyoB9AaKkS5YlWw");
		$invc->setTokenSecret("3M5zkwsU-F0OKhvsuSJmITYJueg");
		$ret = $invc->CreateInvoice($req);		
		$this->assertNotNull($ret);
		$this->assertNotNull($ret->invoiceID);
		$this->assertEquals(0, count($ret->error));		
		
    }
    
    /**
     * @test
     */
	public function checkSendInvoice() {

		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		$req = new SendInvoiceRequest();
		$req->invoiceID = self::$invoicID;
		$req->requestEnvelope = $env;
		$invc = new InvoiceService();
		$ret = $invc->SendInvoice($req);		
		$this->assertNotNull($ret);

		$this->assertNotNull($ret->invoiceID);
		$this->assertEquals(0, count($ret->error));		
	}

    /**
     * @test
     */
    public function testCreateAndSendInvoice()
    {
       $env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";
		
		$item = new InvoiceItemType();
		$item->name = "product1";
		$item->quantity = 10;
		$item->unitPrice = 1.2;
		
		
		$invo = new InvoiceType();
		$invo->currencyCode = 'USD';
		$invo->merchantEmail = "jb-us-seller@paypal.com";
		$invo->payerEmail = "jbui-us-personal1@paypal.com";
		$invo->items = array($item);
		$invo->paymentTerms = "DueOnReceipt";

		$req = new CreateAndSendInvoiceRequest();
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
