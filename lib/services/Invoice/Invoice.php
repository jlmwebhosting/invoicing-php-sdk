<?php
 /**
 * Stub objects for Invoice 
 * Auto generated code 
 * 
 */
/**
 * CreateInvoiceRequest
 * The request object for CreateInvoice.
 */
class CreateInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * Data to populate the newly created invoice.
	 *
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
 * This specifies the list of parameters with every
 * request to the service.
 */
class RequestEnvelope {
	/**
	 * This specifies the required detail level
	 * that is needed by a client application
	 * pertaining to a particular data
	 * component (e.g., Item, Transaction,
	 * etc.). The detail level is specified in
	 * the DetailLevelCodeType which has all
	 * the enumerated values of the detail
	 * level for each component.
	 *
	 * @access public
	 * @var DetailLevelCode
	 */
	public $detailLevel;

	/**
	 * This should be the standard RFC 3066
	 * language identification tag, e.g.,
	 * en_US.
	 *
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
 * Invoice details about the merchant, payer, totals and terms.
 */
class InvoiceType {
	/**
	 * Merchant's email.
	 *
	 * @access public
	 * @var string
	 */
	public $merchantEmail;

	/**
	 * Email to which the invoice will be sent.
	 *
	 * @access public
	 * @var string
	 */
	public $payerEmail;

	/**
	 * Unique identifier for the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $number;

	/**
	 * Company contact information of the merchant company sending the invoice.
	 *
	 * @access public
	 * @var BusinessInfoType
	 */
	public $merchantInfo;

	/**
	 * List of items included in this invoice.
	 *
	 * array
	 * @access public
	 * @var InvoiceItemType
	 */
	public $items;

	/**
	 * Currency used for all invoice item amounts and totals.
	 *
	 * @access public
	 * @var string
	 */
	public $currencyCode;

	/**
	 * Date on which the invoice will be enabled.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $invoiceDate;

	/**
	 * Date on which the invoice payment is due.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $dueDate;

	/**
	 * Terms by which the invoice payment is due.
	 *
	 * @access public
	 * @var PaymentTermsType
	 */
	public $paymentTerms;

	/**
	 * A discount percent applied to the invoice, if any.
	 *
	 * @access public
	 * @var decimal
	 */
	public $discountPercent;

	/**
	 * A discount amount applied to the invoice, if any.  If DiscountPercent is provided, DiscountAmount is ignored.
	 *
	 * @access public
	 * @var decimal
	 */
	public $discountAmount;

	/**
	 * General terms for the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $terms;

	/**
	 * Note to the payer company.
	 *
	 * @access public
	 * @var string
	 */
	public $note;

	/**
	 * Memo for book keeping that is private to the Merchant.
	 *
	 * @access public
	 * @var string
	 */
	public $merchantMemo;

	/**
	 * Billing information for the payer.
	 *
	 * @access public
	 * @var BusinessInfoType
	 */
	public $billingInfo;

	/**
	 * Shipping information for the payer.
	 *
	 * @access public
	 * @var BusinessInfoType
	 */
	public $shippingInfo;

	/**
	 * Cost of shipping.
	 *
	 * @access public
	 * @var decimal
	 */
	public $shippingAmount;

	/**
	 * Name of the applicable tax on shipping cost, if any.
	 *
	 * @access public
	 * @var string
	 */
	public $shippingTaxName;

	/**
	 * Rate of the applicable tax on shipping cost, if any.
	 *
	 * @access public
	 * @var decimal
	 */
	public $shippingTaxRate;


	public function init($map = null, $prefix='') {
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
			$this->merchantInfo = new BusinessInfoType();
			$this->merchantInfo->init($map, $newPrefix);
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."items($i)") ) {
					$newPrefix = $prefix."items($i).";
				$this->items[$i] = new InvoiceItemType();
				$this->items[$i]->init($map, $newPrefix);
			}
			 }
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
			$this->billingInfo = new BusinessInfoType();
			$this->billingInfo->init($map, $newPrefix);
			$newPrefix = $prefix ."shippingInfo.";
			$this->shippingInfo = new BusinessInfoType();
			$this->shippingInfo->init($map, $newPrefix);
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

	public function __construct($merchantEmail = null, $payerEmail = null, $items = null, $currencyCode = null, $paymentTerms = null) {
		$this->merchantEmail  = $merchantEmail;
		$this->payerEmail  = $payerEmail;
		$this->items  = $items;
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
			$str .= $delim . call_user_func(array($this->items[$i], 'toNVPString'), $newPrefix);
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
 * Contact information for a company participating in the invoicing system.
 */
class BusinessInfoType {
	/**
	 * First name of the company contact.
	 *
	 * @access public
	 * @var string
	 */
	public $firstName;

	/**
	 * Last name of the company contact.
	 *
	 * @access public
	 * @var string
	 */
	public $lastName;

	/**
	 * Business name of the company.
	 *
	 * @access public
	 * @var string
	 */
	public $businessName;

	/**
	 * Phone number for contacting the company.
	 *
	 * @access public
	 * @var string
	 */
	public $phone;

	/**
	 * Fax number used by the company.
	 *
	 * @access public
	 * @var string
	 */
	public $fax;

	/**
	 * Website used by the company.
	 *
	 * @access public
	 * @var string
	 */
	public $website;

	/**
	 * Custom value to be displayed in the contact information details.
	 *
	 * @access public
	 * @var string
	 */
	public $customValue;

	/**
	 * Street address of the company.
	 *
	 * @access public
	 * @var BaseAddress
	 */
	public $address;


	public function init($map = null, $prefix='') {
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
			$this->address = new BaseAddress();
			$this->address->init($map, $newPrefix);
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

}

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


	public function init($map = null, $prefix='') {
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
 * Item information about a service or product listed in the invoice.
 */
class InvoiceItemType {
	/**
	 * SKU or item name.
	 *
	 * @access public
	 * @var string
	 */
	public $name;

	/**
	 * Description of the item.
	 *
	 * @access public
	 * @var string
	 */
	public $description;

	/**
	 * Date on which the product or service was provided.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $date;

	/**
	 * Item count.
	 *
	 * @access public
	 * @var decimal
	 */
	public $quantity;

	/**
	 * Price of the item, in the currency specified by the invoice.
	 *
	 * @access public
	 * @var decimal
	 */
	public $unitPrice;

	/**
	 * Name of an applicable tax, if any.
	 *
	 * @access public
	 * @var string
	 */
	public $taxName;

	/**
	 * Rate of an applicable tax, if any.
	 *
	 * @access public
	 * @var decimal
	 */
	public $taxRate;


	public function init($map = null, $prefix='') {
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
 * FaultMessage
 * This specifies a fault, encapsulating error
 * data, with specific error codes.
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


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * ResponseEnvelope
 * This specifies a list of parameters with every
 * response from a service.
 */
class ResponseEnvelope {
	/**
	 * @access public
	 * @var dateTime
	 */
	public $timestamp;

	/**
	 * Application level acknowledgment code.
	 *
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


	public function init($map = null, $prefix='') {
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
 * ErrorData
 * This type contains the detailed error
 * information resulting from the service
 * operation.
 */
class ErrorData {
	/**
	 * @access public
	 * @var long
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
	 * @var token
	 */
	public $exceptionId;

	/**
	 * array
	 * @access public
	 * @var ErrorParameter
	 */
	public $parameter;


	public function init($map = null, $prefix='') {
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
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."parameter($i)") ) {
					$newPrefix = $prefix."parameter($i).";
				$this->parameter[$i] = new ErrorParameter();
				$this->parameter[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * ErrorParameter
 */
class ErrorParameter {
	/**
	 * @access public
	 * @var string
	 */
	public $value;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'value';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->value = $map[$mapKeyName];
			}
		}
	}
}

/**
 * CreateInvoiceResponse
 * The response object for CreateInvoice.
 */
class CreateInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The created invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The created invoice's number.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * SendInvoiceRequest
 * The request object for SendInvoice.
 */
class SendInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * ID of the invoice to send.
	 *
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
 * The response object for SendInvoice.
 */
class SendInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The sent invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);

			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * CreateAndSendInvoiceRequest
 * The request object for CreateAndSendInvoice.
 */
class CreateAndSendInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * Data to populate the newly created invoice.
	 *
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
 * The response object for CreateAndSendInvoice.
 */
class CreateAndSendInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The created invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The created invoice's number.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * UpdateInvoiceRequest
 * The request object for UpdateInvoice.
 */
class UpdateInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * invoice's ID
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * Data to populate the newly created invoice.
	 *
	 * @access public
	 * @var InvoiceType
	 */
	public $invoice;


	public function __construct($requestEnvelope = null, $invoiceID = null, $invoice = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->invoiceID  = $invoiceID;
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
		if( $this->invoiceID != null ) {
			$str .= $delim .  $prefix . 'invoiceID=' . urlencode($this->invoiceID);
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
 * UpdateInvoiceResponse
 * The response object for UpdateInvoice.
 */
class UpdateInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The updated invoice's number.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * GetInvoiceDetailsRequest
 * The request object for GetInvoiceDetails.
 */
class GetInvoiceDetailsRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * ID of the invoice to retrieve.
	 *
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
 * GetInvoiceDetailsResponse
 * The response object for CreateInvoice.
 */
class GetInvoiceDetailsResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The requested invoice.
	 *
	 * @access public
	 * @var InvoiceType
	 */
	public $invoice;

	/**
	 * The requested invoice details.
	 *
	 * @access public
	 * @var InvoiceDetailsType
	 */
	public $invoiceDetails;

	/**
	 * The requested invoice payment details.
	 *
	 * @access public
	 * @var PaymentDetailsType
	 */
	public $paymentDetails;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$newPrefix = $prefix ."invoice.";
			$this->invoice = new InvoiceType();
			$this->invoice->init($map, $newPrefix);
			$newPrefix = $prefix ."invoiceDetails.";
			$this->invoiceDetails = new InvoiceDetailsType();
			$this->invoiceDetails->init($map, $newPrefix);
			$newPrefix = $prefix ."paymentDetails.";
			$this->paymentDetails = new PaymentDetailsType();
			$this->paymentDetails->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * InvoiceDetailsType
 * Invoice details about the invoice status and state change dates.
 */
class InvoiceDetailsType {
	/**
	 * Status of the invoice.
	 *
	 * @access public
	 * @var StatusType
	 */
	public $status;

	/**
	 * Whether the invoice was created via the website or via an API call.
	 *
	 * @access public
	 * @var OriginType
	 */
	public $origin;

	/**
	 * Date when the invoice was created.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $createdDate;

	/**
	 * Account that created the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $createdByAccount;

	/**
	 * If canceled, date when the invoice was canceled.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $canceledDate;

	/**
	 * Actor who canceled the invoice.
	 *
	 * @access public
	 * @var ActorType
	 */
	public $canceledBy;

	/**
	 * Account that canceled the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $canceledByAccount;

	/**
	 * Date when the invoice was last edited.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $lastUpdatedDate;

	/**
	 * Account that last edited the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $lastUpdatedByAccount;

	/**
	 * Date when the invoice was first sent.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $firstSentDate;

	/**
	 * Date when the invoice was last sent.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $lastSentDate;

	/**
	 * Account that last sent the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $lastSentByAccount;

	/**
	 * If the invoice was paid, date when the invoice was paid.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $paidDate;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'status';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->status = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'origin';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->origin = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'createdDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createdDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'createdByAccount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->createdByAccount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'canceledDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->canceledDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'canceledBy';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->canceledBy = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'canceledByAccount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->canceledByAccount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastUpdatedDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastUpdatedDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastUpdatedByAccount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastUpdatedByAccount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'firstSentDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->firstSentDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastSentDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastSentDate = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'lastSentByAccount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->lastSentByAccount = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'paidDate';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->paidDate = $map[$mapKeyName];
			}
		}
	}
}

/**
 * PaymentDetailsType
 * Payment details about the invoice.
 */
class PaymentDetailsType {
	/**
	 * True if the invoice was paid using PayPal.
	 *
	 * @access public
	 * @var boolean
	 */
	public $viaPayPal;

	/**
	 * PayPal payment details.
	 *
	 * @access public
	 * @var PayPalPaymentDetailsType
	 */
	public $paypalPayment;

	/**
	 * PayPal payment details.
	 *
	 * @access public
	 * @var OtherPaymentDetailsType
	 */
	public $otherPayment;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'viaPayPal';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->viaPayPal = $map[$mapKeyName];
			}
			$newPrefix = $prefix ."paypalPayment.";
			$this->paypalPayment = new PayPalPaymentDetailsType();
			$this->paypalPayment->init($map, $newPrefix);
			$newPrefix = $prefix ."otherPayment.";
			$this->otherPayment = new OtherPaymentDetailsType();
			$this->otherPayment->init($map, $newPrefix);
		}
	}
}

/**
 * PayPalPaymentDetailsType
 * PayPal payment details about the invoice.
 */
class PayPalPaymentDetailsType {
	/**
	 * Transaction ID of the PayPal payment.
	 *
	 * @access public
	 * @var string
	 */
	public $transactionID;

	/**
	 * Date when the invoice was paid.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $date;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'transactionID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->transactionID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'date';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->date = $map[$mapKeyName];
			}
		}
	}
}

/**
 * OtherPaymentDetailsType
 * Offline payment details about the invoice.
 */
class OtherPaymentDetailsType {
	/**
	 * Method used for the offline payment.
	 *
	 * @access public
	 * @var string
	 */
	public $method;

	/**
	 * Optional note associated with the payment.
	 *
	 * @access public
	 * @var string
	 */
	public $note;

	/**
	 * Date when the invoice was paid.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $date;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'method';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->method = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'note';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->note = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'date';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->date = $map[$mapKeyName];
			}
		}
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->method != null ) {
			$str .= $delim .  $prefix . 'method=' . urlencode($this->method);
			$delim = '&';
		}
		if( $this->note != null ) {
			$str .= $delim .  $prefix . 'note=' . urlencode($this->note);
			$delim = '&';
		}
		if( $this->date != null ) {
			$str .= $delim .  $prefix . 'date=' . urlencode($this->date);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * CancelInvoiceRequest
 * The request object for CancelInvoice.
 */
class CancelInvoiceRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * invoice's ID
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * Subject of the cancellation notification
	 *
	 * @access public
	 * @var string
	 */
	public $subject;

	/**
	 * Note to send payer within the cancellation notification
	 *
	 * @access public
	 * @var string
	 */
	public $noteForPayer;

	/**
	 * send a copy of cancellation notification to merchant
	 *
	 * @access public
	 * @var boolean
	 */
	public $sendCopyToMerchant;


	public function __construct($requestEnvelope = null) {
		$this->requestEnvelope  = $requestEnvelope;
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
		if( $this->subject != null ) {
			$str .= $delim .  $prefix . 'subject=' . urlencode($this->subject);
			$delim = '&';
		}
		if( $this->noteForPayer != null ) {
			$str .= $delim .  $prefix . 'noteForPayer=' . urlencode($this->noteForPayer);
			$delim = '&';
		}
		if( $this->sendCopyToMerchant != null ) {
			$str .= $delim .  $prefix . 'sendCopyToMerchant=' . urlencode($this->sendCopyToMerchant);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * CancelInvoiceResponse
 * The response object for CancelInvoice.
 */
class CancelInvoiceResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The canceled invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The canceled invoice's number.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * SearchInvoicesRequest
 * The request object for SearchInvoices.
 */
class SearchInvoicesRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * Invoice creator's email.
	 *
	 * @access public
	 * @var string
	 */
	public $merchantEmail;

	/**
	 * Parameters constraining the search.
	 *
	 * @access public
	 * @var SearchParametersType
	 */
	public $parameters;

	/**
	 * Page number of result set.
	 *
	 * @access public
	 * @var integer
	 */
	public $page;

	/**
	 * Number of results per page.
	 *
	 * @access public
	 * @var integer
	 */
	public $pageSize;


	public function __construct($requestEnvelope = null, $merchantEmail = null, $parameters = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->merchantEmail  = $merchantEmail;
		$this->parameters  = $parameters;
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->requestEnvelope != null ) {
			$newPrefix = $prefix . 'requestEnvelope.';
			$str .= $delim . call_user_func(array($this->requestEnvelope, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->merchantEmail != null ) {
			$str .= $delim .  $prefix . 'merchantEmail=' . urlencode($this->merchantEmail);
			$delim = '&';
		}
		if( $this->parameters != null ) {
			$newPrefix = $prefix . 'parameters.';
			$str .= $delim . call_user_func(array($this->parameters, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->page != null ) {
			$str .= $delim .  $prefix . 'page=' . urlencode($this->page);
			$delim = '&';
		}
		if( $this->pageSize != null ) {
			$str .= $delim .  $prefix . 'pageSize=' . urlencode($this->pageSize);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * SearchParametersType
 * Search parameters criteria.
 */
class SearchParametersType {
	/**
	 * Email search string.
	 *
	 * @access public
	 * @var string
	 */
	public $email;

	/**
	 * Recipient search string.
	 *
	 * @access public
	 * @var string
	 */
	public $recipientName;

	/**
	 * Company search string.
	 *
	 * @access public
	 * @var string
	 */
	public $companyName;

	/**
	 * Invoice number search string.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * Invoice status search.
	 *
	 * array
	 * @access public
	 * @var StatusType
	 */
	public $status;

	/**
	 * Invoice amount search.  Specifies the smallest amount to be returned.
	 *
	 * @access public
	 * @var decimal
	 */
	public $lowerAmount;

	/**
	 * Invoice amount search.  Specifies the largest amount to be returned.
	 *
	 * @access public
	 * @var decimal
	 */
	public $upperAmount;

	/**
	 * Currency used for searched invoices.
	 *
	 * @access public
	 * @var string
	 */
	public $currencyCode;

	/**
	 * Invoice memo search string.
	 *
	 * @access public
	 * @var string
	 */
	public $memo;

	/**
	 * Whether the invoice was created via the website or via an API call.
	 *
	 * @access public
	 * @var OriginType
	 */
	public $origin;

	/**
	 * Invoice date range filter.
	 *
	 * @access public
	 * @var DateRangeType
	 */
	public $invoiceDate;

	/**
	 * Invoice due date range filter.
	 *
	 * @access public
	 * @var DateRangeType
	 */
	public $dueDate;

	/**
	 * Invoice payment date range filter.
	 *
	 * @access public
	 * @var DateRangeType
	 */
	public $paymentDate;

	/**
	 * Invoice creation date range filter.
	 *
	 * @access public
	 * @var DateRangeType
	 */
	public $creationDate;


	public function __construct($currencyCode = null) {
		$this->currencyCode  = $currencyCode;
	}

	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->email != null ) {
			$str .= $delim .  $prefix . 'email=' . urlencode($this->email);
			$delim = '&';
		}
		if( $this->recipientName != null ) {
			$str .= $delim .  $prefix . 'recipientName=' . urlencode($this->recipientName);
			$delim = '&';
		}
		if( $this->companyName != null ) {
			$str .= $delim .  $prefix . 'companyName=' . urlencode($this->companyName);
			$delim = '&';
		}
		if( $this->invoiceNumber != null ) {
			$str .= $delim .  $prefix . 'invoiceNumber=' . urlencode($this->invoiceNumber);
			$delim = '&';
		}
		for($i=0; $i<count($this->status);$i++) {
			$str .= $delim .  $prefix ."status($i)=" .  urlencode($this->status[$i]);
		 }
		if( $this->lowerAmount != null ) {
			$str .= $delim .  $prefix . 'lowerAmount=' . urlencode($this->lowerAmount);
			$delim = '&';
		}
		if( $this->upperAmount != null ) {
			$str .= $delim .  $prefix . 'upperAmount=' . urlencode($this->upperAmount);
			$delim = '&';
		}
		if( $this->currencyCode != null ) {
			$str .= $delim .  $prefix . 'currencyCode=' . urlencode($this->currencyCode);
			$delim = '&';
		}
		if( $this->memo != null ) {
			$str .= $delim .  $prefix . 'memo=' . urlencode($this->memo);
			$delim = '&';
		}
		if( $this->origin != null ) {
			$str .= $delim .  $prefix . 'origin=' . urlencode($this->origin);
			$delim = '&';
		}
		if( $this->invoiceDate != null ) {
			$newPrefix = $prefix . 'invoiceDate.';
			$str .= $delim . call_user_func(array($this->invoiceDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->dueDate != null ) {
			$newPrefix = $prefix . 'dueDate.';
			$str .= $delim . call_user_func(array($this->dueDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->paymentDate != null ) {
			$newPrefix = $prefix . 'paymentDate.';
			$str .= $delim . call_user_func(array($this->paymentDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}
		if( $this->creationDate != null ) {
			$newPrefix = $prefix . 'creationDate.';
			$str .= $delim . call_user_func(array($this->creationDate, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * DateRangeType
 * Determines an inclusive date range.
 */
class DateRangeType {
	/**
	 * Start of the date range.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $startDate;

	/**
	 * End of the date range.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $endDate;


	public function toNVPString($prefix='') { 
		$str = '';
		$delim = '';
		if( $this->startDate != null ) {
			$str .= $delim .  $prefix . 'startDate=' . urlencode($this->startDate);
			$delim = '&';
		}
		if( $this->endDate != null ) {
			$str .= $delim .  $prefix . 'endDate=' . urlencode($this->endDate);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * SearchInvoicesResponse
 * The response object for SearchInvoices.
 */
class SearchInvoicesResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * Number of invoices that matched the search.
	 *
	 * @access public
	 * @var integer
	 */
	public $count;

	/**
	 * Page of invoice summaries that matched the search.
	 *
	 * array
	 * @access public
	 * @var InvoiceSummaryType
	 */
	public $invoices;

	/**
	 * Page number of result set.
	 *
	 * @access public
	 * @var integer
	 */
	public $page;

	/**
	 * True if another page of invoice summary results exists.
	 *
	 * @access public
	 * @var boolean
	 */
	public $hasNextPage;

	/**
	 * True if a previous page of invoice summary results exists.
	 *
	 * @access public
	 * @var boolean
	 */
	public $hasPreviousPage;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'count';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->count = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."invoices($i)") ) {
					$newPrefix = $prefix."invoices($i).";
				$this->invoices[$i] = new InvoiceSummaryType();
				$this->invoices[$i]->init($map, $newPrefix);
			}
			 }
			$mapKeyName =  $prefix . 'page';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->page = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'hasNextPage';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->hasNextPage = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'hasPreviousPage';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->hasPreviousPage = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

/**
 * InvoiceSummaryType
 * Summary of invoice information.
 */
class InvoiceSummaryType {
	/**
	 * The created invoice's ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * Invoice creator's email.
	 *
	 * @access public
	 * @var string
	 */
	public $merchantEmail;

	/**
	 * Email to which the invoice will be sent.
	 *
	 * @access public
	 * @var string
	 */
	public $payerEmail;

	/**
	 * Unique identifier for the invoice.
	 *
	 * @access public
	 * @var string
	 */
	public $number;

	/**
	 * Total amount of the invoice.
	 *
	 * @access public
	 * @var decimal
	 */
	public $totalAmount;

	/**
	 * Currency used for all invoice item amounts and totals.
	 *
	 * @access public
	 * @var string
	 */
	public $currencyCode;

	/**
	 * Date on which the invoice will be enabled.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $invoiceDate;

	/**
	 * Date on which the invoice payment is due.
	 *
	 * @access public
	 * @var dateTime
	 */
	public $dueDate;

	/**
	 * Status of the invoice.
	 *
	 * @access public
	 * @var StatusType
	 */
	public $status;

	/**
	 * Whether the invoice was created via the website or via an API call.
	 *
	 * @access public
	 * @var OriginType
	 */
	public $origin;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
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
			$mapKeyName =  $prefix . 'totalAmount';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->totalAmount = $map[$mapKeyName];
			}
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
			$mapKeyName =  $prefix . 'status';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->status = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'origin';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->origin = $map[$mapKeyName];
			}
		}
	}
}

/**
 * MarkInvoiceAsPaidRequest
 * The request object for MarkInvoiceAsPaid.
 */
class MarkInvoiceAsPaidRequest {
	/**
	 * @access public
	 * @var RequestEnvelope
	 */
	public $requestEnvelope;

	/**
	 * ID of the invoice to mark as paid.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * Details of the payment made against this invoice.
	 *
	 * @access public
	 * @var OtherPaymentDetailsType
	 */
	public $payment;


	public function __construct($requestEnvelope = null, $invoiceID = null, $payment = null) {
		$this->requestEnvelope  = $requestEnvelope;
		$this->invoiceID  = $invoiceID;
		$this->payment  = $payment;
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
		if( $this->payment != null ) {
			$newPrefix = $prefix . 'payment.';
			$str .= $delim . call_user_func(array($this->payment, 'toNVPString'), $newPrefix);
			$delim = '&';
		}

		return $str;
	}

}

/**
 * MarkInvoiceAsPaidResponse
 * The response object for MarkInvoiceAsPaid.
 */
class MarkInvoiceAsPaidResponse {
	/**
	 * @access public
	 * @var ResponseEnvelope
	 */
	public $responseEnvelope;

	/**
	 * The paid invoice ID.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceID;

	/**
	 * The paid invoice number.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceNumber;

	/**
	 * The URL which lead merchant to view the invoice details on web.
	 *
	 * @access public
	 * @var string
	 */
	public $invoiceURL;

	/**
	 * array
	 * @access public
	 * @var ErrorData
	 */
	public $error;


	public function init($map = null, $prefix='') {
		if($map != null) {
			$newPrefix = $prefix ."responseEnvelope.";
			$this->responseEnvelope = new ResponseEnvelope();
			$this->responseEnvelope->init($map, $newPrefix);
			$mapKeyName =  $prefix . 'invoiceID';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceID = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceNumber';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceNumber = $map[$mapKeyName];
			}
			$mapKeyName =  $prefix . 'invoiceURL';
			if($map != null && array_key_exists($mapKeyName, $map)) {
				$this->invoiceURL = $map[$mapKeyName];
			}
			for($i=0; $i<10;$i++) {
				if( PPUtils::array_match_key($map, $prefix."error($i)") ) {
					$newPrefix = $prefix."error($i).";
				$this->error[$i] = new ErrorData();
				$this->error[$i]->init($map, $newPrefix);
			}
			 }
		}
	}
}

?>

