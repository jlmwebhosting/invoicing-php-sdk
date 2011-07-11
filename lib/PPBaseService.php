<?php
require_once 'PPAPIService.php';


class PPBaseService {
	
	private $serviceName;
	
	public function __construct($serviceName) {
		$this->serviceName = $serviceName;
	}
	
	public function getServiceName() {
		return $this->serviceName;
	}
	
	public function call($method, $requestObject, $apiUsername = null, $accessToken = null, $tokenSecret = null) {
		$service = new PPAPIService();
		$service->setServiceName($this->serviceName);
		if(isset($this->accessToken) && isset($this->tokenSecret))
		return $service->makeRequest($method, $requestObject, $apiUsername ,$accessToken, $tokenSecret);
		else
		return $service->makeRequest($method, $requestObject, $apiUsername);
	}
}
?>
