<?php
session_start();

require_once("../includes/dbConn.php");
require_once("../classes/accountClass.php");


$Account = new Account;
$logout = $Account->logout();
try {
	$logout;
	session_destroy();
  	header("HTTP/1.1 301 Moved Permanently");
	isset($_SERVER['HTTP_REFERER']) ? header("location: ".$_SERVER['HTTP_REFERER']) : header("location: ../URLs/index.php");
//	if (isset($_SERVER['HTTP_REFERER']))
//		echo ('<script type="text/javascript">history.go(-1)</script>');
//		else  header("location: ../URLs/index.php");
}
catch (Exception $e) {
	echo $e->getMessage();
	die();
}


?>