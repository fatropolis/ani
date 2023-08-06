<?php
session_start();
session_destroy();



$e = date('U');



echo $e;

//print_r($_SESSION['instagram']['posts'][0]);
//include_once 'includes/dbConn.php';
//include_once 'classes/productClass.php';
//include_once 'classes/stylingClass.php';
//
//$Product = new Product();
//$Styling = new Styling();
//$featured = $Product->getProducts(2);



//$query = 'SELECT CreationDate FROM anibere.products';
//$res = $conn->prepare($query);
//$res->execute();
//$row = $res->fetchAll(PDO::FETCH_ASSOC);
//foreach($featured as $x){
//	print_r($featured);
//	echo('<br><br><br>');
//}




//session_destroy();


//print_r($_SESSION['Booking_Styles']['0'][0]['Service_ID']);



//foreach($_SESSION as $x){
//	echo '<br>----->';
//	print_r($x);
//	echo '<br><br>';
//}








//session_start();
//include_once("includes/dbConn.php");

//// include defines for access to global variables
//include 'defines.php';
//$fields = 'media_url,permalink,caption';
//// syntax for api call endpoint
//$pagesEndpoint = ENDPOINT_BASE."$instagramAccountId/media?fields=$fields&access_token=$accessToken";
//
//
//$ch = curl_init();
//curl_setopt( $ch, CURLOPT_URL, $pagesEndpoint);
//curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
//
//$response = curl_exec($ch);
//curl_close($ch);
//$responseArray = json_decode($response, true);
//unset($responseArray['data'][0]['access_token']);
//
////print_r($responseArray);
//foreach($responseArray['data'] as $x){
//	print_r($x['media_url'].'<br><br>');
//	print_r($x['permalink'].'<br><br>');
//	print_r($x['caption'].'<br><br>');
//	echo '<br><br><br><br>';
//}
?>
