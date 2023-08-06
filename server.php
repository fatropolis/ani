<?php
session_start();
include_once("includes/dbConn.php");
include_once("classes/serviceClass.php");
//require_once('stripe/stripe-php/init.php');
require 'vendor/autoload.php';

$Service = new Service();

\Stripe\Stripe::setApiKey('sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo');
$stripe = new \Stripe\StripeClient(
  'sk_test_0Ta3TPMXID61qhgerh55RGmi00YHWyhvbo'
);

$endpoint_secret = 'whsec_c63d25f1bc5e44a582284c846ca4205295daa0f241766b503aa6d17351bd38f9';
	
$payload = @file_get_contents('php://input');
$event = null;
function handlePaymentIntentSucceeded ($a){
}
try {
  $event = \Stripe\Event::constructFrom(
    json_decode($payload, true)
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  echo '⚠️  Webhook error while parsing basic request.';
  http_response_code(400);
  exit();
}

// Handle the event
switch ($event->type) {
  case 'payment_intent.created':
    $paymentIntentC = $event->data->object;
		
    break;
  case 'payment_intent.succeeded':
		$paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
		$Service_ID = $paymentIntent->metadata->Service_ID; // contains a \Stripe\PaymentIntent
		$Slot_ID = $paymentIntent->metadata->Slot_ID; // contains a \Stripe\PaymentIntent
		$Day_ID = $paymentIntent->metadata->Day_ID; // contains a \Stripe\PaymentIntent
		$Customer = $paymentIntent->customer; // contains a \Stripe\PaymentIntent
		$Slot_Count = $paymentIntent->metadata->Slot_Count; // contains a \Stripe\PaymentIntent
    // Then define and call a method to handle the successful payment intent.
		$Service->confirmAppointment($Service_ID, $Slot_ID, $Day_ID, $Customer, $Slot_Count);
    break;
  case 'payment_method.attached':
    $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
    // Then define and call a method to handle the successful attachment of a PaymentMethod.
    // handlePaymentMethodAttached($paymentMethod);
    break;
  default:
    // Unexpected event type
    error_log('Received unknown event type');
}

http_response_code(200);
?>