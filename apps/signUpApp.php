<?php
session_start();

require_once("../includes/dbConn.php");
require_once("../classes/accountClass.php");

require '../vendor/autoload.php';

$stripe = new \Stripe\StripeClient("sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo");



$Account = new Account();
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];
$npsw = $_POST["npsw"];
$cpsw = $_POST["cpsw"];

$stripeJ = $stripe->customers->create([
	'name' => $fName.' '.$lName,
	'email' => $email,
  'description' => 'My First Test Customer (created for API docs)',
]);
$stripe_ID = $stripeJ->id;

$sU = ($npsw == $cpsw)?$Account->addAccount($stripe_ID, $fName, $lName, $email, $npsw):0;
try {

	if ($sU){
		isset($_SERVER['HTTP_REFERER']) ? header("location: ".$_SERVER['HTTP_REFERER']) : header("location: anibere.com");
	}else{
		$_SESSION["signUp"] = false;
		isset($_SERVER['HTTP_REFERER']) ? header("location: ".$_SERVER['HTTP_REFERER']) : header("location:  anibere.com");
	}
}
catch (Exception $e) {
	echo $e->getMessage();
	die();
}


?>