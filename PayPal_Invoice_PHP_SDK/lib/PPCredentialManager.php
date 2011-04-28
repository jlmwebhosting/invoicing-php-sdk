<?php
require_once 'IPPCredential.php';
require_once 'PPConfigManager.php';
require_once 'PPSignatureCredential.php';
require_once 'PPCertificateCredential.php';
require_once 'PPInvalidCredentialException.php';

class PPCredentialManager
{
	
	private static $instance;
	//hashmap to contain credentials for accounts.
	private $credentialHashmap = array();
	/**
	 * Contains the API username of the default account to use
	 * when authenticating API calls.
	 * @var string
	 */
	private $defaultAccountName;
	
	/*
	 * Constructor initialize credential for multiple accounts specified in property file.
	 */
	private function __construct(){
		try {
			$this->initCredential();
		} catch (Exception $e) {
			$this->credentialHashmap = array();
			throw $e;
		}		
	}
	
	/*
	 * Create singleton instance for this class.
	 */
	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new PPCredentialManager();
		}
		return self::$instance;
	}
	
	/*
	 * Load credentials for multiple accounts, with priority given to Signature credential. 
	 */
	private function initCredential(){
		$configMgr = PPConfigManager::getInstance();
		$suffix = 1;
		$prefix = "acct";

		$credArr = $configMgr->get($prefix);
		$arrayPartKeys = $configMgr->getIniPrefix();
		if(count($arrayPartKeys) == 0)
			throw new MissingCredentialException("No valid API accounts have been configured");
			
		while (in_array($prefix.$suffix, $arrayPartKeys)){
							
			if(isset($credArr[$prefix.$suffix.".Signature"]) 
					&& $credArr[$prefix.$suffix.".Signature"] != null && $credArr[$prefix.$suffix.".Signature"] != ""){
					
				$UserName = isset($credArr[$prefix.$suffix.'.UserName']) ? $credArr[$prefix.$suffix.'.UserName'] : "";
				$Password = isset($credArr[$prefix.$suffix.'.Password']) ? $credArr[$prefix.$suffix.'.Password'] : "";
				$Signature = isset($credArr[$prefix.$suffix.'.Signature']) ? $credArr[$prefix.$suffix.'.Signature'] : "";
				$AppId = isset($credArr[$prefix.$suffix.'.AppId']) ? $credArr[$prefix.$suffix.'.AppId'] : "";
				$this->credentialHashmap[$UserName] = new PPSignatureCredential($UserName, $Password, $Signature, $AppId);
				
			} elseif (isset($credArr[$prefix.$suffix.".CertPath"]) 
					&& $credArr[$prefix.$suffix.".CertPath"] != null && $credArr[$prefix.$suffix.".CertPath"] != ""){
						
				$UserName = isset($credArr[$prefix.$suffix.'.UserName']) ? $credArr[$prefix.$suffix.'.UserName'] : "";
				$CertPath = isset($credArr[$prefix.$suffix.'.CertPath']) ? $credArr[$prefix.$suffix.'.CertPath'] : "";
				$CertKey = isset($credArr[$prefix.$suffix.'.CertKey']) ? $credArr[$prefix.$suffix.'.CertKey'] : "";
				$AppId = isset($credArr[$prefix.$suffix.'.AppId']) ? $credArr[$prefix.$suffix.'.AppId'] : "";
				$this->credentialHashmap[$UserName] = new PPCertificateCredential($UserName, $CertPath, $CertKey, $AppId);
				
			}
			if ($this->defaultAccountName == null)
				$this->defaultAccountName = $credArr[$prefix. $suffix . '.UserName'];
			$suffix++;
		}

	}

	/*
	 * Obtain Credential Object based on UserId provided.
	 */
	public function getCredentialObject($userId){
		
		if($userId == null)
			$credObj = $this->credentialHashmap[$this->defaultAccountName];
		else if (array_key_exists($userId, $this->credentialHashmap))
			$credObj = $this->credentialHashmap[$userId];
			
		if (empty($credObj)) {
			throw new PPInvalidCredentialException("Invalid userId $userId");
		}
		return $credObj;
	}
	
	
	public function __clone()
	{
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

}

?>