<?php
namespace PayPal\PayPalAPI;
use PayPal\EBLBaseComponents\AbstractRequestType;

class GetBillingAgreementCustomerDetailsRequestType  extends AbstractRequestType
  {

	/**
	 * @access public
	 * @namespace ns
	 * @var string
	 */
	public $Token;

	/**
	 * Constructor with arguments
	 */
	public function __construct($Token = NULL) {
		$this->Token = $Token;
	}



}
