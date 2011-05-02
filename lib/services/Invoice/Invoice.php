<?php
 /**
 * Stub objects for Invoice 
 * Auto generated code 
 * 
 */
/**
 * CreateInvoiceRequest
 *  
  The request object for CreateInvoice.
 
 
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

	public function __construct($requestEnvelope = null, $invoice = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->invoice  = $invoice;
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

}

/**
 * RequestEnvelope
 *  
  This specifies the list of parameters with every
  request to the service.
 
 
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

	public function __construct($errorLanguage = null) {
		$this->errorLanguage  = $errorLanguage;
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

}

/**
 * InvoiceType
 *  
  Invoice details about the merchant, payer, totals and terms.
 
 
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
	 * array
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
	 * @var decimal
	 */
	public $discountPercent;
	/**
	 * @access public
	 * @var decimal
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
	 * @var decimal
	 */
	public $shippingAmount;
	/**
	 * @access public
	 * @var string
	 */
	public $shippingTaxName;
	/**
	 * @access public
	 * @var decimal
	 */
	public $shippingTaxRate;

	public function __construct($merchantEmail = null, $payerEmail = null, $currencyCode = null, $paymentTerms = null) {
		$this->merchantEmail  = $merchantEmail;
		$this->payerEmail  = $payerEmail;
		$this->currencyCode  = $currencyCode;
		$this->paymentTerms  = $paymentTerms;
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

}

/**
 * BusinessInfoType
 *  
  Contact information for a company participating in the invoicing system.
 
 
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

}

/**
 * BaseAddress
 *  
 
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

	public function __construct($line1 = null, $city = null, $countryCode = null) {
		$this->line1  = $line1;
		$this->city  = $city;
		$this->countryCode  = $countryCode;
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

}

/**
 * InvoiceItemType
 *  
  Item information about a service or product listed in the invoice.
 
 
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
	 * @var decimal
	 */
	public $quantity;
	/**
	 * @access public
	 * @var decimal
	 */
	public $unitPrice;
	/**
	 * @access public
	 * @var string
	 */
	public $taxName;
	/**
	 * @access public
	 * @var decimal
	 */
	public $taxRate;

	public function __construct($name = null, $quantity = null, $unitPrice = null) {
		$this->name  = $name;
		$this->quantity  = $quantity;
		$this->unitPrice  = $unitPrice;
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

}

/**
 * CreateInvoiceResponse
 *  
  The response object for CreateInvoice.
 
 
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
}

/**
 * ResponseEnvelope
 *  
  This specifies a list of parameters with every
  response from a service.
 
 
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
}

/**
 * SendInvoiceRequest
 *  
  The request object for SendInvoice.
 
 
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

	public function __construct($requestEnvelope = null, $invoiceID = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->invoiceID  = $invoiceID;
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

}

/**
 * SendInvoiceResponse
 *  
  The response object for SendInvoice.
 
 
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
}

/**
 * CreateAndSendInvoiceRequest
 *  
  The request object for CreateInvoice.
 
 
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

	public function __construct($requestEnvelope = null, $invoice = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->invoice  = $invoice;
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

}

/**
 * CreateAndSendInvoiceResponse
 *  
  The response object for CreateInvoice.
 
 
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
}

?>

