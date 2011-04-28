<?php
require_once 'PHPUnit/Framework.php';
require_once 'PPUtils.php';

class UtilsTest extends PHPUnit_FrameWork_TestCase {

	/**
	 * @test
	 */			
	public function checkArrayMatches() {
		
		$arr = array('key1' => 'somevalue', 'key2' => 'someothervalue');
		$this->assertEquals(PPUtils::array_match_key($arr, "key"), true);
		
		$arr = unserialize('a:10:{s:26:"responseEnvelope.timestamp";s:35:"2011-04-19T04%3A32%3A29.469-07%3A00";s:20:"responseEnvelope.ack";s:7:"Failure";s:30:"responseEnvelope.correlationId";s:13:"c2514f258ddf1";s:22:"responseEnvelope.build";s:7:"1829457";s:16:"error(0).errorId";s:6:"580027";s:15:"error(0).domain";s:8:"PLATFORM";s:17:"error(0).severity";s:5:"Error";s:17:"error(0).category";s:11:"Application";s:16:"error(0).message";s:44:"Prohibited+request+parameter%3A+businessInfo";s:21:"error(0).parameter(0)";s:12:"businessInfo";}');
		$this->assertEquals(PPUtils::array_match_key($arr, "error(0)."), true);
	}
}
