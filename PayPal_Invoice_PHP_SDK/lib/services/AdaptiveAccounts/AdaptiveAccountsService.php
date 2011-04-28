<?php

 require('PPBaseService.php');

require_once('PPUtils.php');
if (!class_exists("AdaptiveAccountsService")) {
/**
 * AdaptiveAccounts
 * @author WSDLInterpreter
 */
class AdaptiveAccountsService extends PPBaseService {
	/**
	 * Default class map for wsdl=>php
	 * @access private
	 * @var array
	 */
	private static $classmap = array(
		"ErrorData" => "ErrorData",
		"ErrorParameter" => "ErrorParameter",
		"RequestEnvelope" => "RequestEnvelope",
		"ResponseEnvelope" => "ResponseEnvelope",
		"ClientDetailsType" => "ClientDetailsType",
		"FaultMessage" => "FaultMessage",
		"CreateAccountRequest" => "CreateAccountRequest",
		"CreateAccountResponse" => "CreateAccountResponse",
		"GetUserAgreementRequest" => "GetUserAgreementRequest",
		"GetUserAgreementResponse" => "GetUserAgreementResponse",
		"GetVerifiedStatusRequest" => "GetVerifiedStatusRequest",
		"GetVerifiedStatusResponse" => "GetVerifiedStatusResponse",
		"AddBankAccountRequest" => "AddBankAccountRequest",
		"AddBankAccountResponse" => "AddBankAccountResponse",
		"AddPaymentCardRequest" => "AddPaymentCardRequest",
		"AddPaymentCardResponse" => "AddPaymentCardResponse",
		"SetFundingSourceConfirmedRequest" => "SetFundingSourceConfirmedRequest",
		"SetFundingSourceConfirmedResponse" => "SetFundingSourceConfirmedResponse",
		"NameType" => "NameType",
		"AddressType" => "AddressType",
		"CreateAccountWebOptionsType" => "CreateAccountWebOptionsType",
		"BusinessInfoType" => "BusinessInfoType",
		"AccountValidationInfoType" => "AccountValidationInfoType",
		"BusinessStakeholderType" => "BusinessStakeholderType",
		"WebOptionsType" => "WebOptionsType",
		"CardDateType" => "CardDateType",
		"AdaptiveAccounts" => "AdaptiveAccounts",
	);

	/**
	 * No arg constructor
	 * @param string $wsdl WSDL location for this service
	 */
	public function __construct() {
		parent::__construct('AdaptiveAccounts');
	}

	/**
	 * Service Call: CreateAccount

	 *  *
 * Coutries Supported:
 * AU - Australia
 * CA - Canada
 * CY - Cyprus
 * CZ - Czech Republic
 * DK - Denmark
 * EE - Estonia
 * FI - Finland
 * FR - France
 * DE - Germany
 * GR - Greece
 * HU - Hungary
 * IT - Italy
 * LV - Latvia
 * LT - Lithuania
 * LU - Luxembourg
 * MT - Malta
 * NL - Netherlands
 * PL - Poland
 * PT - Portugal
 * SK - Slovak Republic
 * SI - Slovenia
 * ES - Spain
 * SE - Sweden
 * UK - United Kingdom
 * US - United States
 *

	 * @param CreateAccountRequest body
	 * @return CreateAccountResponse
	 * @throws APIException
	 */
	public function CreateAccount($body) {
		return new CreateAccountResponse( PPUtils::nvpToMap( $this->call("CreateAccount", $body)));
	}


	/**
	 * Service Call: GetUserAgreement

	 *  *
 * Countries Supported:
 * AU - Australia
 * AT - Austria  
 * CA - Canada
 * CZ - Czech Republic
 * EU - European Union *
 * FR - France
 * DE - Germany
 * GB - Great Britain
 * GR - Greece
 * IE - Ireland
 * IL - Israel
 * IT - Italy
 * JP - Japan
 * NL - Netherlands
 * NZ - New Zealand (Aotearoa)
 * PL - Poland
 * PT - Portugal
 * RU - Russian Federation
 * SG - Singapore
 * ZA - South Africa
 * ES - Spain
 * CH - Switzerland  
 * US - United States
 * * technically a group of countries
 *

	 * @param GetUserAgreementRequest body
	 * @return GetUserAgreementResponse
	 * @throws APIException
	 */
	public function GetUserAgreement($body) {
		return new GetUserAgreementResponse( PPUtils::nvpToMap( $this->call("GetUserAgreement", $body)));
	}


	/**
	 * Service Call: GetVerifiedStatus

	 *  *
 * All countries are supported.
 *

	 * @param GetVerifiedStatusRequest body
	 * @return GetVerifiedStatusResponse
	 * @throws APIException
	 */
	public function GetVerifiedStatus($body) {
		return new GetVerifiedStatusResponse( PPUtils::nvpToMap( $this->call("GetVerifiedStatus", $body)));
	}


	/**
	 * Service Call: AddBankAccount

	 *  *
 * Countries Supported:
 * AU - Australia
 * CA - Canada
 * FR - France
 * DE - Germany
 * IL - Israel
 * IT - Italy
 * NL - Netherlands
 * UK - United Kingdom
 * US - United States
 *

	 * @param AddBankAccountRequest body
	 * @return AddBankAccountResponse
	 * @throws APIException
	 */
	public function AddBankAccount($body) {
		return new AddBankAccountResponse( PPUtils::nvpToMap( $this->call("AddBankAccount", $body)));
	}


	/**
	 * Service Call: AddPaymentCard

	 *  *
 * Countries Supported:
 * AU - Australia
 * AT - Austria  
 * BE - Belgium
 * BR - Brazil
 * CA - Canada
 * CZ - Czech Republic
 * FR - France
 * DE - Germany
 * GR - Greece
 * HK - Hong Kong
 * IE - Ireland
 * IT - Italy
 * JP - Japan
 * LU - Luxembourg
 * MX - Mexico
 * NL - Netherlands
 * NZ - New Zealand (Aotearoa)
 * PL - Poland
 * PT - Portugal
 * RU - Russian Federation
 * SG - Singapore
 * ZA - South Africa
 * ES - Spain
 * CH - Switzerland  
 * UK - United Kingdom
 * US - United States
 *

	 * @param AddPaymentCardRequest body
	 * @return AddPaymentCardResponse
	 * @throws APIException
	 */
	public function AddPaymentCard($body) {
		return new AddPaymentCardResponse( PPUtils::nvpToMap( $this->call("AddPaymentCard", $body)));
	}


	/**
	 * Service Call: SetFundingSourceConfirmed

	 *  *
 * To be updated.
 * Countries Supported:
 * AU - Australia
 * AT - Austria  
 * BE - Belgium
 * BR - Brazil
 * CA - Canada
 * CZ - Czech Republic
 * FR - France
 * DE - Germany
 * GR - Greece
 * HK - Hong Kong
 * IE - Ireland
 * IT - Italy
 * JP - Japan
 * LU - Luxembourg
 * MX - Mexico
 * NL - Netherlands
 * NZ - New Zealand (Aotearoa)
 * PL - Poland
 * PT - Portugal
 * RU - Russian Federation
 * SG - Singapore
 * ZA - South Africa
 * ES - Spain
 * CH - Switzerland  
 * UK - United Kingdom
 * US - United States
 *

	 * @param SetFundingSourceConfirmedRequest body
	 * @return SetFundingSourceConfirmedResponse
	 * @throws APIException
	 */
	public function SetFundingSourceConfirmed($body) {
		return new SetFundingSourceConfirmedResponse( PPUtils::nvpToMap( $this->call("SetFundingSourceConfirmed", $body)));
	}


}}

?>