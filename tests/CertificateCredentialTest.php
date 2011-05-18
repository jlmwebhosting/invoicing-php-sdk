<?php
include_once 'PPCredentialManager.php';
include_once 'PHPUnit/Framework.php';
include_once 'PPCertificateCredential.php';
class PPCertificateCredentialTest extends PHPUnit_FrameWork_TestCase {
	public $cred;
	/*
	 @setUp
	 */
	public function setUp()
	{
		$this->cred = new PPCertificateCredential("platfo_1255077030_biz_api1.gmail.com", "1255077037",
"config/sandbox-cert.pem", "APP-80W284485P519543T");

	}

	/**
	 * @test
	 */
	public function getCertificatePath() {
		
		$this->assertEquals("config/sandbox-cert.pem", $this->cred->getCertificatePath());
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