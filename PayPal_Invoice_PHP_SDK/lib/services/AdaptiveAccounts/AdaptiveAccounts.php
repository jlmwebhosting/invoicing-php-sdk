<?php
if (!class_exists("ErrorData")) {
/**
 * ErrorData
 *  *
 * This type contains the detailed error
 * information resulting from the service
 * operation.
 *
 */
class ErrorData {
	/**
	 * @access public
	 * @var integer
	 */
	public $errorId;
	/**
	 * @access public
	 * @var string
	 */
	public $domain;
	/**
	 * @access public
	 * @var string
	 */
	public $subdomain;
	/**
	 * @access public
	 * @var ErrorSeverity
	 */
	public $severity;
	/**
	 * @access public
	 * @var ErrorCategory
	 */
	public $category;
	/**
	 * @access public
	 * @var string
	 */
	public $message;
	/**
	 * @access public
	 * @var string
	 */
	public $exceptionId;
	/**
	 * array
	 * @access public
	 * @var ErrorParameter
	 */
	public $parameter;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'errorId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->errorId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'domain';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->domain = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'subdomain';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->subdomain = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'severity';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->severity = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'category';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->category = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'message';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->message = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'exceptionId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->exceptionId = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->errorId != null ) {
			$str .= $delim .  $prefix . 'errorId=' . urlencode($this->errorId);
			$delim = '&';
		}
		if( $this->domain != null ) {
			$str .= $delim .  $prefix . 'domain=' . urlencode($this->domain);
			$delim = '&';
		}
		if( $this->subdomain != null ) {
			$str .= $delim .  $prefix . 'subdomain=' . urlencode($this->subdomain);
			$delim = '&';
		}
		if( $this->severity != null ) {
			$str .= $delim .  $prefix . 'severity=' . urlencode($this->severity);
			$delim = '&';
		}
		if( $this->category != null ) {
			$str .= $delim .  $prefix . 'category=' . urlencode($this->category);
			$delim = '&';
		}
		if( $this->message != null ) {
			$str .= $delim .  $prefix . 'message=' . urlencode($this->message);
			$delim = '&';
		}
		if( $this->exceptionId != null ) {
			$str .= $delim .  $prefix . 'exceptionId=' . urlencode($this->exceptionId);
			$delim = '&';
		}
		for($i=0; $i<count($this->parameter);$i++) {
			$newPrefix = $prefix . "parameter($i).";
			$str .= $delim . call_user_func(array($this->parameter, 'toNVPString'), $newPrefix);
		 }

		return $str;
	}

}}

if (!class_exists("ErrorParameter")) {
/**
 * ErrorParameter
 */
class ErrorParameter {

	public function __construct($map = null, $prefix='') {
		if($map != null) {
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';

		return $str;
	}

}}

if (!class_exists("RequestEnvelope")) {
/**
 * RequestEnvelope
 *  *
 * This specifies the list of parameters with every
 * request to the service.
 *
 * This specifies the required detail level
 * that is needed by a client application
 * pertaining to a particular data
 * component (e.g., Item, Transaction,
 * etc.). The detail level is specified in
 * the DetailLevelCodeType which has all
 * the enumerated values of the detail
 * level for each component.
 *
 * This should be the standard RFC 3066
 * language identification tag, e.g.,
 * en_US.
 *
 */
class RequestEnvelope {
	/**
	 * @access public
	 * @var DetailLevelCode
	 */
	public $detailLevel;
	/**
	 * @access public
	 * @var string
	 */
	public $errorLanguage;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'detailLevel';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->detailLevel = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'errorLanguage';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->errorLanguage = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->detailLevel != null ) {
			$str .= $delim .  $prefix . 'detailLevel=' . urlencode($this->detailLevel);
			$delim = '&';
		}
		if( $this->errorLanguage != null ) {
			$str .= $delim .  $prefix . 'errorLanguage=' . urlencode($this->errorLanguage);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("ResponseEnvelope")) {
/**
 * ResponseEnvelope
 *  *
 * This specifies a list of parameters with every
 * response from a service.
 *
 * Application level acknowledgement code.
 *
 */
class ResponseEnvelope {
	/**
	 * @access public
	 * @var dateTime
	 */
	public $timestamp;
	/**
	 * @access public
	 * @var AckCode
	 */
	public $ack;
	/**
	 * @access public
	 * @var string
	 */
	public $correlationId;
	/**
	 * @access public
	 * @var string
	 */
	public $build;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'timestamp';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->timestamp = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'ack';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->ack = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'correlationId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->correlationId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'build';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->build = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->timestamp != null ) {
			$str .= $delim .  $prefix . 'timestamp=' . urlencode($this->timestamp);
			$delim = '&';
		}
		if( $this->ack != null ) {
			$str .= $delim .  $prefix . 'ack=' . urlencode($this->ack);
			$delim = '&';
		}
		if( $this->correlationId != null ) {
			$str .= $delim .  $prefix . 'correlationId=' . urlencode($this->correlationId);
			$delim = '&';
		}
		if( $this->build != null ) {
			$str .= $delim .  $prefix . 'build=' . urlencode($this->build);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("ClientDetailsType")) {
/**
 * ClientDetailsType
 *  *
 * This elements in this type refers to the end
 * user of the application invoking this service.
 *
 */
class ClientDetailsType {
	/**
	 * @access public
	 * @var string
	 */
	public $ipAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $deviceId;
	/**
	 * @access public
	 * @var string
	 */
	public $applicationId;
	/**
	 * @access public
	 * @var string
	 */
	public $model;
	/**
	 * @access public
	 * @var string
	 */
	public $geoLocation;
	/**
	 * @access public
	 * @var string
	 */
	public $customerType;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerName;
	/**
	 * @access public
	 * @var string
	 */
	public $customerId;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'ipAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->ipAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'deviceId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->deviceId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'applicationId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->applicationId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'model';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->model = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'geoLocation';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->geoLocation = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'customerType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->customerType = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'customerId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->customerId = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->ipAddress != null ) {
			$str .= $delim .  $prefix . 'ipAddress=' . urlencode($this->ipAddress);
			$delim = '&';
		}
		if( $this->deviceId != null ) {
			$str .= $delim .  $prefix . 'deviceId=' . urlencode($this->deviceId);
			$delim = '&';
		}
		if( $this->applicationId != null ) {
			$str .= $delim .  $prefix . 'applicationId=' . urlencode($this->applicationId);
			$delim = '&';
		}
		if( $this->model != null ) {
			$str .= $delim .  $prefix . 'model=' . urlencode($this->model);
			$delim = '&';
		}
		if( $this->geoLocation != null ) {
			$str .= $delim .  $prefix . 'geoLocation=' . urlencode($this->geoLocation);
			$delim = '&';
		}
		if( $this->customerType != null ) {
			$str .= $delim .  $prefix . 'customerType=' . urlencode($this->customerType);
			$delim = '&';
		}
		if( $this->partnerName != null ) {
			$str .= $delim .  $prefix . 'partnerName=' . urlencode($this->partnerName);
			$delim = '&';
		}
		if( $this->customerId != null ) {
			$str .= $delim .  $prefix . 'customerId=' . urlencode($this->customerId);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("FaultMessage")) {
/**
 * FaultMessage
 *  *
 * This specifies a fault, encapsulating error
 * data, with specific error codes.
 *
 */
class FaultMessage {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		for($i=0; $i<count($this->error);$i++) {
			$newPrefix = $prefix . "error($i).";
			$str .= $delim . call_user_func(array($this->error, 'toNVPString'), $newPrefix);
		 }

		return $str;
	}

}}

if (!class_exists("CreateAccountRequest")) {
/**
 * CreateAccountRequest
 */
class CreateAccountRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var ClientDetailsType
	 */
	public $clientDetails;
	/**
	 * @access public
	 * @var string
	 */
	public $accountType;
	/**
	 * @access public
	 * @var NameType
	 */
	public $name;
	/**
	 * @access public
	 * @var date
	 */
	public $dateOfBirth;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $address;
	/**
	 * @access public
	 * @var string
	 */
	public $contactPhoneNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $homePhoneNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $mobilePhoneNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $currencyCode;
	/**
	 * @access public
	 * @var string
	 */
	public $citizenshipCountryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $preferredLanguageCode;
	/**
	 * @access public
	 * @var string
	 */
	public $notificationURL;
	/**
	 * @access public
	 * @var string
	 */
	public $emailAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $registrationType;
	/**
	 * @access public
	 * @var CreateAccountWebOptionsType
	 */
	public $createAccountWebOptions;
	/**
	 * @access public
	 * @var boolean
	 */
	public $suppressWelcomeEmail;
	/**
	 * @access public
	 * @var boolean
	 */
	public $performExtraVettingOnThisAccount;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerField1;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerField2;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerField3;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerField4;
	/**
	 * @access public
	 * @var string
	 */
	public $partnerField5;
	/**
	 * @access public
	 * @var BusinessInfoType
	 */
	public $businessInfo;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$newPrefix = $prefix ."clientDetails.";
			$this->clientDetails = new ClientDetailsType($map, $newPrefix);
			$mapKeyName =  $prefix . 'accountType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountType = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."name.";
			$this->name = new NameType($map, $newPrefix);
			$mapKeyName =  $prefix . 'dateOfBirth';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->dateOfBirth = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."address.";
			$this->address = new AddressType($map, $newPrefix);
			$mapKeyName =  $prefix . 'contactPhoneNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->contactPhoneNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'homePhoneNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->homePhoneNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'mobilePhoneNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->mobilePhoneNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'currencyCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->currencyCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'citizenshipCountryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->citizenshipCountryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'preferredLanguageCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->preferredLanguageCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'notificationURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->notificationURL = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'emailAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->emailAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'registrationType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->registrationType = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."createAccountWebOptions.";
			$this->createAccountWebOptions = new CreateAccountWebOptionsType($map, $newPrefix);
			$mapKeyName =  $prefix . 'suppressWelcomeEmail';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->suppressWelcomeEmail = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'performExtraVettingOnThisAccount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->performExtraVettingOnThisAccount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerField1';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerField1 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerField2';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerField2 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerField3';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerField3 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerField4';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerField4 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'partnerField5';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->partnerField5 = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."businessInfo.";
			$this->businessInfo = new BusinessInfoType($map, $newPrefix);
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->clientDetails != null ) {
			$newPrefix = $prefix . 'clientDetails.';
			$str .= $delim . call_user_func(array($this->clientDetails, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->accountType != null ) {
			$str .= $delim .  $prefix . 'accountType=' . urlencode($this->accountType);
			$delim = '&';
		}
		if( $this->name != null ) {
			$newPrefix = $prefix . 'name.';
			$str .= $delim . call_user_func(array($this->name, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->dateOfBirth != null ) {
			$str .= $delim .  $prefix . 'dateOfBirth=' . urlencode($this->dateOfBirth);
			$delim = '&';
		}
		if( $this->address != null ) {
			$newPrefix = $prefix . 'address.';
			$str .= $delim . call_user_func(array($this->address, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->contactPhoneNumber != null ) {
			$str .= $delim .  $prefix . 'contactPhoneNumber=' . urlencode($this->contactPhoneNumber);
			$delim = '&';
		}
		if( $this->homePhoneNumber != null ) {
			$str .= $delim .  $prefix . 'homePhoneNumber=' . urlencode($this->homePhoneNumber);
			$delim = '&';
		}
		if( $this->mobilePhoneNumber != null ) {
			$str .= $delim .  $prefix . 'mobilePhoneNumber=' . urlencode($this->mobilePhoneNumber);
			$delim = '&';
		}
		if( $this->currencyCode != null ) {
			$str .= $delim .  $prefix . 'currencyCode=' . urlencode($this->currencyCode);
			$delim = '&';
		}
		if( $this->citizenshipCountryCode != null ) {
			$str .= $delim .  $prefix . 'citizenshipCountryCode=' . urlencode($this->citizenshipCountryCode);
			$delim = '&';
		}
		if( $this->preferredLanguageCode != null ) {
			$str .= $delim .  $prefix . 'preferredLanguageCode=' . urlencode($this->preferredLanguageCode);
			$delim = '&';
		}
		if( $this->notificationURL != null ) {
			$str .= $delim .  $prefix . 'notificationURL=' . urlencode($this->notificationURL);
			$delim = '&';
		}
		if( $this->emailAddress != null ) {
			$str .= $delim .  $prefix . 'emailAddress=' . urlencode($this->emailAddress);
			$delim = '&';
		}
		if( $this->registrationType != null ) {
			$str .= $delim .  $prefix . 'registrationType=' . urlencode($this->registrationType);
			$delim = '&';
		}
		if( $this->createAccountWebOptions != null ) {
			$newPrefix = $prefix . 'createAccountWebOptions.';
			$str .= $delim . call_user_func(array($this->createAccountWebOptions, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->suppressWelcomeEmail != null ) {
			$str .= $delim .  $prefix . 'suppressWelcomeEmail=' . urlencode($this->suppressWelcomeEmail);
			$delim = '&';
		}
		if( $this->performExtraVettingOnThisAccount != null ) {
			$str .= $delim .  $prefix . 'performExtraVettingOnThisAccount=' . urlencode($this->performExtraVettingOnThisAccount);
			$delim = '&';
		}
		if( $this->partnerField1 != null ) {
			$str .= $delim .  $prefix . 'partnerField1=' . urlencode($this->partnerField1);
			$delim = '&';
		}
		if( $this->partnerField2 != null ) {
			$str .= $delim .  $prefix . 'partnerField2=' . urlencode($this->partnerField2);
			$delim = '&';
		}
		if( $this->partnerField3 != null ) {
			$str .= $delim .  $prefix . 'partnerField3=' . urlencode($this->partnerField3);
			$delim = '&';
		}
		if( $this->partnerField4 != null ) {
			$str .= $delim .  $prefix . 'partnerField4=' . urlencode($this->partnerField4);
			$delim = '&';
		}
		if( $this->partnerField5 != null ) {
			$str .= $delim .  $prefix . 'partnerField5=' . urlencode($this->partnerField5);
			$delim = '&';
		}
		if( $this->businessInfo != null ) {
			$newPrefix = $prefix . 'businessInfo.';
			$str .= $delim . call_user_func(array($this->businessInfo, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateAccountResponse")) {
/**
 * CreateAccountResponse
 */
class CreateAccountResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $createAccountKey;
	/**
	 * @access public
	 * @var string
	 */
	public $execStatus;
	/**
	 * @access public
	 * @var string
	 */
	public $redirectURL;
	/**
	 * @access public
	 * @var string
	 */
	public $accountId;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'createAccountKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createAccountKey = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'execStatus';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->execStatus = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'redirectURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->redirectURL = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'accountId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountId = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->createAccountKey != null ) {
			$str .= $delim .  $prefix . 'createAccountKey=' . urlencode($this->createAccountKey);
			$delim = '&';
		}
		if( $this->execStatus != null ) {
			$str .= $delim .  $prefix . 'execStatus=' . urlencode($this->execStatus);
			$delim = '&';
		}
		if( $this->redirectURL != null ) {
			$str .= $delim .  $prefix . 'redirectURL=' . urlencode($this->redirectURL);
			$delim = '&';
		}
		if( $this->accountId != null ) {
			$str .= $delim .  $prefix . 'accountId=' . urlencode($this->accountId);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("GetUserAgreementRequest")) {
/**
 * GetUserAgreementRequest
 */
class GetUserAgreementRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $createAccountKey;
	/**
	 * @access public
	 * @var string
	 */
	public $countryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $languageCode;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'createAccountKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createAccountKey = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'countryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->countryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'languageCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->languageCode = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->createAccountKey != null ) {
			$str .= $delim .  $prefix . 'createAccountKey=' . urlencode($this->createAccountKey);
			$delim = '&';
		}
		if( $this->countryCode != null ) {
			$str .= $delim .  $prefix . 'countryCode=' . urlencode($this->countryCode);
			$delim = '&';
		}
		if( $this->languageCode != null ) {
			$str .= $delim .  $prefix . 'languageCode=' . urlencode($this->languageCode);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("GetUserAgreementResponse")) {
/**
 * GetUserAgreementResponse
 */
class GetUserAgreementResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $agreement;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'agreement';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->agreement = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->agreement != null ) {
			$str .= $delim .  $prefix . 'agreement=' . urlencode($this->agreement);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("GetVerifiedStatusRequest")) {
/**
 * GetVerifiedStatusRequest
 */
class GetVerifiedStatusRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $emailAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $matchCriteria;
	/**
	 * @access public
	 * @var string
	 */
	public $firstName;
	/**
	 * @access public
	 * @var string
	 */
	public $lastName;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'emailAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->emailAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'matchCriteria';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->matchCriteria = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'firstName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->firstName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastName = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->emailAddress != null ) {
			$str .= $delim .  $prefix . 'emailAddress=' . urlencode($this->emailAddress);
			$delim = '&';
		}
		if( $this->matchCriteria != null ) {
			$str .= $delim .  $prefix . 'matchCriteria=' . urlencode($this->matchCriteria);
			$delim = '&';
		}
		if( $this->firstName != null ) {
			$str .= $delim .  $prefix . 'firstName=' . urlencode($this->firstName);
			$delim = '&';
		}
		if( $this->lastName != null ) {
			$str .= $delim .  $prefix . 'lastName=' . urlencode($this->lastName);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("GetVerifiedStatusResponse")) {
/**
 * GetVerifiedStatusResponse
 */
class GetVerifiedStatusResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $accountStatus;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'accountStatus';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountStatus = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->accountStatus != null ) {
			$str .= $delim .  $prefix . 'accountStatus=' . urlencode($this->accountStatus);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("AddBankAccountRequest")) {
/**
 * AddBankAccountRequest
 */
class AddBankAccountRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $emailAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $accountId;
	/**
	 * @access public
	 * @var string
	 */
	public $createAccountKey;
	/**
	 * @access public
	 * @var string
	 */
	public $bankCountryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $bankName;
	/**
	 * @access public
	 * @var string
	 */
	public $routingNumber;
	/**
	 * @access public
	 * @var BankAccountType
	 */
	public $bankAccountType;
	/**
	 * @access public
	 * @var string
	 */
	public $bankAccountNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $iban;
	/**
	 * @access public
	 * @var string
	 */
	public $clabe;
	/**
	 * @access public
	 * @var string
	 */
	public $bsbNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $branchLocation;
	/**
	 * @access public
	 * @var string
	 */
	public $sortCode;
	/**
	 * @access public
	 * @var string
	 */
	public $bankTransitNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $institutionNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $branchCode;
	/**
	 * @access public
	 * @var string
	 */
	public $agencyNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $bankCode;
	/**
	 * @access public
	 * @var string
	 */
	public $ribKey;
	/**
	 * @access public
	 * @var string
	 */
	public $controlDigit;
	/**
	 * @access public
	 * @var string
	 */
	public $taxIdType;
	/**
	 * @access public
	 * @var string
	 */
	public $taxIdNumber;
	/**
	 * @access public
	 * @var date
	 */
	public $accountHolderDateOfBirth;
	/**
	 * @access public
	 * @var ConfirmationType
	 */
	public $confirmationType;
	/**
	 * @access public
	 * @var WebOptionsType
	 */
	public $webOptions;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'emailAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->emailAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'accountId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'createAccountKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createAccountKey = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankCountryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankCountryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'routingNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->routingNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankAccountType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankAccountType = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankAccountNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankAccountNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'iban';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->iban = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'clabe';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->clabe = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bsbNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bsbNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'branchLocation';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->branchLocation = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'sortCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->sortCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankTransitNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankTransitNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'institutionNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->institutionNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'branchCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->branchCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'agencyNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->agencyNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'bankCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->bankCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'ribKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->ribKey = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'controlDigit';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->controlDigit = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'taxIdType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->taxIdType = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'taxIdNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->taxIdNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'accountHolderDateOfBirth';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountHolderDateOfBirth = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'confirmationType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->confirmationType = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."webOptions.";
			$this->webOptions = new WebOptionsType($map, $newPrefix);
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->emailAddress != null ) {
			$str .= $delim .  $prefix . 'emailAddress=' . urlencode($this->emailAddress);
			$delim = '&';
		}
		if( $this->accountId != null ) {
			$str .= $delim .  $prefix . 'accountId=' . urlencode($this->accountId);
			$delim = '&';
		}
		if( $this->createAccountKey != null ) {
			$str .= $delim .  $prefix . 'createAccountKey=' . urlencode($this->createAccountKey);
			$delim = '&';
		}
		if( $this->bankCountryCode != null ) {
			$str .= $delim .  $prefix . 'bankCountryCode=' . urlencode($this->bankCountryCode);
			$delim = '&';
		}
		if( $this->bankName != null ) {
			$str .= $delim .  $prefix . 'bankName=' . urlencode($this->bankName);
			$delim = '&';
		}
		if( $this->routingNumber != null ) {
			$str .= $delim .  $prefix . 'routingNumber=' . urlencode($this->routingNumber);
			$delim = '&';
		}
		if( $this->bankAccountType != null ) {
			$str .= $delim .  $prefix . 'bankAccountType=' . urlencode($this->bankAccountType);
			$delim = '&';
		}
		if( $this->bankAccountNumber != null ) {
			$str .= $delim .  $prefix . 'bankAccountNumber=' . urlencode($this->bankAccountNumber);
			$delim = '&';
		}
		if( $this->iban != null ) {
			$str .= $delim .  $prefix . 'iban=' . urlencode($this->iban);
			$delim = '&';
		}
		if( $this->clabe != null ) {
			$str .= $delim .  $prefix . 'clabe=' . urlencode($this->clabe);
			$delim = '&';
		}
		if( $this->bsbNumber != null ) {
			$str .= $delim .  $prefix . 'bsbNumber=' . urlencode($this->bsbNumber);
			$delim = '&';
		}
		if( $this->branchLocation != null ) {
			$str .= $delim .  $prefix . 'branchLocation=' . urlencode($this->branchLocation);
			$delim = '&';
		}
		if( $this->sortCode != null ) {
			$str .= $delim .  $prefix . 'sortCode=' . urlencode($this->sortCode);
			$delim = '&';
		}
		if( $this->bankTransitNumber != null ) {
			$str .= $delim .  $prefix . 'bankTransitNumber=' . urlencode($this->bankTransitNumber);
			$delim = '&';
		}
		if( $this->institutionNumber != null ) {
			$str .= $delim .  $prefix . 'institutionNumber=' . urlencode($this->institutionNumber);
			$delim = '&';
		}
		if( $this->branchCode != null ) {
			$str .= $delim .  $prefix . 'branchCode=' . urlencode($this->branchCode);
			$delim = '&';
		}
		if( $this->agencyNumber != null ) {
			$str .= $delim .  $prefix . 'agencyNumber=' . urlencode($this->agencyNumber);
			$delim = '&';
		}
		if( $this->bankCode != null ) {
			$str .= $delim .  $prefix . 'bankCode=' . urlencode($this->bankCode);
			$delim = '&';
		}
		if( $this->ribKey != null ) {
			$str .= $delim .  $prefix . 'ribKey=' . urlencode($this->ribKey);
			$delim = '&';
		}
		if( $this->controlDigit != null ) {
			$str .= $delim .  $prefix . 'controlDigit=' . urlencode($this->controlDigit);
			$delim = '&';
		}
		if( $this->taxIdType != null ) {
			$str .= $delim .  $prefix . 'taxIdType=' . urlencode($this->taxIdType);
			$delim = '&';
		}
		if( $this->taxIdNumber != null ) {
			$str .= $delim .  $prefix . 'taxIdNumber=' . urlencode($this->taxIdNumber);
			$delim = '&';
		}
		if( $this->accountHolderDateOfBirth != null ) {
			$str .= $delim .  $prefix . 'accountHolderDateOfBirth=' . urlencode($this->accountHolderDateOfBirth);
			$delim = '&';
		}
		if( $this->confirmationType != null ) {
			$str .= $delim .  $prefix . 'confirmationType=' . urlencode($this->confirmationType);
			$delim = '&';
		}
		if( $this->webOptions != null ) {
			$newPrefix = $prefix . 'webOptions.';
			$str .= $delim . call_user_func(array($this->webOptions, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("AddBankAccountResponse")) {
/**
 * AddBankAccountResponse
 */
class AddBankAccountResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $execStatus;
	/**
	 * @access public
	 * @var string
	 */
	public $redirectURL;
	/**
	 * @access public
	 * @var string
	 */
	public $fundingSourceKey;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'execStatus';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->execStatus = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'redirectURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->redirectURL = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'fundingSourceKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->fundingSourceKey = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->execStatus != null ) {
			$str .= $delim .  $prefix . 'execStatus=' . urlencode($this->execStatus);
			$delim = '&';
		}
		if( $this->redirectURL != null ) {
			$str .= $delim .  $prefix . 'redirectURL=' . urlencode($this->redirectURL);
			$delim = '&';
		}
		if( $this->fundingSourceKey != null ) {
			$str .= $delim .  $prefix . 'fundingSourceKey=' . urlencode($this->fundingSourceKey);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("AddPaymentCardRequest")) {
/**
 * AddPaymentCardRequest
 */
class AddPaymentCardRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $emailAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $accountId;
	/**
	 * @access public
	 * @var string
	 */
	public $createAccountKey;
	/**
	 * @access public
	 * @var NameType
	 */
	public $nameOnCard;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $billingAddress;
	/**
	 * @access public
	 * @var date
	 */
	public $cardOwnerDateOfBirth;
	/**
	 * @access public
	 * @var string
	 */
	public $cardNumber;
	/**
	 * @access public
	 * @var CardTypeType
	 */
	public $cardType;
	/**
	 * @access public
	 * @var CardDateType
	 */
	public $expirationDate;
	/**
	 * @access public
	 * @var string
	 */
	public $cardVerificationNumber;
	/**
	 * @access public
	 * @var CardDateType
	 */
	public $startDate;
	/**
	 * @access public
	 * @var string
	 */
	public $issueNumber;
	/**
	 * @access public
	 * @var ConfirmationType
	 */
	public $confirmationType;
	/**
	 * @access public
	 * @var WebOptionsType
	 */
	public $webOptions;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'emailAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->emailAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'accountId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'createAccountKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createAccountKey = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."nameOnCard.";
			$this->nameOnCard = new NameType($map, $newPrefix);
			$newPrefix = $prefix ."billingAddress.";
			$this->billingAddress = new AddressType($map, $newPrefix);
			$mapKeyName =  $prefix . 'cardOwnerDateOfBirth';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cardOwnerDateOfBirth = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'cardNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cardNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'cardType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cardType = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."expirationDate.";
			$this->expirationDate = new CardDateType($map, $newPrefix);
			$mapKeyName =  $prefix . 'cardVerificationNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cardVerificationNumber = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."startDate.";
			$this->startDate = new CardDateType($map, $newPrefix);
			$mapKeyName =  $prefix . 'issueNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->issueNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'confirmationType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->confirmationType = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."webOptions.";
			$this->webOptions = new WebOptionsType($map, $newPrefix);
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->emailAddress != null ) {
			$str .= $delim .  $prefix . 'emailAddress=' . urlencode($this->emailAddress);
			$delim = '&';
		}
		if( $this->accountId != null ) {
			$str .= $delim .  $prefix . 'accountId=' . urlencode($this->accountId);
			$delim = '&';
		}
		if( $this->createAccountKey != null ) {
			$str .= $delim .  $prefix . 'createAccountKey=' . urlencode($this->createAccountKey);
			$delim = '&';
		}
		if( $this->nameOnCard != null ) {
			$newPrefix = $prefix . 'nameOnCard.';
			$str .= $delim . call_user_func(array($this->nameOnCard, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->billingAddress != null ) {
			$newPrefix = $prefix . 'billingAddress.';
			$str .= $delim . call_user_func(array($this->billingAddress, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->cardOwnerDateOfBirth != null ) {
			$str .= $delim .  $prefix . 'cardOwnerDateOfBirth=' . urlencode($this->cardOwnerDateOfBirth);
			$delim = '&';
		}
		if( $this->cardNumber != null ) {
			$str .= $delim .  $prefix . 'cardNumber=' . urlencode($this->cardNumber);
			$delim = '&';
		}
		if( $this->cardType != null ) {
			$str .= $delim .  $prefix . 'cardType=' . urlencode($this->cardType);
			$delim = '&';
		}
		if( $this->expirationDate != null ) {
			$newPrefix = $prefix . 'expirationDate.';
			$str .= $delim . call_user_func(array($this->expirationDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->cardVerificationNumber != null ) {
			$str .= $delim .  $prefix . 'cardVerificationNumber=' . urlencode($this->cardVerificationNumber);
			$delim = '&';
		}
		if( $this->startDate != null ) {
			$newPrefix = $prefix . 'startDate.';
			$str .= $delim . call_user_func(array($this->startDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->issueNumber != null ) {
			$str .= $delim .  $prefix . 'issueNumber=' . urlencode($this->issueNumber);
			$delim = '&';
		}
		if( $this->confirmationType != null ) {
			$str .= $delim .  $prefix . 'confirmationType=' . urlencode($this->confirmationType);
			$delim = '&';
		}
		if( $this->webOptions != null ) {
			$newPrefix = $prefix . 'webOptions.';
			$str .= $delim . call_user_func(array($this->webOptions, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("AddPaymentCardResponse")) {
/**
 * AddPaymentCardResponse
 */
class AddPaymentCardResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $execStatus;
	/**
	 * @access public
	 * @var string
	 */
	public $redirectURL;
	/**
	 * @access public
	 * @var string
	 */
	public $fundingSourceKey;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'execStatus';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->execStatus = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'redirectURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->redirectURL = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'fundingSourceKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->fundingSourceKey = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->execStatus != null ) {
			$str .= $delim .  $prefix . 'execStatus=' . urlencode($this->execStatus);
			$delim = '&';
		}
		if( $this->redirectURL != null ) {
			$str .= $delim .  $prefix . 'redirectURL=' . urlencode($this->redirectURL);
			$delim = '&';
		}
		if( $this->fundingSourceKey != null ) {
			$str .= $delim .  $prefix . 'fundingSourceKey=' . urlencode($this->fundingSourceKey);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("SetFundingSourceConfirmedRequest")) {
/**
 * SetFundingSourceConfirmedRequest
 */
class SetFundingSourceConfirmedRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $emailAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $accountId;
	/**
	 * @access public
	 * @var string
	 */
	public $fundingSourceKey;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'emailAddress';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->emailAddress = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'accountId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->accountId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'fundingSourceKey';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->fundingSourceKey = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->emailAddress != null ) {
			$str .= $delim .  $prefix . 'emailAddress=' . urlencode($this->emailAddress);
			$delim = '&';
		}
		if( $this->accountId != null ) {
			$str .= $delim .  $prefix . 'accountId=' . urlencode($this->accountId);
			$delim = '&';
		}
		if( $this->fundingSourceKey != null ) {
			$str .= $delim .  $prefix . 'fundingSourceKey=' . urlencode($this->fundingSourceKey);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("SetFundingSourceConfirmedResponse")) {
/**
 * SetFundingSourceConfirmedResponse
 */
class SetFundingSourceConfirmedResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->responseEnvelope != null ) {
			$newPrefix = $prefix . 'responseEnvelope.';
			$str .= $delim . call_user_func(array($this->responseEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("NameType")) {
/**
 * NameType
 */
class NameType {
	/**
	 * @access public
	 * @var string
	 */
	public $salutation;
	/**
	 * @access public
	 * @var string
	 */
	public $firstName;
	/**
	 * @access public
	 * @var string
	 */
	public $middleName;
	/**
	 * @access public
	 * @var string
	 */
	public $lastName;
	/**
	 * @access public
	 * @var string
	 */
	public $suffix;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'salutation';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->salutation = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'firstName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->firstName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'middleName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->middleName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'suffix';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->suffix = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->salutation != null ) {
			$str .= $delim .  $prefix . 'salutation=' . urlencode($this->salutation);
			$delim = '&';
		}
		if( $this->firstName != null ) {
			$str .= $delim .  $prefix . 'firstName=' . urlencode($this->firstName);
			$delim = '&';
		}
		if( $this->middleName != null ) {
			$str .= $delim .  $prefix . 'middleName=' . urlencode($this->middleName);
			$delim = '&';
		}
		if( $this->lastName != null ) {
			$str .= $delim .  $prefix . 'lastName=' . urlencode($this->lastName);
			$delim = '&';
		}
		if( $this->suffix != null ) {
			$str .= $delim .  $prefix . 'suffix=' . urlencode($this->suffix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("AddressType")) {
/**
 * AddressType
 */
class AddressType {
	/**
	 * @access public
	 * @var string
	 */
	public $line1;
	/**
	 * @access public
	 * @var string
	 */
	public $line2;
	/**
	 * @access public
	 * @var string
	 */
	public $city;
	/**
	 * @access public
	 * @var string
	 */
	public $state;
	/**
	 * @access public
	 * @var string
	 */
	public $postalCode;
	/**
	 * @access public
	 * @var string
	 */
	public $countryCode;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'line1';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->line1 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'line2';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->line2 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'city';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->city = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'state';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->state = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'postalCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->postalCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'countryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->countryCode = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->line1 != null ) {
			$str .= $delim .  $prefix . 'line1=' . urlencode($this->line1);
			$delim = '&';
		}
		if( $this->line2 != null ) {
			$str .= $delim .  $prefix . 'line2=' . urlencode($this->line2);
			$delim = '&';
		}
		if( $this->city != null ) {
			$str .= $delim .  $prefix . 'city=' . urlencode($this->city);
			$delim = '&';
		}
		if( $this->state != null ) {
			$str .= $delim .  $prefix . 'state=' . urlencode($this->state);
			$delim = '&';
		}
		if( $this->postalCode != null ) {
			$str .= $delim .  $prefix . 'postalCode=' . urlencode($this->postalCode);
			$delim = '&';
		}
		if( $this->countryCode != null ) {
			$str .= $delim .  $prefix . 'countryCode=' . urlencode($this->countryCode);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateAccountWebOptionsType")) {
/**
 * CreateAccountWebOptionsType
 */
class CreateAccountWebOptionsType {
	/**
	 * @access public
	 * @var string
	 */
	public $returnUrl;
	/**
	 * @access public
	 * @var boolean
	 */
	public $showAddCreditCard;
	/**
	 * @access public
	 * @var boolean
	 */
	public $showMobileConfirm;
	/**
	 * @access public
	 * @var string
	 */
	public $returnUrlDescription;
	/**
	 * @access public
	 * @var boolean
	 */
	public $useMiniBrowser;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'returnUrl';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->returnUrl = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'showAddCreditCard';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->showAddCreditCard = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'showMobileConfirm';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->showMobileConfirm = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'returnUrlDescription';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->returnUrlDescription = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'useMiniBrowser';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->useMiniBrowser = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->returnUrl != null ) {
			$str .= $delim .  $prefix . 'returnUrl=' . urlencode($this->returnUrl);
			$delim = '&';
		}
		if( $this->showAddCreditCard != null ) {
			$str .= $delim .  $prefix . 'showAddCreditCard=' . urlencode($this->showAddCreditCard);
			$delim = '&';
		}
		if( $this->showMobileConfirm != null ) {
			$str .= $delim .  $prefix . 'showMobileConfirm=' . urlencode($this->showMobileConfirm);
			$delim = '&';
		}
		if( $this->returnUrlDescription != null ) {
			$str .= $delim .  $prefix . 'returnUrlDescription=' . urlencode($this->returnUrlDescription);
			$delim = '&';
		}
		if( $this->useMiniBrowser != null ) {
			$str .= $delim .  $prefix . 'useMiniBrowser=' . urlencode($this->useMiniBrowser);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("BusinessInfoType")) {
/**
 * BusinessInfoType
 */
class BusinessInfoType {
	/**
	 * @access public
	 * @var string
	 */
	public $businessName;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $businessAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $workPhone;
	/**
	 * @access public
	 * @var integer
	 */
	public $category;
	/**
	 * @access public
	 * @var integer
	 */
	public $subCategory;
	/**
	 * @access public
	 * @var integer
	 */
	public $merchantCategoryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $doingBusinessAs;
	/**
	 * @access public
	 * @var string
	 */
	public $customerServicePhone;
	/**
	 * @access public
	 * @var string
	 */
	public $customerServiceEmail;
	/**
	 * @access public
	 * @var string
	 */
	public $disputeEmail;
	/**
	 * @access public
	 * @var string
	 */
	public $webSite;
	/**
	 * @access public
	 * @var string
	 */
	public $companyId;
	/**
	 * @access public
	 * @var date
	 */
	public $dateOfEstablishment;
	/**
	 * @access public
	 * @var BusinessType
	 */
	public $businessType;
	/**
	 * @access public
	 * @var BusinessSubtypeType
	 */
	public $businessSubtype;
	/**
	 * @access public
	 * @var string
	 */
	public $incorporationId;
	/**
	 * @access public
	 * @var double
	 */
	public $averagePrice;
	/**
	 * @access public
	 * @var double
	 */
	public $averageMonthlyVolume;
	/**
	 * @access public
	 * @var integer
	 */
	public $percentageRevenueFromOnline;
	/**
	 * array
	 * @access public
	 * @var SalesVenueType
	 */
	public $salesVenue;
	/**
	 * @access public
	 * @var string
	 */
	public $salesVenueDesc;
	/**
	 * @access public
	 * @var string
	 */
	public $vatId;
	/**
	 * @access public
	 * @var string
	 */
	public $vatCountryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $commercialRegistrationLocation;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $principalPlaceOfBusinessAddress;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $registeredOfficeAddress;
	/**
	 * @access public
	 * @var string
	 */
	public $establishmentCountryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $establishmentState;
	/**
	 * array
	 * @access public
	 * @var BusinessStakeholderType
	 */
	public $businessStakeholder;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'businessName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->businessName = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."businessAddress.";
			$this->businessAddress = new AddressType($map, $newPrefix);
			$mapKeyName =  $prefix . 'workPhone';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->workPhone = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'category';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->category = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'subCategory';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->subCategory = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'merchantCategoryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->merchantCategoryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'doingBusinessAs';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->doingBusinessAs = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'customerServicePhone';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->customerServicePhone = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'customerServiceEmail';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->customerServiceEmail = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'disputeEmail';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->disputeEmail = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'webSite';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->webSite = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'companyId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->companyId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'dateOfEstablishment';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->dateOfEstablishment = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'businessType';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->businessType = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'businessSubtype';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->businessSubtype = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'incorporationId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->incorporationId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'averagePrice';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->averagePrice = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'averageMonthlyVolume';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->averageMonthlyVolume = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'percentageRevenueFromOnline';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->percentageRevenueFromOnline = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'salesVenueDesc';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->salesVenueDesc = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'vatId';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->vatId = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'vatCountryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->vatCountryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'commercialRegistrationLocation';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->commercialRegistrationLocation = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."principalPlaceOfBusinessAddress.";
			$this->principalPlaceOfBusinessAddress = new AddressType($map, $newPrefix);
			$newPrefix = $prefix ."registeredOfficeAddress.";
			$this->registeredOfficeAddress = new AddressType($map, $newPrefix);
			$mapKeyName =  $prefix . 'establishmentCountryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->establishmentCountryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'establishmentState';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->establishmentState = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->businessName != null ) {
			$str .= $delim .  $prefix . 'businessName=' . urlencode($this->businessName);
			$delim = '&';
		}
		if( $this->businessAddress != null ) {
			$newPrefix = $prefix . 'businessAddress.';
			$str .= $delim . call_user_func(array($this->businessAddress, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->workPhone != null ) {
			$str .= $delim .  $prefix . 'workPhone=' . urlencode($this->workPhone);
			$delim = '&';
		}
		if( $this->category != null ) {
			$str .= $delim .  $prefix . 'category=' . urlencode($this->category);
			$delim = '&';
		}
		if( $this->subCategory != null ) {
			$str .= $delim .  $prefix . 'subCategory=' . urlencode($this->subCategory);
			$delim = '&';
		}
		if( $this->merchantCategoryCode != null ) {
			$str .= $delim .  $prefix . 'merchantCategoryCode=' . urlencode($this->merchantCategoryCode);
			$delim = '&';
		}
		if( $this->doingBusinessAs != null ) {
			$str .= $delim .  $prefix . 'doingBusinessAs=' . urlencode($this->doingBusinessAs);
			$delim = '&';
		}
		if( $this->customerServicePhone != null ) {
			$str .= $delim .  $prefix . 'customerServicePhone=' . urlencode($this->customerServicePhone);
			$delim = '&';
		}
		if( $this->customerServiceEmail != null ) {
			$str .= $delim .  $prefix . 'customerServiceEmail=' . urlencode($this->customerServiceEmail);
			$delim = '&';
		}
		if( $this->disputeEmail != null ) {
			$str .= $delim .  $prefix . 'disputeEmail=' . urlencode($this->disputeEmail);
			$delim = '&';
		}
		if( $this->webSite != null ) {
			$str .= $delim .  $prefix . 'webSite=' . urlencode($this->webSite);
			$delim = '&';
		}
		if( $this->companyId != null ) {
			$str .= $delim .  $prefix . 'companyId=' . urlencode($this->companyId);
			$delim = '&';
		}
		if( $this->dateOfEstablishment != null ) {
			$str .= $delim .  $prefix . 'dateOfEstablishment=' . urlencode($this->dateOfEstablishment);
			$delim = '&';
		}
		if( $this->businessType != null ) {
			$str .= $delim .  $prefix . 'businessType=' . urlencode($this->businessType);
			$delim = '&';
		}
		if( $this->businessSubtype != null ) {
			$str .= $delim .  $prefix . 'businessSubtype=' . urlencode($this->businessSubtype);
			$delim = '&';
		}
		if( $this->incorporationId != null ) {
			$str .= $delim .  $prefix . 'incorporationId=' . urlencode($this->incorporationId);
			$delim = '&';
		}
		if( $this->averagePrice != null ) {
			$str .= $delim .  $prefix . 'averagePrice=' . urlencode($this->averagePrice);
			$delim = '&';
		}
		if( $this->averageMonthlyVolume != null ) {
			$str .= $delim .  $prefix . 'averageMonthlyVolume=' . urlencode($this->averageMonthlyVolume);
			$delim = '&';
		}
		if( $this->percentageRevenueFromOnline != null ) {
			$str .= $delim .  $prefix . 'percentageRevenueFromOnline=' . urlencode($this->percentageRevenueFromOnline);
			$delim = '&';
		}
		for($i=0; $i<count($this->salesVenue);$i++) {
			$str .= $delim .  $prefix ."salesVenue($i)=" .  urlencode($this->salesVenue[$i]);
		 }
		if( $this->salesVenueDesc != null ) {
			$str .= $delim .  $prefix . 'salesVenueDesc=' . urlencode($this->salesVenueDesc);
			$delim = '&';
		}
		if( $this->vatId != null ) {
			$str .= $delim .  $prefix . 'vatId=' . urlencode($this->vatId);
			$delim = '&';
		}
		if( $this->vatCountryCode != null ) {
			$str .= $delim .  $prefix . 'vatCountryCode=' . urlencode($this->vatCountryCode);
			$delim = '&';
		}
		if( $this->commercialRegistrationLocation != null ) {
			$str .= $delim .  $prefix . 'commercialRegistrationLocation=' . urlencode($this->commercialRegistrationLocation);
			$delim = '&';
		}
		if( $this->principalPlaceOfBusinessAddress != null ) {
			$newPrefix = $prefix . 'principalPlaceOfBusinessAddress.';
			$str .= $delim . call_user_func(array($this->principalPlaceOfBusinessAddress, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->registeredOfficeAddress != null ) {
			$newPrefix = $prefix . 'registeredOfficeAddress.';
			$str .= $delim . call_user_func(array($this->registeredOfficeAddress, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->establishmentCountryCode != null ) {
			$str .= $delim .  $prefix . 'establishmentCountryCode=' . urlencode($this->establishmentCountryCode);
			$delim = '&';
		}
		if( $this->establishmentState != null ) {
			$str .= $delim .  $prefix . 'establishmentState=' . urlencode($this->establishmentState);
			$delim = '&';
		}
		for($i=0; $i<count($this->businessStakeholder);$i++) {
			$newPrefix = $prefix . "businessStakeholder($i).";
			$str .= $delim . call_user_func(array($this->businessStakeholder, 'toNVPString'), $newPrefix);
		 }

		return $str;
	}

}}

if (!class_exists("AccountValidationInfoType")) {
/**
 * AccountValidationInfoType
 */
class AccountValidationInfoType {
	/**
	 * @access public
	 * @var string
	 */
	public $firstName;
	/**
	 * @access public
	 * @var string
	 */
	public $lastName;
	/**
	 * @access public
	 * @var string
	 */
	public $addressLine1;
	/**
	 * @access public
	 * @var string
	 */
	public $postalCode;
	/**
	 * @access public
	 * @var string
	 */
	public $phoneNumber;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'firstName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->firstName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'addressLine1';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->addressLine1 = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'postalCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->postalCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'phoneNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->phoneNumber = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->firstName != null ) {
			$str .= $delim .  $prefix . 'firstName=' . urlencode($this->firstName);
			$delim = '&';
		}
		if( $this->lastName != null ) {
			$str .= $delim .  $prefix . 'lastName=' . urlencode($this->lastName);
			$delim = '&';
		}
		if( $this->addressLine1 != null ) {
			$str .= $delim .  $prefix . 'addressLine1=' . urlencode($this->addressLine1);
			$delim = '&';
		}
		if( $this->postalCode != null ) {
			$str .= $delim .  $prefix . 'postalCode=' . urlencode($this->postalCode);
			$delim = '&';
		}
		if( $this->phoneNumber != null ) {
			$str .= $delim .  $prefix . 'phoneNumber=' . urlencode($this->phoneNumber);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("BusinessStakeholderType")) {
/**
 * BusinessStakeholderType
 *  *
                        Info about Stakeholders such as partner,
 * beneficial, owner, director etc. 
 *
 */
class BusinessStakeholderType {
	/**
	 * @access public
	 * @var StakeholderRoleType
	 */
	public $role;
	/**
	 * @access public
	 * @var NameType
	 */
	public $name;
	/**
	 * @access public
	 * @var string
	 */
	public $fullLegalName;
	/**
	 * @access public
	 * @var AddressType
	 */
	public $address;
	/**
	 * @access public
	 * @var date
	 */
	public $dateOfBirth;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'role';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->role = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."name.";
			$this->name = new NameType($map, $newPrefix);
			$mapKeyName =  $prefix . 'fullLegalName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->fullLegalName = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."address.";
			$this->address = new AddressType($map, $newPrefix);
			$mapKeyName =  $prefix . 'dateOfBirth';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->dateOfBirth = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->role != null ) {
			$str .= $delim .  $prefix . 'role=' . urlencode($this->role);
			$delim = '&';
		}
		if( $this->name != null ) {
			$newPrefix = $prefix . 'name.';
			$str .= $delim . call_user_func(array($this->name, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->fullLegalName != null ) {
			$str .= $delim .  $prefix . 'fullLegalName=' . urlencode($this->fullLegalName);
			$delim = '&';
		}
		if( $this->address != null ) {
			$newPrefix = $prefix . 'address.';
			$str .= $delim . call_user_func(array($this->address, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->dateOfBirth != null ) {
			$str .= $delim .  $prefix . 'dateOfBirth=' . urlencode($this->dateOfBirth);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("WebOptionsType")) {
/**
 * WebOptionsType
 */
class WebOptionsType {
	/**
	 * @access public
	 * @var string
	 */
	public $returnUrl;
	/**
	 * @access public
	 * @var string
	 */
	public $cancelUrl;
	/**
	 * @access public
	 * @var string
	 */
	public $returnUrlDescription;
	/**
	 * @access public
	 * @var string
	 */
	public $cancelUrlDescription;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'returnUrl';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->returnUrl = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'cancelUrl';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cancelUrl = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'returnUrlDescription';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->returnUrlDescription = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'cancelUrlDescription';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->cancelUrlDescription = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->returnUrl != null ) {
			$str .= $delim .  $prefix . 'returnUrl=' . urlencode($this->returnUrl);
			$delim = '&';
		}
		if( $this->cancelUrl != null ) {
			$str .= $delim .  $prefix . 'cancelUrl=' . urlencode($this->cancelUrl);
			$delim = '&';
		}
		if( $this->returnUrlDescription != null ) {
			$str .= $delim .  $prefix . 'returnUrlDescription=' . urlencode($this->returnUrlDescription);
			$delim = '&';
		}
		if( $this->cancelUrlDescription != null ) {
			$str .= $delim .  $prefix . 'cancelUrlDescription=' . urlencode($this->cancelUrlDescription);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CardDateType")) {
/**
 * CardDateType
 */
class CardDateType {
	/**
	 * @access public
	 * @var integer
	 */
	public $month;
	/**
	 * @access public
	 * @var integer
	 */
	public $year;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'month';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->month = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'year';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->year = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->month != null ) {
			$str .= $delim .  $prefix . 'month=' . urlencode($this->month);
			$delim = '&';
		}
		if( $this->year != null ) {
			$str .= $delim .  $prefix . 'year=' . urlencode($this->year);
			$delim = '&';
		}

		return $str;
	}

}}

?>

