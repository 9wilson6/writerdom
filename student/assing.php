<?php
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
if (isset($_POST['assing'])) {
	session_start();
	$_SESSION['project_id']=$_POST['project_id'];
	$_SESSION['user_id']=$_POST['user_id'];
	$_SESSION['user_type_pass']=$_POST['user_type'];
	$_SESSION['tutor_id']=$_POST['tutor_id'];
	$_SESSION['cost']=$_POST['cost'];
	$_SESSION['charges']=$_POST['charged'];
	require '../paypal_integration/bootstrap.php';
	if (empty($_POST['cost'])) {
		throw new Exception('This script should not be called directly, expected post data');
	}
	$payer = new Payer();
	$payer->setPaymentMethod('paypal');
	// Set some example data for the payment.
	$currency = 'USD';
	$amountPayable = $_POST['cost'];
	$invoiceNumber = uniqid();
	$amount = new Amount();
	$amount->setCurrency($currency)
	->setTotal($amountPayable);
	$transaction = new Transaction();
	$transaction->setAmount($amount)
	->setDescription("$".$_POST['cost']." TO BE PAID FOR COMPLETION OF PROJECT ID: ".$_POST['project_id'])
	->setInvoiceNumber($invoiceNumber);
	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl($paypalConfig['return_url'])
	->setCancelUrl($paypalConfig['cancel_url']);
	$payment = new Payment();
	$payment->setIntent('sale')
	->setPayer($payer)
	->setTransactions([$transaction])
	->setRedirectUrls($redirectUrls);
	try {
		$payment->create($apiContext);
	} catch (Exception $e) {
		throw new Exception('message: '.$e->getMessage());
	}

	header('location:' . $payment->getApprovalLink());
	exit(1);
}
