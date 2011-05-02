<?php

require_once 'PPMissingCredentialException.php';
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';

/**
 * API signature based credentials
 */
class PPSignatureCredential extends IPPCredential {
	
	/**
	 * API username
	 * @var string
	 */
	private $userName;
	/**
	 * API Password
	 * @var string
	 */
	private $password;
	/**
	 * API Signature
	 * @var string
	 */
	private $signature;

	public function __construct($userName, $password, $signature, $appId){
		
		$this->userName = $userName;
		$this->password = $password;
		$this->signature = $signature;
		$this->applicationId = $appId;
		$this->validate();
	}
	
	public function validate() {
		
		if ($this->userName == null || $this->userName == "") {
			throw new MissingCredentialException("username can't be empty");
		}
		if ($this->password == null || $this->password == "") {
			throw new MissingCredentialException("password can't be empty");
		}
		if ($this->signature == null || $this->signature == "") {
			throw new MissingCredentialException("signature can't be empty");
		}
		if ($this->applicationId == null || $this->applicationId == "") {
			throw new MissingCredentialException("applicationId can't be empty");
		}
	}

	public function getUserName(){
		return $this->userName;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getSignature(){
		return $this->signature;
	}
	public function getApplicationId() {
		return $this->applicationId;
	}	
}
?>
