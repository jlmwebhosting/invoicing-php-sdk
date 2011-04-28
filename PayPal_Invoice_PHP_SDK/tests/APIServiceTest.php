<?php
require_once 'PHPUnit/Framework.php';
require_once 'PPAPIService.php';
require_once 'services/AdaptiveAccounts/AdaptiveAccounts.php';


class PPAPIServiceTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function callValidService() {
		
		$service = new PPAPIService();
		$service->setServiceName('AdaptivePayments');
		$reqStr = 'payKey=AP-46V04347A2499431S&requestEnvelope.errorLanguage=en_US';
		$response = $service->makeRequest('PaymentDetails', $reqStr, 'platfo_1255077030_biz_api1.gmail.com');
		$this->assertNotNull($response);
	}
	
	/**
	 * @test
	 */	
	public function doSimpleSerialization() {

		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";		
		$req->requestEnvelope = $env;

		$req = new GetVerifiedStatusRequest();		
		$req->emailAddress = "platfo@paypal.com";
		$req->matchCriteria = "NONE";		
		
		$PPAPIService = new PPAPIService();		
		$PPAPIService->setServiceName('AdaptiveAccounts');		
		$response = $PPAPIService->makeRequest('GetVerifiedStatus', $req, 'platfo_1255077030_biz_api1.gmail.com');
		$this->assertNotNull($response);
	}	
}
?>