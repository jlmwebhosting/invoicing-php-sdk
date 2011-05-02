<?php

require_once 'PHPUnit/Framework.php';
require_once 'PPConnectionManager.php';


class PPConnectionManagerTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */			
	public function createConnection() {
		$connectionMgr = PPConnectionManager::getInstance();
		$conn = $connectionMgr->getConnection();
		$this->assertNotNull($conn);
		$this->assertEquals(get_class($conn), "PPHttpConnection");
	}	
}
?>