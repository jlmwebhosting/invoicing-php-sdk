<?php
require_once 'PPCredentialManager.php';
require_once 'PPConnectionManager.php';
require_once 'PPObjectTransformer.php';
require_once 'PPLoggingManager.php';

class PPAPIService
{
	public $endpoint;
	public $serviceName;	
	private $logger;
	
	public function __construct($serviceName = "")
	{
		$this->serviceName = $serviceName;
		$config = PPConfigManager::getInstance();
		$this->endpoint = $config->get('service.EndPoint');
		$this->logger = new PPLoggingManager(__CLASS__);			
	}

	public function setServiceName($serviceName)
	{
		$this->serviceName = $serviceName;
	}

	private function getPayPalHeaders($apiCred, $conf, $connection)
	{
		// Add headers required for service authentication
		if($apiCred instanceof PPSignatureCredential)
		{			
			$headers_arr[] = "X-PAYPAL-SECURITY-USERID:  " . $apiCred->getUserName();
			$headers_arr[] = "X-PAYPAL-SECURITY-PASSWORD: " . $apiCred->getPassword();
			$headers_arr[] = "X-PAYPAL-SECURITY-SIGNATURE: " . $apiCred->getSignature();
		}
		else if($apIPPCredential instanceof PPCertificateCredential)
		{
			$headers_arr[] = "X-PAYPAL-SECURITY-USERID:  " . $apiCred->getUserName();
			$connection->setSSLCert($apiCred->certPath(), $apiCred->certKey());
		} 
		
		// Add other headers 
		$headers_arr[] = "X-PAYPAL-APPLICATION-ID: " . $conf->get('acct1.AppId');
		$headers_arr[] = "X-PAYPAL-REQUEST-DATA-FORMAT: "  . $conf->get('service.Binding');
		$headers_arr[] = "X-PAYPAL-RESPONSE-DATA-FORMAT: "  . $conf->get('service.Binding');
		$headers_arr[] = "X-PAYPAL-SANDBOX-EMAIL-ADDRESS: Platform.sdk.seller@gmail.com";
		$headers_arr[] = "X-PAYPAL-DEVICE-IPADDRESS: 127.0.0.1";
		//$headers_arr[] = "X-PAYPAL-REQUEST-SOURCE: " . SDK_VERSION;
		return $headers_arr;
	}
	
	public function makeRequest($apiMethod, $params, $apiUsername = null)
	{
		
		$config = PPConfigManager::getInstance();
		$connectionMgr = PPConnectionManager::getInstance();
		$connection = $connectionMgr->getConnection();		
		
		$credMgr = PPCredentialManager::getInstance();
		// $apiUsernam is optional, if null the default account in congif file is taken
		$apIPPCredential = $credMgr->getCredentialObject($apiUsername );
		$headers = $this->getPayPalHeaders($apIPPCredential, $config, $connection);
		
		
		//TODO: logic for checking if '/'	is set properly	
		$url = $this->endpoint . $this->serviceName . '/' . $apiMethod;
		
		//XXX: The is_object testing is valid only during testing
		// In the final version, $params will always be an object

		if(is_object($params)) {
			$params = $this->marshall($params);
		}

		$connection->setHttpTrustAllConnection(true);
		$this->logger->info("Request: $params");
		$response = $connection->execute($url, $params, $headers);
		$this->logger->info("Response: $response");
		return $response;
	}

	private function marshall($object)
	{
		$transformer = new PPObjectTransformer();		
		return $transformer->toString($object);
	}	
	
}
