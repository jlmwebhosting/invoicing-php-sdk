<?php

abstract class IPPCredential
{	
	protected $applicationId;
	
	protected abstract function validate();	
	
	public function getApplicationId(){
		return $this->applicationId;
	}
}

?>