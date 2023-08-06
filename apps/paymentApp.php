<?php
session_start();
include_once("../includes/dbConn.php");
include_once("../classes/serviceClass.php");
include_once("../classes/stylingClass.php");
require_once('../stripe/stripe-php/init.php');

//Set your secret key. Remember to switch to your live secret key in production.
//See your keys here: https://dashboard.stripe.com/apikeys



//require '../vendor/autoload.php';


\Stripe\Stripe::setApiKey('sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo');

	isset($_SESSION['User'])?$user = $_SESSION['User']['ID']: $user = 0;
//echo('<script>console.log('.$_SESSION["price"].')</script>');
//
function setAppointment() {
	$Service = new Service();
	$Styling = new Styling();
	$service = $_SESSION['ServiceID'];
	$slot = $_SESSION['Slot'];
	$day = $_SESSION['Day'];
	isset($_SESSION['User'])?$user = $_SESSION['User']['ID']: $user = 0;
	$slots = $_SESSION['ServiceSlots'];
	$send = $Service->setAppointment($service, $slot, $day, $user, $slots);
	return $send;
}
function calculateOrderAmount() {
	
	$amt = $_SESSION['Price'];
	
    return $amt;
}

header('Content-Type: application/json');

try {
	//    // retrieve JSON from POST body
		$jsonStr = file_get_contents('php://input');
		$jsonObj = json_decode($jsonStr);
	$setCheck = setAppointment();
	if($setCheck == 1){
		// Create a PaymentIntent with amount and currency
		$paymentIntent = \Stripe\PaymentIntent::create([
			'customer' => $user,
			'metadata' => [
				'Service_ID' => $_SESSION['ServiceID'],
				'Slot_ID' => $_SESSION['Slot'],
				'Day_ID' => $_SESSION['Day'],
				'Slot_Count' => $_SESSION['ServiceSlots']
						  ],
			'amount' => calculateOrderAmount(),
			'currency' => 'usd',
			'automatic_payment_methods' => ['enabled' => true],
		]);
		$output = [
			'return' => $setCheck,
			'clientSecret' => $paymentIntent->client_secret,
			'payId' => $paymentIntent->id,
		];
	}else{
		$output = [
			'error' => $setCheck,
		];
	}
    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>