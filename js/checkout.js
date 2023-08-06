// JavaScript Document
const stripe = Stripe("pk_test_pqHwA2XW4T2NAJuqEOWcdyLs00RZPSz1SU");


 
//const items = [{ id: "xl-tshirt" }];

let elements;

initialize();
checkStatus();

document
  .querySelector("#container-Info")
  .addEventListener("submit", handleSubmit);
var paymentId;

// Fetches a payment intent and captures the client secret
async function initialize() {
//	let aceGet = await fetch('apps/bookingApp.php?com=' + 5);
//	let aceResponse = await aceGet.text();
//		console.log(aceResponse);
//	if(aceResponse != 'success'){
//		showMessage('Your appointment time is no longer available.');
//		return;
//	}
  const response = await fetch("apps/paymentApp.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" }
  }).then((r) => r.json());
	console.log(response);
	if(response.error){
		if(response.error == 'Out of Time'){
			document.getElementById('container-Body-Inner').innerHTML = '<div id="timeOut" style="font-size: 34px; text-align: center;"><h1>Oh no, You ran out of time!</h1><p1>Return to booking and try again.</p1><a href="booking.php" class="ace--Button" style="margin: 50px auto;display: block;">Booking</a></div> '
		}
	}else{
  const {clientSecret} = response;
  const {payId} = response;
  paymentId = payId;
	
	
	const appearance = {
		theme: 'stripe',
		labels: 'floating'
	};
	
	
  elements = stripe.elements({ clientSecret, appearance });
  const paymentElement = elements.create("payment");
  paymentElement.mount("#payment-element");
	setTimeout(
		function(){
		document.getElementById('submit').classList.remove('ace--dis-None');
		},2000);}
}



async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);
	console.log(elements);
//	let aceGet = await fetch('apps/checkoutApp.php?', {
//		method: 'POST',
//		headers: { "Content-Type": "application/json"},
//		body: JSON.stringify({ secret: paymentId, ele: elements })
//	});
//	let aceResponse = await aceGet	.json();
	
//
//	let aceGet = await fetch('apps/bookingApp.php?com=' + 5);
//	let aceResponse = await aceGet.text();
//		console.log(aceResponse);
//	if(aceResponse != 'success'){
//		showMessage('Your appointment time is no longer available.');
//		return;
//	}
  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: "http://localhost/Anibere/urls/",
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occured.");
  }

		console.log(aceResponse);
  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );
  if (!clientSecret) {
    return;
  }


  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
	aceResponse2;
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
	aceResponse2;
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
	aceResponse2;
      showMessage("Something went wrong.");
      break;
  }
}
// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageText.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}