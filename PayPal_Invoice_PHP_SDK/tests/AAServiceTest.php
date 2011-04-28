<?php
require_once 'PHPUnit/Framework.php';
require_once("services/AdaptiveAccounts/AdaptiveAccountsService.php");
require_once("services/AdaptiveAccounts/AdaptiveAccounts.php");

class AAServiceTest extends PHPUnit_Framework_TestCase {
	/**	 
	 * @donottest
	 */
	public function getVerifiedStatus() {
		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";		

		$req = new GetVerifiedStatusRequest();
		$req->requestEnvelope = $env;		
		$req->emailAddress = "platfo@paypal.com";
		$req->matchCriteria = "NONE";		
		
		$aa = new AdaptiveAccountsService();
		$ret = $aa->GetVerifiedStatus($req);				
	}
	
	/**
	 * @donottest
	 */
	public function getUserAgreement() {
		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";		
		
		$req = new GetUserAgreementRequest();
		$req->requestEnvelope = $env;
		$req->createAccountKey = "AA-1P246622KH700273Y";
		
		
		$aa = new AdaptiveAccountsService();
		$ret = $aa->GetUserAgreement($req);
						
	}
	
	/**
	 * @test
	 */
	public function createAccount() {
		$env = new RequestEnvelope();
		$env->errorLanguage = "en_US";
		$env->detailLevel = "ReturnAll";

       	$address = new AddressType();
       	$address->city = "Austin";
       	$address->countryCode = "US";
       	$address->line1 = "1968 Ape Way";
       	$address->line2 = "Apt 123";
       	$address->postalCode = 78750;
       	$address->state = "TX" ;

       	$name = new NameType();
       	$name->firstName = "Vidya";       	
       	$name->lastName = "C";
       	$name->salutation = "Ms.";       	
		
		$req = new CreateAccountRequest();
		$req->requestEnvelope = $env;
		$req->address = $address;		
		$req->citizenshipCountryCode = "US";
		$req->contactPhoneNumber = "5126914160";
		$req->currencyCode = "USD";
		$req->dateOfBirth = "1968-01-01Z";
       	$req->name = $name;       	       	
       	$req->notificationURL = "http://paypal.com/";
       	$req->preferredLanguageCode = "en_US";
       	

       	$bizInfo = new BusinessInfoType();
       	$bizInfo->businessName = "Bonzop";
       	$bizAddress = new AddressType();
       	$bizAddress->city = "Austin";
       	$bizAddress->countryCode = "US";
       	$bizAddress->line1 = "1968 Ape Way";
       	$bizAddress->line2 = "Apt 123";
       	$bizAddress->postalCode = "78750";
       	$bizAddress->state = "TX";
       	$bizInfo->businessAddress = $bizAddress;
       			       	
		$bizInfo->workPhone = "5126914160";
		$bizInfo->category = "1001";
		$bizInfo->subCategory = "2001";
		$bizInfo->customerServicePhone = "5126914160";
		$bizInfo->customerServiceEmail = "platfo_1255076101_per@gmail.com";
		$bizInfo->webSite = "https://www.x.com";
		$bizInfo->dateOfEstablishment = "2000-01-01";
		$bizInfo->businessType = "INDIVIDUAL";
		$bizInfo->averagePrice = 1.00;
		$bizInfo->averageMonthlyVolume = 1.00;
		$bizInfo->percentageRevenueFromOnline = 60;
		$bizInfo->salesVenue = array('WEB', 'EBAY');
		$req->businessInfo = $bizInfo;
		

       	$req->createAccountWebOptions = new CreateAccountWebOptionsType();
        $url = dirname('http://localhost/someurl.php');
        $returnURL = $url."/CreateAccountDetails.php";

       	$req->createAccountWebOptions->returnUrl = $returnURL;
		$req->registrationType = "WEB";
       	
		$req->sandboxEmailAddress = "Platform.sdk.seller@gmail.com";
       	$req->emailAddress = "unittest@gmail.com";
       	
       	$req->accountType = "PERSONAL";
		$aa = new AdaptiveAccountsService();
		$ret = $aa->CreateAccount($req);
		
		$this->assertEquals(get_class($ret), "CreateAccountResponse");
		//$this->assertGreaterThan(0, count($ret->error));
		
		$req->accountType = "BUSINESS";
		$ret = $aa->CreateAccount($req);
		
		$this->assertEquals(get_class($ret), "CreateAccountResponse");
		$this->assertEquals($ret->responseEnvelope->ack, "Success");
		$this->assertNotNull($ret->createAccountKey);
		//$this->assertNull($ret->error);	
								
	}
}