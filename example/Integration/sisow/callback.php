<?php
include_once '../../../src/PHPpayments/Loader.php';

$paymentmethod = "Payment_Integration_Sisow";
$obj_payment = \PHPpayments\Loader::load ( $paymentmethod );

//set fields that needs to be validated in ipn response, query own db first
$obj_payment->addFieldOrder ( "currency", "EUR" );
$obj_payment->addFieldOrder ( "total", "100");
//enable sandbox environment
$obj_payment->enableTestMode ();
//set credentials
$obj_payment->addFieldSetting ( "account", "???" );
$obj_payment->addFieldSetting ( "secret", "???");
//validate the callback
$obj_result = $obj_payment->validateIpn ( $_GET );
