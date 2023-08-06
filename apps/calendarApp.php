<?php
session_start();
date_default_timezone_set("America/Chicago");

include_once("../includes/dbConn.php");
include_once("../classes/calendarClass.php");

$dir = $_GET['dir'];
$pos = $_GET['pos'];

if($pos == 0 && $dir == -1)
	$pos = 1;
if($pos == 1 && $dir == 1)
	$pos = 0;

$Cal = new Calendar();

echo $Cal->aceCal($dir+$pos);

?>