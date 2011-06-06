<?php
require_once 'PHPUnit/Framework.php';

require_once 'services\Invoice\Invoice.php';

/**
 * Test class for InvoiceType.
 * 
 */
class InvoiceTypeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var InvoiceType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        
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
    public function testToNVPString()
    {
    	
   	    $this->object = new InvoiceType("jb-us-seller1@paypal.com", "jbui-us-personal1@paypal.com",  "USD", 'DUEONRECEIPT');
    	
   $busInfo = new BusinessInfoType();
   $busInfo->firstName = "John";
   $busInfo->lastName = "Smith";
   $busInfo->address = new BaseAddress("Main St", "San Jose", "US");

   $invItem = new InvoiceItemType("product1", 10.0, 1.2);

   
    	$this->object->number ="INV-2011";
    	$this->object->merchantInfo =$busInfo;
    	$this->object->items =array($invItem);
    	
    	$this->object->invoiceDate = "23-Jun-2011";
    	$this->object->dueDate = "30-Jun-2011";
    	
    	$this->object->discountAmount = 100.0;
    	$this->object->discountPercent = 12.0;
    	$this->object->note = "Invoicing Product";
    	$this->object->terms ="Invoice";
    	$this->object->merchantMemo ="Invoicing Product";
    	$this->object->billingInfo = $busInfo;
    	$this->object->shippingAmount = 200.0;
    	$this->object->shippingInfo =$busInfo;
    	$this->object->shippingTaxName = "Invoicing Product";
    	$this->object->shippingTaxRate = 12.5;
    	$ret = $this->object->toNVPString('invoice.');
    	var_dump($ret);
    	$this->assertEquals("invoice.merchantEmail=jb-us-seller1%40paypal.com&invoice.payerEmail=jbui-us-personal1%40paypal.com&invoice.number=INV-2011&invoice.merchantInfo.firstName=John&invoice.merchantInfo.lastName=Smith&invoice.merchantInfo.address.line1=Main+St&invoice.merchantInfo.address.city=San+Jose&invoice.merchantInfo.address.countryCode=US&invoice.items(0).name=product1&invoice.items(0).quantity=10&invoice.items(0).unitPrice=1.2&invoice.currencyCode=USD&invoice.invoiceDate=23-Jun-2011&invoice.dueDate=30-Jun-2011&invoice.paymentTerms=DUEONRECEIPT&invoice.discountPercent=12&invoice.discountAmount=100&invoice.terms=Invoice&invoice.note=Invoicing+Product&invoice.merchantMemo=Invoicing+Product&invoice.billingInfo.firstName=John&invoice.billingInfo.lastName=Smith&invoice.billingInfo.address.line1=Main+St&invoice.billingInfo.address.city=San+Jose&invoice.billingInfo.address.countryCode=US&invoice.shippingInfo.firstName=John&invoice.shippingInfo.lastName=Smith&invoice.shippingInfo.address.line1=Main+St&invoice.shippingInfo.address.city=San+Jose&invoice.shippingInfo.address.countryCode=US&invoice.shippingAmount=200&invoice.shippingTaxName=Invoicing+Product&invoice.shippingTaxRate=12.5", $ret);
    	
    }
    
    
}



?>