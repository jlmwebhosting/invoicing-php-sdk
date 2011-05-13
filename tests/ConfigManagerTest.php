<?php
require_once 'PPConfigurationException.php';
require_once 'PPConfigManager.php';
require_once 'PHPUnit/Framework.php';

class PPConfigManagerTest extends PHPUnit_FrameWork_TestCase{

	/**
	 * @test
	 */		
	function getSingleValue() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->get("service.EndPoint");
		$this->assertEquals($result,"https://stage2sc5376.sc4.paypal.com:10630/");
	}
	
	/**
	 * @test
	 */	
	function getMultipleValues() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->get("acct");
		$this->assertEquals(sizeof($result), 10);
	}

	/**
	 * @test
	 */		
	function getIniPrefix() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->getIniPrefix("jb-us-seller1_api1.paypal.com");
		$this->assertEquals($result,"acct1");
	}

	/**
	 * @test
	 */		
	function getAllConfiguredAccounts() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->getIniPrefix();
		$this->assertEquals(sizeof($result), 2);
	}
	
}

?>