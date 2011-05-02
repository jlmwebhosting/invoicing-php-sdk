<?php

/**
 * Base class that represents API credentials
 */
abstract class IPPCredential
{	
	/**
	 * Application ID that uniquely identifies the application
	 * @var string
	 */
	protected $applicationId;
	
	protected abstract function validate();	
	
	public function getApplicationId(){
		return $this->applicationId;
	}
}

?>