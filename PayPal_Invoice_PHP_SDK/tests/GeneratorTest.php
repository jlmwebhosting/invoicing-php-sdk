<?php
require_once 'PHPUnit/Framework.php';
require_once("services/AdaptiveAccounts/AdaptiveAccountsService.php");
require_once("services/AdaptiveAccounts/AdaptiveAccounts.php");

class AAGeneratorTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */				
	public function checkAPIWrapperClass() {
		
		$className = "AdaptiveAccountsService";
		$this->assertClassHasAttribute("serviceName", $className);

		$aa = new AdaptiveAccountsService();	
		$this->assertEquals($aa->getServiceName(), "AdaptiveAccounts");
	}

	/**
	 * @test
	 */				
	public function checkCreateAccountStubs() {
		
		$className = "CreateAccountRequest";
		$createAccountReq = new $className();
		
		$attribs = array("accountType", "name", "dateOfBirth", "address", "contactPhoneNumber",
				"homePhoneNumber", "mobilePhoneNumber", "currencyCode", "citizenshipCountryCode",
				"preferredLanguageCode", "notificationURL", "emailAddress", "registrationType",
				"createAccountWebOptions", "suppressWelcomeEmail", "performExtraVettingOnThisAccount",
				"partnerField1", "partnerField2", "partnerField3", "partnerField4", "partnerField5",
				"businessInfo");
		
		foreach($attribs as $attrib) {
			$this->assertClassHasAttribute($attrib, $className);	
		}		 
	}
	
	/**
	 * @test
	 * Test methods on the service stub
	 */
	public function checkOperationWrapperFunction() {
		$className = "AdaptiveAccountsService";
		
		$reflector = new ReflectionClass($className);
		$m = $reflector->getMethod("CreateAccount");
		$this->assertNotNull($m);		
	}
	
	/**
	 * @test
	 */				
	public function checkWSDLAnnotationIsParsed() {
		
	}
	
}
?>