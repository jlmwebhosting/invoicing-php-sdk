<?php
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';
require_once 'PPMissingCredentialException.php';

class PPCertificateCredential extends IPPCredential{
	
	private $userName;
	private $certificate;
	private $certificateKey;

	public function __construct($userName, $certPath, $certKey, $appId){
		$this->userName = $userName;
		$this->certificate = $certPath;
		$this->certificateKey = $certKey;
		$this->applicationId = $appId;
		$this->validate();
	}
	public function validate(){
		if ($this->userName == null || $this->userName == "") {
			throw new PPMissingCredentialException("username can't be empty");
		}
		if ($this->certificate == null || $this->certificate == "") {
			throw new PPMissingCredentialException("certificate can't be empty");
		}
		if ($this->certificateKey == null || $this->certificateKey == "") {
			throw new PPMissingCredentialException("certificateKey can't be empty");
		}
		if ($this->applicationId == null || $this->applicationId == "") {
			throw new PPMissingCredentialException("applicationId can't be empty");
		}
	}

	public function getUserName(){
		return $this->userName;
	}
	public function getCertificate(){
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