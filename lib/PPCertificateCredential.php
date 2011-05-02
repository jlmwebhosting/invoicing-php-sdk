<?php
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';
require_once 'PPMissingCredentialException.php';

class PPCertificateCredential extends IPPCredential{
	
	private $userName;
	private $password;
	private $certificatePath;
	private $certificateKey;

	public function __construct($userName, $password, $certPath, $appId){
		$this->userName = $userName;
		$this->password = $password;
		$this->certificatePath = $certPath;
		$this->applicationId = $appId;
		$this->validate();
	}
	public function validate(){
		if ($this->userName == null || $this->userName == "") {
			throw new PPMissingCredentialException("username can't be empty");
		}
		if ($this->password == null || $this->password == "") {
			throw new PPMissingCredentialException("password can't be empty");
		}		
		if ($this->certificatePath == null || $this->certificatePath == "") {
			throw new PPMissingCredentialException("certificate can't be empty");
		}
		if ($this->applicationId == null || $this->applicationId == "") {
			throw new PPMissingCredentialException("applicationId can't be empty");
		}
	}

	public function getUserName(){
		return $this->userName;
	}
	public function getPassword(){
		return $this->password;
	}	
	public function getCertificatePath(){
		return $this->certificatePath;
	}
	public function getCertificateKey(){
		return $this->certificateKey;
	}
	public function getApplicationId() {
		return $this->applicationId;
	}

}

?>