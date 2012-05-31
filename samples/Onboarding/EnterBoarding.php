<?php
$path = '../../lib';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('services/PayPalApi/PayPalAPIInterfaceServiceService.php');
require_once('PPLoggingManager.php');

$logger = new PPLoggingManager('EnterBoarding');

$bankAccount = new BankAccountDetailsType();
$bankAccount->AccountNumber = $_REQUEST['accNum'];
$bankAccount->Name = $_REQUEST['accName'];
$bankAccount->Type = $_REQUEST['accType'];

$bizAddress = new AddressType();
$bizAddress->Name = $_REQUEST['name'];
$bizAddress->Street1 = $_REQUEST['street'];
$bizAddress->CityName = $_REQUEST['city'];
$bizAddress->StateOrProvince = $_REQUEST['state'];
$bizAddress->PostalCode = $_REQUEST['postalCode'];
$bizAddress->Country = $_REQUEST['countryCode'];

$businessInfo = new BusinessInfoType();
$businessInfo->Name = $_REQUEST['businessName'];
$businessInfo->Type = $_REQUEST['businessType'];
$businessInfo->Category = $_REQUEST['businessCategory'];
$businessInfo->AverageMonthlyVolume = $_REQUEST['averageMonthlyVolume'];
$businessInfo->AveragePrice = $_REQUEST['averageTransPrice'];
$businessInfo->RevenueFromOnlineSales = $_REQUEST['revenuePercentage'];
$businessInfo->Address  = $bizAddress;

$ownerInfo = new BusinessOwnerInfoType();
$ownerInfo->SSN = $_REQUEST['SSN'];
$ownerInfo->MobilePhone = $_REQUEST['ownerPhone'];


$enterBoardingRequestDetails = new EnterBoardingRequestDetailsType();
$enterBoardingRequestDetails->ProductList  = $_REQUEST['prodList'];
$enterBoardingRequestDetails->BankAccount = $bankAccount;
$enterBoardingRequestDetails->BusinessInfo = $businessInfo;
$enterBoardingRequestDetails->MarketingCategory = $_REQUEST['marketingCategory'];
$enterBoardingRequestDetails->OwnerInfo = $ownerInfo;
$enterBoardingRequestDetails->ProgramCode = $_REQUEST['programCode'];

$enterBoardingRequest = new EnterBoardingRequestType();
$enterBoardingRequest->EnterBoardingRequestDetails = $enterBoardingRequestDetails;
$enterBoardingRequest->Version = 86;

$enterBoardingReq = new EnterBoardingReq();
$enterBoardingReq->EnterBoardingRequest = $enterBoardingRequest;

$paypalService = new PayPalAPIInterfaceServiceService();
$enterBoardingResponse = $paypalService->EnterBoarding($enterBoardingReq);

echo "<pre>";
print_r($enterBoardingResponse);
echo "</pre>";
require_once '../Response.php';