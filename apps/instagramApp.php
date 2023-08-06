<?php
session_id()?'':session_start();
if(isset($_GET['pos'])){
	$pos = $_GET['pos']+1;
	$len = count($_SESSION['instagram']['posts']);
	$urls = array_slice($_SESSION['instagram']['posts'],$pos,6);
	$more = $len-$pos-6>0?1:0;
	$return = json_encode(['urls'=>$urls, 'more'=>$more, 'debug' => ['len' => $len, 'pos' => $pos]]);
	echo $return;
	exit;
}

$fields = 'media_url,media_type,permalink,caption&limit=100';
// syntax for api call endpoint
$pagesEndpoint = ENDPOINT_BASE."$instagramAccountId/media?fields=$fields&access_token=$accessToken";


$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $pagesEndpoint);
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
$responseArray = json_decode($response, true);
unset($responseArray['data'][0]['access_token']);

//print_r($responseArray);
$next = $responseArray['paging']['next'];
$start = stripos($next,'after=');
$loadMore = substr($next,$start+6);
$_SESSION['instagram']['posts'] = $responseArray['data'];
$_SESSION['instagram']['time'] = date('U');
?>