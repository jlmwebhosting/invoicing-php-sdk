<?php
if (!class_exists("BaseAddress")) {
/**
 * BaseAddress
 */
class BaseAddress {
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

if (!class_exists("ClientDetailsType")) {
/**
 * ClientDetailsType
 *  *
 * Details about the end user of the application
 * invoking this service.
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

if (!class_exists("CurrencyType")) {
/**
 * CurrencyType
 */
class CurrencyType {
	/**
	 * @access public
	 * @var string
	 */
	public $code;
	/**
	 * @access public
	 * @var double
	 */
	public $amount;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'code';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->code = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'amount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->amount = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->code != null ) {
			$str .= $delim .  $prefix . 'code=' . urlencode($this->code);
			$delim = '&';
		}
		if( $this->amount != null ) {
			$str .= $delim .  $prefix . 'amount=' . urlencode($this->amount);
			$delim = '&';
		}

		return $str;
	}

}}

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

if (!class_exists("PhoneNumberType")) {
/**
 * PhoneNumberType
 */
class PhoneNumberType {
	/**
	 * @access public
	 * @var string
	 */
	public $countryCode;
	/**
	 * @access public
	 * @var string
	 */
	public $phoneNumber;
	/**
	 * @access public
	 * @var string
	 */
	public $extension;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'countryCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->countryCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'phoneNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->phoneNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'extension';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->extension = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->countryCode != null ) {
			$str .= $delim .  $prefix . 'countryCode=' . urlencode($this->countryCode);
			$delim = '&';
		}
		if( $this->phoneNumber != null ) {
			$str .= $delim .  $prefix . 'phoneNumber=' . urlencode($this->phoneNumber);
			$delim = '&';
		}
		if( $this->extension != null ) {
			$str .= $delim .  $prefix . 'extension=' . urlencode($this->extension);
			$delim = '&';
		}

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
 * Application level acknowledgment code.
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

if (!class_exists("BusinessInfoType")) {
/**
 * BusinessInfoType
 *  *
 * Contact information for a company participating in the invoicing system.
 *
 * First name of the company contact.
 *
 * Last name of the company contact.
 *
 * Business name of the company.
 *
 * Phone number for contacting the company.
 *
 * Fax number used by the company.
 *
 * Website used by the company.
 *
 * Custom value to be displayed in the contact information details.
 *
 * Street address of the company.
 *
 */
class BusinessInfoType {
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
	public $businessName;
	/**
	 * @access public
	 * @var string
	 */
	public $phone;
	/**
	 * @access public
	 * @var string
	 */
	public $fax;
	/**
	 * @access public
	 * @var string
	 */
	public $website;
	/**
	 * @access public
	 * @var string
	 */
	public $customValue;
	/**
	 * @access public
	 * @var BaseAddress
	 */
	public $address;

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
			$mapKeyName =  $prefix . 'businessName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->businessName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'phone';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->phone = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'fax';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->fax = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'website';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->website = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'customValue';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->customValue = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."address.";
			$this->address = new BaseAddress($map, $newPrefix);
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
		if( $this->businessName != null ) {
			$str .= $delim .  $prefix . 'businessName=' . urlencode($this->businessName);
			$delim = '&';
		}
		if( $this->phone != null ) {
			$str .= $delim .  $prefix . 'phone=' . urlencode($this->phone);
			$delim = '&';
		}
		if( $this->fax != null ) {
			$str .= $delim .  $prefix . 'fax=' . urlencode($this->fax);
			$delim = '&';
		}
		if( $this->website != null ) {
			$str .= $delim .  $prefix . 'website=' . urlencode($this->website);
			$delim = '&';
		}
		if( $this->customValue != null ) {
			$str .= $delim .  $prefix . 'customValue=' . urlencode($this->customValue);
			$delim = '&';
		}
		if( $this->address != null ) {
			$newPrefix = $prefix . 'address.';
			$str .= $delim . call_user_func(array($this->address, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("InvoiceItemType")) {
/**
 * InvoiceItemType
 *  *
 * Item information about a service or product listed in the invoice.
 *
 * SKU or item name.
 *
 * Description of the item.
 *
 * Date on which the product or service was provided.
 *
 * Item count.
 *
 * Price of the item, in the currency specified by the invoice.
 *
 * Name of an applicable tax, if any.
 *
 * Rate of an applicable tax, if any.
 *
 */
class InvoiceItemType {
	/**
	 * @access public
	 * @var string
	 */
	public $name;
	/**
	 * @access public
	 * @var string
	 */
	public $description;
	/**
	 * @access public
	 * @var dateTime
	 */
	public $date;
	/**
	 * @access public
	 * @var double
	 */
	public $quantity;
	/**
	 * @access public
	 * @var double
	 */
	public $unitPrice;
	/**
	 * @access public
	 * @var string
	 */
	public $taxName;
	/**
	 * @access public
	 * @var double
	 */
	public $taxRate;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'name';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->name = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'description';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->description = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'date';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->date = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'quantity';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->quantity = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'unitPrice';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->unitPrice = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'taxName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->taxName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'taxRate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->taxRate = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->name != null ) {
			$str .= $delim .  $prefix . 'name=' . urlencode($this->name);
			$delim = '&';
		}
		if( $this->description != null ) {
			$str .= $delim .  $prefix . 'description=' . urlencode($this->description);
			$delim = '&';
		}
		if( $this->date != null ) {
			$str .= $delim .  $prefix . 'date=' . urlencode($this->date);
			$delim = '&';
		}
		if( $this->quantity != null ) {
			$str .= $delim .  $prefix . 'quantity=' . urlencode($this->quantity);
			$delim = '&';
		}
		if( $this->unitPrice != null ) {
			$str .= $delim .  $prefix . 'unitPrice=' . urlencode($this->unitPrice);
			$delim = '&';
		}
		if( $this->taxName != null ) {
			$str .= $delim .  $prefix . 'taxName=' . urlencode($this->taxName);
			$delim = '&';
		}
		if( $this->taxRate != null ) {
			$str .= $delim .  $prefix . 'taxRate=' . urlencode($this->taxRate);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("InvoiceType")) {
/**
 * InvoiceType
 *  *
 * Invoice details about the merchant, payer, totals and terms.
 *
 * Invoice creator's email.
 *
 * Email to which the invoice will be sent.
 *
 * Unique identifier for the invoice.
 *
 * Company contact information of the merchant company sending the invoice.
 *
 * List of items included in this invoice.
 *
 * Currency used for all invoice item amounts and totals.
 *
 * Date on which the invoice will be enabled.
 *
 * Date on which the invoice payment is due.
 *
 * Terms by which the invoice payment is due.
 *
 *  -->
 *
 * A discount percent applied to the invoice, if any.
 *
 * A discount amount applied to the invoice, if any.  If DiscountPercent is provided, DiscountAmount is ignored.
 *
 * General terms for the invoice.
 *
 * Note to the payer company.
 *
 * Memo for book keeping that is private to the Merchant.
 *
 * Billing information for the payer.
 *
 * Shipping information for the payer.
 *
 * Cost of shipping.
 *
 * Name of the applicable tax on shipping cost, if any.
 *
 * Rate of the applicable tax on shipping cost, if any.
 *
 */
class InvoiceType {
	/**
	 * @access public
	 * @var string
	 */
	public $merchantEmail;
	/**
	 * @access public
	 * @var string
	 */
	public $payerEmail;
	/**
	 * @access public
	 * @var string
	 */
	public $number;
	/**
	 * @access public
	 * @var BusinessInfoType
	 */
	public $merchantInfo;
	/**
	 * @access public
	 * @var InvoiceItemType
	 */
	public $items;
	/**
	 * @access public
	 * @var string
	 */
	public $currencyCode;
	/**
	 * @access public
	 * @var dateTime
	 */
	public $invoiceDate;
	/**
	 * @access public
	 * @var dateTime
	 */
	public $dueDate;
	/**
	 * @access public
	 * @var PaymentTermsType
	 */
	public $paymentTerms;
	/**
	 * @access public
	 * @var double
	 */
	public $discountPercent;
	/**
	 * @access public
	 * @var double
	 */
	public $discountAmount;
	/**
	 * @access public
	 * @var string
	 */
	public $terms;
	/**
	 * @access public
	 * @var string
	 */
	public $note;
	/**
	 * @access public
	 * @var string
	 */
	public $merchantMemo;
	/**
	 * @access public
	 * @var BusinessInfoType
	 */
	public $billingInfo;
	/**
	 * @access public
	 * @var BusinessInfoType
	 */
	public $shippingInfo;
	/**
	 * @access public
	 * @var double
	 */
	public $shippingAmount;
	/**
	 * @access public
	 * @var string
	 */
	public $shippingTaxName;
	/**
	 * @access public
	 * @var double
	 */
	public $shippingTaxRate;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'merchantEmail';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->merchantEmail = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'payerEmail';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->payerEmail = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'number';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->number = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."merchantInfo.";
			$this->merchantInfo = new BusinessInfoType($map, $newPrefix);
			$mapKeyName =  $prefix . 'currencyCode';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->currencyCode = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'dueDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->dueDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'paymentTerms';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->paymentTerms = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'discountPercent';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->discountPercent = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'discountAmount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->discountAmount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'terms';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->terms = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'note';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->note = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'merchantMemo';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->merchantMemo = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."billingInfo.";
			$this->billingInfo = new BusinessInfoType($map, $newPrefix);
			$newPrefix = $prefix ."shippingInfo.";
			$this->shippingInfo = new BusinessInfoType($map, $newPrefix);
			$mapKeyName =  $prefix . 'shippingAmount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->shippingAmount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'shippingTaxName';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->shippingTaxName = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'shippingTaxRate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->shippingTaxRate = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->merchantEmail != null ) {
			$str .= $delim .  $prefix . 'merchantEmail=' . urlencode($this->merchantEmail);
			$delim = '&';
		}
		if( $this->payerEmail != null ) {
			$str .= $delim .  $prefix . 'payerEmail=' . urlencode($this->payerEmail);
			$delim = '&';
		}
		if( $this->number != null ) {
			$str .= $delim .  $prefix . 'number=' . urlencode($this->number);
			$delim = '&';
		}
		if( $this->merchantInfo != null ) {
			$newPrefix = $prefix . 'merchantInfo.';
			$str .= $delim . call_user_func(array($this->merchantInfo, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		for($i=0; $i<count($this->items);$i++) {
			$newPrefix = $prefix . "items($i).";
			$str .= $delim . call_user_func(array($this->items, 'toNVPString'), $newPrefix);
		 }
		if( $this->currencyCode != null ) {
			$str .= $delim .  $prefix . 'currencyCode=' . urlencode($this->currencyCode);
			$delim = '&';
		}
		if( $this->invoiceDate != null ) {
			$str .= $delim .  $prefix . 'invoiceDate=' . urlencode($this->invoiceDate);
			$delim = '&';
		}
		if( $this->dueDate != null ) {
			$str .= $delim .  $prefix . 'dueDate=' . urlencode($this->dueDate);
			$delim = '&';
		}
		if( $this->paymentTerms != null ) {
			$str .= $delim .  $prefix . 'paymentTerms=' . urlencode($this->paymentTerms);
			$delim = '&';
		}
		if( $this->discountPercent != null ) {
			$str .= $delim .  $prefix . 'discountPercent=' . urlencode($this->discountPercent);
			$delim = '&';
		}
		if( $this->discountAmount != null ) {
			$str .= $delim .  $prefix . 'discountAmount=' . urlencode($this->discountAmount);
			$delim = '&';
		}
		if( $this->terms != null ) {
			$str .= $delim .  $prefix . 'terms=' . urlencode($this->terms);
			$delim = '&';
		}
		if( $this->note != null ) {
			$str .= $delim .  $prefix . 'note=' . urlencode($this->note);
			$delim = '&';
		}
		if( $this->merchantMemo != null ) {
			$str .= $delim .  $prefix . 'merchantMemo=' . urlencode($this->merchantMemo);
			$delim = '&';
		}
		if( $this->billingInfo != null ) {
			$newPrefix = $prefix . 'billingInfo.';
			$str .= $delim . call_user_func(array($this->billingInfo, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->shippingInfo != null ) {
			$newPrefix = $prefix . 'shippingInfo.';
			$str .= $delim . call_user_func(array($this->shippingInfo, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->shippingAmount != null ) {
			$str .= $delim .  $prefix . 'shippingAmount=' . urlencode($this->shippingAmount);
			$delim = '&';
		}
		if( $this->shippingTaxName != null ) {
			$str .= $delim .  $prefix . 'shippingTaxName=' . urlencode($this->shippingTaxName);
			$delim = '&';
		}
		if( $this->shippingTaxRate != null ) {
			$str .= $delim .  $prefix . 'shippingTaxRate=' . urlencode($this->shippingTaxRate);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateInvoiceRequest")) {
/**
 * CreateInvoiceRequest
 *  *
 * The request object for CreateInvoice.
 *
 * Data to populate the newly created invoice.
 *
 */
class CreateInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var InvoiceType
	 */
	public $invoice;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$newPrefix = $prefix ."invoice.";
			$this->invoice = new InvoiceType($map, $newPrefix);
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
		if( $this->invoice != null ) {
			$newPrefix = $prefix . 'invoice.';
			$str .= $delim . call_user_func(array($this->invoice, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateInvoiceResponse")) {
/**
 * CreateInvoiceResponse
 *  *
 * The response object for CreateInvoice.
 *
 * The created invoice's ID.
 *
 * The created invoice's number.
 *
 */
class CreateInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceID;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
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
		if( $this->invoiceID != null ) {
			$str .= $delim .  $prefix . 'invoiceID=' . urlencode($this->invoiceID);
			$delim = '&';
		}
		if( $this->invoiceNumber != null ) {
			$str .= $delim .  $prefix . 'invoiceNumber=' . urlencode($this->invoiceNumber);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("SendInvoiceRequest")) {
/**
 * SendInvoiceRequest
 *  *
 * The request object for SendInvoice.
 *
 * ID of the invoice to send.
 *
 */
class SendInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
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
		if( $this->invoiceID != null ) {
			$str .= $delim .  $prefix . 'invoiceID=' . urlencode($this->invoiceID);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("SendInvoiceResponse")) {
/**
 * SendInvoiceResponse
 *  *
 * The response object for SendInvoice.
 *
 * The sent invoice's ID.
 *
 */
class SendInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
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
		if( $this->invoiceID != null ) {
			$str .= $delim .  $prefix . 'invoiceID=' . urlencode($this->invoiceID);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateAndSendInvoiceRequest")) {
/**
 * CreateAndSendInvoiceRequest
 *  *
 * The request object for CreateInvoice.
 *
 * Data to populate the newly created invoice.
 *
 */
class CreateAndSendInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;
	/**
	 * @access public
	 * @var InvoiceType
	 */
	public $invoice;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."requestEnvelope.";
			$this->requestEnvelope = new RequestEnvelope($map, $newPrefix);
			$newPrefix = $prefix ."invoice.";
			$this->invoice = new InvoiceType($map, $newPrefix);
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
		if( $this->invoice != null ) {
			$newPrefix = $prefix . 'invoice.';
			$str .= $delim . call_user_func(array($this->invoice, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}}

if (!class_exists("CreateAndSendInvoiceResponse")) {
/**
 * CreateAndSendInvoiceResponse
 *  *
 * The response object for CreateInvoice.
 *
 * The created invoice's ID.
 *
 * The created invoice's number.
 *
 */
class CreateAndSendInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceID;
	/**
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	public function __construct($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
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
		if( $this->invoiceID != null ) {
			$str .= $delim .  $prefix . 'invoiceID=' . urlencode($this->invoiceID);
			$delim = '&';
		}
		if( $this->invoiceNumber != null ) {
			$str .= $delim .  $prefix . 'invoiceNumber=' . urlencode($this->invoiceNumber);
			$delim = '&';
		}

		return $str;
	}

}}

?>

