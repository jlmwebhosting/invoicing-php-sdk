<?php
require_once 'PHPUnit/Framework.php';
require_once 'PPHttpConnection.php';
require_once 'PPAPIService.php';

class PPHttpConnectionTest extends PHPUnit_Framework_TestCase {
	private function getPayPalHeaders()
	{
			
		$headers_arr[] = "X-PAYPAL-SECURITY-USERID: jb-us-seller1_api1.paypal.com " ;
		$headers_arr[] = "X-PAYPAL-SECURITY-PASSWORD: Y382QH72D4MQYJT3";
		$headers_arr[] = "X-PAYPAL-SECURITY-SIGNATURE: AO5YpL3NU.zkhUje4dIKD33KcJ9wARbnOle0-IpAhVGFqDVlwmmQ.vSV";
		// Add other headers
		$headers_arr[] = "X-PAYPAL-APPLICATION-ID: APP-5XV204960S3290106";
		$headers_arr[] = "X-PAYPAL-REQUEST-DATA-FORMAT: NV";
		$headers_arr[] = "X-PAYPAL-RESPONSE-DATA-FORMAT: NV";

		return $headers_arr;
	}

	/**
	 * test
	 */
	public function execute() {
		$url = "https://stage2sc5376.sc4.paypal.com:10630/Invoice/CreateInvoice";
		$params = "requestEnvelope.detailLevel=ReturnAll&requestEnvelope.errorLanguage=en_US&invoice.merchantEmail=jb-us-seller1@paypal.com&invoice.payerEmail=jbui-us-personal1@paypal.com&invoice.items[0].name=product1&invoice.items[0].quantity=10.0&invoice.items[0].unitPrice=1.2&invoice.currencyCode=USD&invoice.paymentTerms=DueOnReceipt";
		$headers = $this->getPayPalHeaders();

		$HTTPObj = new PPHttpConnection();
		$HTTPObj->setHttpTrustAllConnection(true);
		$res = $HTTPObj->execute($url, $params, $headers);
		var_dump($res);
		$this->assertNotNull($res);
		$this->assertContains('responseEnvelope.ack=Success', $res);
		$this->assertNotContains('responseEnvelope.ack=Failure', $res);
		
	/**
	 * @test
	 */
	
}
?>