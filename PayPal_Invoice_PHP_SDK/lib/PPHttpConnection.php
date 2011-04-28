<?php
require_once 'PPConnectionException.php';

class PPHttpConnection
{

	const GET = 'GET';
	const POST = 'POST';
	
	private $curlOpt = array();
	private $retry;
	
	private $logger;	
	private static $retryCodes = array('401', '403', '404', '500');

	public static $DEFAULT_CURL_OPTS = array(
		CURLOPT_CONNECTTIMEOUT => 10,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT        => 60,
		CURLOPT_USERAGENT      => 'PayPal-PHP',
		CURLOPT_POST           => 1,
		CURLOPT_HTTPHEADER => array(),		
	);

	public function __construct()
	{
		$this->curlOpt = self::$DEFAULT_CURL_OPTS;
		$this->logger = new PPLoggingManager(__CLASS__);
	}
	
	/**
	 * Set ssl parameters for certificate based client authentication
	 * 
	 * @param string $certPath path to client's certificate file
	 * @param string $certKey plaintext certificate password
	 */
	public function setSSLCert($certPath, $certKey)
	{
		$this->curlOpt[CURLOPT_SSLCERT] = $certPath;
		$this->curlOpt[CURLOPT_SSLCERTPASSWD] = $certKey;
	}
	
	/**
	 * Sets connection timeout in seconds 
	 * @param integer $timeout
	 */
	public function setHttpTimeout($timeout)
	{
		$this->curlOpt[CURLOPT_CONNECTTIMEOUT] = $timeout;
	}

	public function setHttpProxy($proxy)
	{
		$urlParts = parse_url($proxy);
		
		$this->curlOpt[CURLOPT_PROXY] = $urlParts["host"];
		if(isset($urlParts["port"]))
			$this->curlOpt[CURLOPT_PROXY] .=  ":" . $urlParts["port"];											
		if(isset($urlParts["user"]))
			$this->curlOpt[URLOPT_PROXYUSERPWD]	= $urlParts["user"] . ":" . $urlParts["pass"];  											
	}
	
	/**
	 * Set whether invalid server certificates are to be trusted
	 * 
	 * @param boolean $trustAllConnection
	 */
	public function setHttpTrustAllConnection($trustAllConnection)
	{
		$this->curlOpt[CURLOPT_SSL_VERIFYPEER] = !$trustAllConnection;
		$this->curlOpt[CURLOPT_SSL_VERIFYHOST] = !$trustAllConnection;
	}
	
	public function setHttpHeaders($headers)
	{
		$this->curlOpt[CURLOPT_HTTPHEADER] = $headers;
	}
	
	/**
	 * @param integer $retry
	 */
	public function setHttpRetry($retry)
	{
		$this->$retry = $retry;
	}

	/**
	 * Executes an HTTP request
	 * 
	 * @param string $url
	 * @param string $params query string OR POST content as a string
	 * @param array $headers array of additional headers to be added
	 * @param string $method  HTTP method (GET, POST etc) defaults to POST
	 * @throws PPConnectionException
	 */
	public function execute($url, $params, $headers = null , $method = null) {
			
		$ch = curl_init($url);

		$this->curlOpt[CURLOPT_POSTFIELDS] = $params;
		$this->curlOpt[CURLOPT_URL] = $url;
		$this->curlOpt[CURLOPT_HEADER]= false;
		if(isset($headers))
		{
			$this->curlOpt[CURLOPT_HTTPHEADER] = array_merge($this->curlOpt[CURLOPT_HTTPHEADER], $headers);
		}
		foreach($this->curlOpt[CURLOPT_HTTPHEADER] as $header) {
			//TODO: Strip out credentials when logging.
			$this->logger->info("Adding header $header");
		}
		if(isset($method))
		{
			$this->curlOpt[CURLOPT_CUSTOMREQUEST] = $method;
		}
		
		// curl_setopt_array available only in PHP 5 >= 5.1.3
		curl_setopt_array($ch, $this->curlOpt);

		$result = curl_exec($ch);
		$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if(array_key_exists($httpStatus, self::$retryCodes) && isset($this->retry))
		{			
			$retries = 0;
			while($retries < $this->retry )
			{				
				$result = curl_exec($ch);
				$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				$reties++;				
			}
		}
		if (curl_errno($ch)) {
			$ex = new PPConnectionException($url, curl_error($ch), curl_errno($ch));
			curl_close($ch);
			throw $ex;
		}

		curl_close($ch);
		return $result;
	}

}
