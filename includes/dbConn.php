<?php
$DBservername = "104.154.24.175";
$DBusername = "root";
$DBpassword = "anibereRootPassword#9469";
$DBname = "anibere";

define('TIMEZONE', 'America/Chicago');
date_default_timezone_set(TIMEZONE);

$now = new DateTime();
$mins = $now->getOffset() / 60;
$sgn = ($mins < 0 ? -1 : 1);
$mins = abs($mins);
$hrs = floor($mins / 60);
$mins -= $hrs * 60;
$offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);

try {
  $conn = new PDO("mysql:host=$DBservername;dbname=$DBname", $DBusername, $DBpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("SET time_zone='$offset';");
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>