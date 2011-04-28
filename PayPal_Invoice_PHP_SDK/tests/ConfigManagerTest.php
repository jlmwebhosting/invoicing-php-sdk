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
		$this->assertEquals($result,"https://svcs.sandbox.paypal.com/");
	}
	
	/**
	 * @test
	 */	
	function getMultipleValues() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->get("acct");
		$this->assertEquals(sizeof($result),12);
	}

	/**
	 * @test
	 */		
	function getIniPrefix1() {
		$conf = PPConfigManager::getInstance();
		$result = $conf->getIniPrefix("platfo_1255077030_biz_api1.gmail.com");
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