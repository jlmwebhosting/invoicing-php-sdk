<?php
require_once 'PPHttpConnection.php';

class PPConnectionManager
{
	/** 
	 * reference to singleton instance
	 * @var PPConnectionManager
	 */
	private static $instance;	

	private function __construct()
	{
	}
	
	public static function getInstance() {
		if( self::$instance == null ) {
			self::$instance = new PPConnectionManager();
		}
		return self::$instance;
	}

	/**
	* This function returns a new PPHttpConnection object	 
	*/
	public function getConnection() {
		
		$connection = new PPHttpConnection();
		// TODO: Add default connection params - timeout etc
		return $connection;
	}
	
}
