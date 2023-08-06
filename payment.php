<?php
session_start();
$timer = $_SESSION['Apt_Timer'];
$tTurn = 300-(strtotime('now')-$timer);

if(!isset($_SESSION['User']['ID'])){
	  header("HTTP/1.1 301 Moved Permanently");
	  header("Location: booking.php");
	return;
}
if(!isset($_SESSION['ServiceID'])){
	  header("HTTP/1.1 301 Moved Permanently");
	  header("Location: booking.php");
	return;
}
  header("HTTP/1.1 301 Moved Permanently");
  header("Refresh: ".$tTurn);
?>
<!DOCTYPE html>
<html>
<head>
	
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/payment.css">
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://js.stripe.com/v3/"></script>
	<script src="js/javaScipt.js" defer></script>
	<script src="js/checkout.js" defer></script>
<title>Page Title</title>
</head>
	
	
	
	
<body>
	
	<?php include("includes/nav.php")?>
	<div id="Container">
		
		
<!--		<div id="container-Header"></div>-->
		
		<div id="container-Body" class="ace--win-1920">
			<div id="container-Body-Inner" class="ace--Center">
				<div id="container-PaymentHeader">
					<div id="text-Payment">Payment</div>
					<div id="text-PaymentSub">Choose payment method below</div>
				</div>
				<div id="container-Method" class="ace--dis-Flex" style="font-size: 16px;">
					<div class="container-Method-Options-Selected">
						<div class="ace--Center">
							<svg xmlns="http://www.w3.org/2000/svg" width="66.437" height="43.809" viewBox="0 0 66.437 43.809">
							<path id="Path_217" data-name="Path 217" d="M60.778,0H5.656A5.706,5.706,0,0,0,0,5.656v32.5a5.706,5.706,0,0,0,5.656,5.656H60.778a5.706,5.706,0,0,0,5.656-5.656V5.656A5.575,5.575,0,0,0,60.778,0ZM8.124,8.227h8.227a3.314,3.314,0,0,1,3.291,3.291,3.249,3.249,0,0,1-3.291,3.291H8.124a3.314,3.314,0,0,1-3.291-3.291A3.249,3.249,0,0,1,8.124,8.227ZM61.7,31.16H4.833V21.9H61.7Z" fill="hsla(52,100%,50%,1)"/>
						</svg>
						</div>
					</div>
					<div class="container-Method-Options">
						<div class="ace--Center">
							<svg id="Group_324" data-name="Group 324" xmlns="http://www.w3.org/2000/svg" width="120.017" height="29.313" viewBox="0 0 120.017 29.313">
							<path id="XMLID_15_" d="M138.294,30.327c-.353,2.393-2.175,2.393-3.943,2.393h-1.006l.707-4.459a.553.553,0,0,1,.544-.462h.462c1.2,0,2.339,0,2.91.68A2.176,2.176,0,0,1,138.294,30.327Zm-.761-6.227H130.9a.934.934,0,0,0-.925.789l-2.692,17.022a.551.551,0,0,0,.544.625h3.181a.934.934,0,0,0,.925-.789l.734-4.6a.928.928,0,0,1,.9-.789h2.094c4.378,0,6.907-2.121,7.559-6.309a5.219,5.219,0,0,0-.843-4.3C141.421,24.7,139.735,24.1,137.533,24.1Z" transform="translate(-92.655 -17.547)" fill="gray"/>
							<path id="XMLID_12_" d="M193.349,52.072a3.536,3.536,0,0,1-3.589,3.046,2.707,2.707,0,0,1-2.148-.87,2.671,2.671,0,0,1-.489-2.23,3.576,3.576,0,0,1,3.562-3.073,2.686,2.686,0,0,1,2.121.87A2.8,2.8,0,0,1,193.349,52.072Zm4.432-6.173H194.6a.533.533,0,0,0-.544.462l-.136.9-.218-.326c-.68-1.006-2.23-1.332-3.753-1.332a7.307,7.307,0,0,0-7.1,6.39,6.052,6.052,0,0,0,1.2,4.895,4.986,4.986,0,0,0,4,1.6,6.105,6.105,0,0,0,4.405-1.822l-.136.87a.574.574,0,0,0,.544.653h2.855a.934.934,0,0,0,.924-.789l1.713-10.877A.587.587,0,0,0,197.781,45.9Z" transform="translate(-133.053 -33.201)" fill="gray"/>
							<path id="XMLID_11_" d="M260.57,46.7h-3.181a.941.941,0,0,0-.761.408l-4.405,6.472-1.876-6.227a.939.939,0,0,0-.9-.653h-3.127a.547.547,0,0,0-.517.734l3.508,10.333L246,62.444a.546.546,0,0,0,.462.87h3.181a.875.875,0,0,0,.761-.408L261.033,47.57A.554.554,0,0,0,260.57,46.7Z" transform="translate(-178.929 -34.001)" fill="gray"/>
							<path id="XMLID_8_" d="M312.467,30.327c-.354,2.393-2.175,2.393-3.943,2.393h-1.006l.707-4.459a.553.553,0,0,1,.544-.462h.462c1.2,0,2.339,0,2.91.68A2.176,2.176,0,0,1,312.467,30.327Zm-.761-6.227h-6.635a.887.887,0,0,0-.9.789l-2.692,17.022a.551.551,0,0,0,.544.625h3.4a.6.6,0,0,0,.625-.544l.761-4.813a.928.928,0,0,1,.9-.789H309.8c4.378,0,6.907-2.121,7.559-6.309a5.219,5.219,0,0,0-.843-4.3C315.621,24.7,313.935,24.1,311.706,24.1Z" transform="translate(-219.486 -17.547)" fill="gray"/>
							<path id="XMLID_5_" d="M367.449,52.072a3.536,3.536,0,0,1-3.589,3.046,2.706,2.706,0,0,1-2.148-.87,2.671,2.671,0,0,1-.49-2.23,3.572,3.572,0,0,1,3.562-3.046,2.527,2.527,0,0,1,2.665,3.1Zm4.432-6.173H368.7a.533.533,0,0,0-.544.462l-.136.9-.218-.326c-.68-1.006-2.23-1.332-3.753-1.332a7.307,7.307,0,0,0-7.1,6.39,6.052,6.052,0,0,0,1.2,4.895,4.986,4.986,0,0,0,4,1.6,6.105,6.105,0,0,0,4.405-1.822l-.136.87a.574.574,0,0,0,.544.653h2.855a.887.887,0,0,0,.9-.789l1.713-10.877A.536.536,0,0,0,371.881,45.9Z" transform="translate(-259.812 -33.201)" fill="gray"/>
							<path id="XMLID_4_" d="M418.6,24.489l-2.719,17.349a.551.551,0,0,0,.544.625h2.746a.934.934,0,0,0,.924-.789l2.692-17.022a.574.574,0,0,0-.544-.653h-3.073A.587.587,0,0,0,418.6,24.489Z" transform="translate(-302.779 -17.474)" fill="gray"/>
							<path id="XMLID_3_" d="M38.525,27.4c-.027.163-.054.353-.082.544-1.224,6.145-5.33,8.266-10.578,8.266H25.2A1.288,1.288,0,0,0,23.923,37.3l-1.36,8.674-.381,2.447a.687.687,0,0,0,.68.789h4.7a1.116,1.116,0,0,0,1.115-.952l.054-.245.9-5.656.054-.3A1.137,1.137,0,0,1,30.8,41.1h.707c4.6,0,8.185-1.876,9.245-7.26.435-2.257.218-4.133-.952-5.466A4.306,4.306,0,0,0,38.525,27.4Z" transform="translate(-16.135 -19.95)" fill="#ccc"/>
							<path id="XMLID_2_" d="M41.951,24.408a4.346,4.346,0,0,0-.571-.136,4.611,4.611,0,0,0-.6-.109A15.9,15.9,0,0,0,38.416,24H31.292a1,1,0,0,0-.489.109,1.12,1.12,0,0,0-.625.843l-1.523,9.626-.054.272a1.309,1.309,0,0,1,1.278-1.088h2.665c5.248,0,9.354-2.121,10.551-8.294.027-.19.054-.353.082-.544a5.282,5.282,0,0,0-.979-.408A.966.966,0,0,0,41.951,24.408Z" transform="translate(-20.812 -17.474)" fill="#a5a5a5"/>
							<path id="XMLID_1_" d="M9.3,7.478a1.12,1.12,0,0,1,.625-.843,1.067,1.067,0,0,1,.489-.109h7.124a16.165,16.165,0,0,1,2.366.163c.218.027.408.082.6.109.19.054.381.082.571.136.082.027.19.054.272.082a5.282,5.282,0,0,1,.979.408c.354-2.284,0-3.834-1.224-5.221C19.739.653,17.292,0,14.165,0H5.055A1.268,1.268,0,0,0,3.777,1.088L-.03,25.153a.781.781,0,0,0,.761.9H6.36L7.774,17.1Z" transform="translate(0.041 0)" fill="gray"/>
						</svg>
						</div>
						<div class="ace--Center" style="top: 70%;">
							(Coming soon)
						</div>
					</div>
					<div class="container-Method-Options">
						<div class="ace--Center">
							<svg id="Group_322" data-name="Group 322" xmlns="http://www.w3.org/2000/svg" width="103.764" height="31.249" viewBox="0 0 103.764 31.249">
							<path id="Path_221" data-name="Path 221" d="M89.817,59.262c-6.01,4.443-14.751,6.811-22.29,6.811a40.414,40.414,0,0,1-27.243-10.38c-.546-.51-.073-1.2.619-.8A54.744,54.744,0,0,0,68.147,62.1a54.2,54.2,0,0,0,20.8-4.261C89.963,57.441,90.837,58.533,89.817,59.262Z" transform="translate(-25.461 -34.823)" fill="#ccc" fill-rule="evenodd"/>
							<path id="Path_222" data-name="Path 222" d="M170.454,54.6c-.765-.983-5.1-.473-7.029-.219-.583.073-.692-.437-.146-.8,3.46-2.44,9.105-1.712,9.761-.911s-.182,6.483-3.424,9.178c-.51.4-.983.182-.765-.364C169.58,59.628,171.219,55.585,170.454,54.6Z" transform="translate(-103.584 -33.004)" fill="#ccc" fill-rule="evenodd"/>
							<path id="Path_223" data-name="Path 223" d="M163.519,4.25V1.883A.554.554,0,0,1,164.1,1.3h10.562a.607.607,0,0,1,.619.583v2c0,.328-.291.765-.8,1.493l-5.463,7.794a11.866,11.866,0,0,1,6.009,1.275,1.085,1.085,0,0,1,.546.911v2.513c0,.364-.364.765-.765.546a12.049,12.049,0,0,0-11.145.036.572.572,0,0,1-.765-.546V15.5a2.722,2.722,0,0,1,.4-1.6l6.374-9.069h-5.5A.641.641,0,0,1,163.519,4.25Z" transform="translate(-103.57 -0.827)" fill="gray" fill-rule="evenodd"/>
							<path id="Path_224" data-name="Path 224" d="M52.288,18.456H49.083a.658.658,0,0,1-.583-.546V1.447a.607.607,0,0,1,.619-.583h2.987a.594.594,0,0,1,.583.546V3.559h.073A4.244,4.244,0,0,1,56.986.5c2,0,3.278.983,4.152,3.059A4.565,4.565,0,0,1,65.582.5,4.515,4.515,0,0,1,69.3,2.321c1.02,1.384.8,3.387.8,5.172V17.909a.607.607,0,0,1-.619.583H66.274a.626.626,0,0,1-.583-.583V9.168a21.847,21.847,0,0,0-.073-3.1,1.69,1.69,0,0,0-1.894-1.42A2.145,2.145,0,0,0,61.794,6,10.092,10.092,0,0,0,61.5,9.168v8.741a.607.607,0,0,1-.619.583H57.678a.626.626,0,0,1-.583-.583V9.168c0-1.821.291-4.553-1.967-4.553-2.295,0-2.222,2.622-2.222,4.553v8.741A.6.6,0,0,1,52.288,18.456Z" transform="translate(-30.836 -0.318)" fill="gray" fill-rule="evenodd"/>
							<path id="Path_225" data-name="Path 225" d="M209.248.4c4.771,0,7.321,4.116,7.321,9.324,0,5.026-2.841,9.032-7.357,9.032C204.55,18.72,202,14.641,202,9.542,202,4.406,204.586.4,209.248.4Zm.036,3.387c-2.367,0-2.513,3.241-2.513,5.245s-.036,6.3,2.477,6.3c2.477,0,2.622-3.46,2.622-5.572A15.937,15.937,0,0,0,211.4,5.39,2.038,2.038,0,0,0,209.284,3.787Z" transform="translate(-128.429 -0.254)" fill="gray" fill-rule="evenodd"/>
							<path id="Path_226" data-name="Path 226" d="M252.388,18.456h-3.205a.626.626,0,0,1-.583-.583V1.374a.629.629,0,0,1,.619-.546h2.987a.623.623,0,0,1,.583.473V3.814h.073C253.772,1.556,255.01.5,257.232.5a4.241,4.241,0,0,1,3.751,1.93c.838,1.311.838,3.533.838,5.135v10.38a.6.6,0,0,1-.619.51H258a.663.663,0,0,1-.583-.51V8.986c0-1.821.219-4.443-2-4.443a2.108,2.108,0,0,0-1.857,1.311,7.561,7.561,0,0,0-.51,3.132v8.887A.67.67,0,0,1,252.388,18.456Z" transform="translate(-158.057 -0.318)" fill="gray" fill-rule="evenodd"/>
							<path id="Path_227" data-name="Path 227" d="M124.97,10.234a6.512,6.512,0,0,1-.583,3.424,2.578,2.578,0,0,1-2.222,1.457c-1.238,0-1.967-.947-1.967-2.331,0-2.732,2.44-3.241,4.771-3.241Zm3.241,7.831a.658.658,0,0,1-.765.073,8.042,8.042,0,0,1-1.857-2.149,6.38,6.38,0,0,1-5.281,2.331c-2.7,0-4.808-1.675-4.808-4.99a5.452,5.452,0,0,1,3.424-5.245,22.738,22.738,0,0,1,6.046-1.129v-.4a3.934,3.934,0,0,0-.4-2.331,2.157,2.157,0,0,0-1.785-.838,2.425,2.425,0,0,0-2.586,1.93c-.073.291-.255.583-.546.583l-3.1-.328a.561.561,0,0,1-.473-.656C116.775,1.129,120.2,0,123.258,0A7.208,7.208,0,0,1,128.1,1.6c1.566,1.457,1.42,3.424,1.42,5.536v4.99a4.512,4.512,0,0,0,1.2,2.987c.219.291.255.656,0,.838-.692.546-1.857,1.566-2.513,2.112Z" transform="translate(-73.433)" fill="gray" fill-rule="evenodd"/>
							<path id="Path_228" data-name="Path 228" d="M9.47,10.234a6.512,6.512,0,0,1-.583,3.424,2.578,2.578,0,0,1-2.222,1.457c-1.238,0-1.967-.947-1.967-2.331,0-2.732,2.44-3.241,4.771-3.241Zm3.241,7.831a.658.658,0,0,1-.765.073,8.042,8.042,0,0,1-1.857-2.149A6.38,6.38,0,0,1,4.808,18.32C2.112,18.356,0,16.681,0,13.33A5.452,5.452,0,0,1,3.424,8.086,22.739,22.739,0,0,1,9.47,6.956v-.4a3.934,3.934,0,0,0-.4-2.331,2.125,2.125,0,0,0-1.785-.8A2.425,2.425,0,0,0,4.7,5.354c-.073.291-.255.583-.546.583l-3.1-.328a.561.561,0,0,1-.473-.656C1.238,1.129,4.662,0,7.721,0a7.208,7.208,0,0,1,4.844,1.6c1.566,1.457,1.42,3.424,1.42,5.536v4.99a4.512,4.512,0,0,0,1.2,2.987c.219.291.255.656,0,.838-.692.546-1.857,1.566-2.477,2.112Z" fill="gray" fill-rule="evenodd"/>
						</svg>
						</div>
						<div class="ace--Center" style="top: 70%;">
							(Coming soon)
						</div>
					</div>
				</div>
				<form id="container-Info" class="ace--pos-Relative">
					<div class="">
<!--
						<div class="ace--dis-InlineBlock paymentColl">
							<div id="group-Name" class="ace--dis-Flex">
								<ace--input class="ace--pos-Relative" input-id="input-Name-First" type="text" title="nameFirst" lblclass="label-Dynamic ace--CenterHorizontal" required>First Name</ace--input>
								<ace--input class="ace--pos-Relative" input-id="input-Name-Last" type="text" title="nameLast" lblclass="label-Dynamic ace--CenterHorizontal" required>Last Name</ace--input>
							</div>
							<div id="group-Contact" class="ace--dis-Flex">
								<ace--input class="ace--pos-Relative" input-id="input-Email" type="email" title="email" lblclass="label-Dynamic ace--CenterHorizontal" required>Email</ace--input>
								<ace--input class="ace--pos-Relative" input-id="input-Phone" type="phone" title="phone" lblclass="label-Dynamic ace--CenterHorizontal">Phone (optional)</ace--input>
							</div>
						</div>
-->
						<div class="ace--dis-InlineBlock paymentColl">
							<div id="payment-element"></div>
	<!--
							<ace--input-stripe class="ace--pos-Relative" input-id="input-CardNumber" type="number" title="cardNumber" lblclass="label-Dynamic ace--CenterHorizontal" placeholder="hi">Card Number</ace--input-stripe>
							<ace--input class="ace--pos-Relative" input-id="input-Cardholder" type="text" title="cardholder" lblclass="label-Dynamic ace--CenterHorizontal">Cardholder</ace--input>
							<ace--input class="ace--pos-Relative" input-id="input-CardExpiry" type="month" title="cardExpiry" lblclass="label-Dynamic ace--CenterHorizontal">Expire date</ace--input>
							<ace--input class="ace--pos-Relative ace--width-50" input-id="input-CardCVV" type="number" title="cardCVV" lblclass="label-Dynamic ace--CenterHorizontal">CVV</ace--input>
	-->
						</div>
					</div>
					<button id="submit" class="ace--Button ace--CenterHorizontal ace--dis-None">
						<div class="spinner hidden" id="spinner"></div>
						<span id="button-text">Pay now</span>
					</button>
					<div id="payment-message" class="hidden"></div>
					
					
					
<!--
					
					<button id="submit">
						<div class="spinner hidden" id="spinner"></div>
						<span id="button-text">Pay now</span>
					</button>
					<div id="payment-message" class="hidden"></div>
-->
				</form>
				
			</div>
		</div>
	
	
	</div>
	
	
	
	
	
	
	
</body>
	
	
	
	
	
	
</html>