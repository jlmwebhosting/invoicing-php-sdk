<?php
include_once 'PPCredentialManager.php';
include_once 'PHPUnit/Framework.php';

class PPCredentialManagerTest extends PHPUnit_FrameWork_TestCase {
	
	/**
	 * @test
	 */			
	function checkCredentialObjectNotEmpty() {
		$credMgr = PPCredentialManager::getInstance();
		$IPPCredential = $credMgr->getCredentialObject('jb-us-seller2_api1.paypal.com');
		$this->assertNotNull($IPPCredential);
	}
	
	/**
	 * @test
	 */			
	function checkCredentialObjectUsername() {
		$credMgr = PPCredentialManager::getInstance();
		$IPPCredential = $credMgr->getCredentialObject('suarumugam-biz_api1.paypal.com');
		$this->assertNotNull($IPPCredential->getUserName());
	}

	/**
	 * @test
	 */			
	function checkInvalidCredential() {
		$credMgr = PPCredentialManager::getInstance();
		$this->setExpectedException('PPInvalidCredentialException');
		$IPPCredential = $credMgr->getCredentialObject('invalid_biz_api1.gmail.com');
	}
	
}

?>