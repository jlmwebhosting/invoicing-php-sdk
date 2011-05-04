pass<?php

require_once 'PPMissingCredentialException.php';
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';

/**
 * API signature based credentials
 */
class PPSignatureCredential extends IPPCredential {
	
	/**
	 * API Signature
	 * @var string
	 */
	private $signature;

	public function __construct($userName, $password, $signature, $appId){
		parent::__construct($userName, $password, $appId);		
		$this->signature = $signature;
		$this->validate();
	}
	
	public function validate() {
		
		if ($this->userName == null || $this->userName == "") {
			throw new MissingCredentialException("username cannot be empty");
		}
		if ($this->password == null || $this->password == "") {
			throw new MissingCredentialException("password cannot be empty");
		}
		if ($this->signature == null || $this->signature == "") {
			throw new MissingCredentialException("signature cannot be empty");
		}
		if ($this->applicationId == null || $this->applicationId == "") {
			throw new MissingCredentialException("applicationId cannot be empty");
		}
	}

	public function getSignature(){
		return $this->signature;
	}
}
?>
