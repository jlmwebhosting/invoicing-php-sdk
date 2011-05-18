<?php
include_once 'PPCredentialManager.php';
include_once 'PHPUnit/Framework.php';
include_once 'PPSignatureCredential.php';
class PPSignatureCredentialTest extends PHPUnit_FrameWork_TestCase {
	public $cred;
	/*
	 @setUp
	 */
	public function setUp()
	{
		$this->cred = new PPSignatureCredential("platfo_1255077030_biz_api1.gmail.com",
"1255077037",
"Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf",
"APP-80W284485P519543T");
	}

	/**
	 * @test
	 */
	public function getSignature() {
		
		$this->assertEquals("Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf", $this->cred->getSignature());
	}

	/**
	 * @test
	 */
	public function getPassword() {
		$this->assertEquals("1255077037", $this->cred->getPassword());
	}

	/**
	 * @test
	 */

	public function validate()
	{
		$this->setExpectedException('PPMissingCredentialException');
		$cred = new PPCertificateCredential(
		null, "1255077037","cert/sandbox-cert.pem", "APP-80W284485P519543T");
		
		$cred->validate();
	}

	/**
	 * @tearDown
	 */

	public function tearDown() {
		$cred = null;

	}
}
?>