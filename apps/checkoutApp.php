<?php
session_start();

require_once('../stripe/stripe-php/init.php');
 //Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys



//require '../vendor/autoload.php';


\Stripe\Stripe::setApiKey('sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo');

//echo('<script>console.log('.$_SESSION["price"].')</script>');


header('Content-Type: application/json');

try {
//    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);
	
	
	$stripe = new \Stripe\StripeClient(
		'sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo'
	);
	$error = $stripe->paymentIntents->confirm(
		$jsonObj->secret
	);

//    $output = [
//        'error' => $json,
//    ];
	
    echo json_encode(['message' => $error]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>