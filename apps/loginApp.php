<?php
session_start();

require_once("../includes/dbConn.php");
require_once("../classes/accountClass.php");

$Account = new Account();
$uName = $_POST["uName"];
$psw = $_POST["psw"];

$login = $Account->login($uName,$psw);
try {

	if ($login){
		header("location:  ../");
	}else{
		$_SESSION["pswAuth"] = false;
		header("location: ../logIn.php");
	}
}
catch (Exception $e) {
	echo $e->getMessage();
	die();
}


?>