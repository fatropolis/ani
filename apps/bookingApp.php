<?php
session_start();
include_once("../includes/dbConn.php");
include_once("../classes/serviceClass.php");
include_once("../classes/stylingClass.php");

$Service = new Service();
$Styling = new Styling();
$command = $_GET["com"];


switch($command){
	case 1:
		$data = $_GET["id"];
		$resolve = $Service->getStyleFromCat($data,1);
		foreach($resolve as $y){
			$_SESSION['Booking_Styles'][$y['Service_ID']] = $y;
			$e = $Styling->styles($y,$y['Images']);
		}
		break;
	case 2:
		$data = $_GET["id"];
//		$resolve = $Service->getStyle($data,null,1);
		$x = $_SESSION['Booking_Styles'][$data];
		$Styling->style($x);
		break;
	case 3:
		$data = $_GET["id"];
		$resolve = $_SESSION['Booking_Styles'][$data];
		$_SESSION['ServiceID'] = $resolve["Service_ID"];
		$_SESSION['ServiceName'] = $resolve["Service_Name"];
		$_SESSION['ServiceSlots'] = $resolve['Service_Time']?ceil($resolve["Service_Time"]/120):1;
		$_SESSION['ServicePrice'] = $Styling->convertToPrice($resolve[0]["Service_Price"]);
		$_SESSION['Price'] = $resolve["Service_Price"];
		echo 'success';
		break;
	case 4:
		$slot = $_GET["slot"];
		$day = $_GET["day"];
		$_SESSION['Day'] = $day;
		$_SESSION['Slot'] = $slot;
		echo 'success';
		break;
	case 5:
		$service = $_SESSION['ServiceID'];
		$slot = $_SESSION['Slot'];
		$day = $_SESSION['Day'];
		isset($_SESSION['User'])?$user = $_SESSION['User']['ID']: $user = 0;
		$slots = $_SESSION['ServiceSlots'];
		$send = $Service->setAppointment($service, $slot, $day, $user, $slots);
		$send;
		break;
	case 6:
		$service = $_SESSION['ServiceID'];
		$slot = $_SESSION['Slot'];
		$day = $_SESSION['Day'];
		$user = $_SESSION['User']['ID'];
		$slots = $_SESSION['ServiceSlots'];
		$Service->removeAppointment($service, $slot, $day, $user, $slots);
		break;
	default: echo 'There\'s been an issue';
}

//		$resolve = $Service->getStyleFromCat($data,1);
//	foreach($resolve as $a){
//		$e = $Styling->styles($a);
//	}
//}else if($command == 2){
//	$resolve = $Service->getStyle($data,null,1);
//	$Styling->style($resolve[0]);
//}else if($command == 3){
//	$resolve = $Service->getStyle($data,null,1);
//	$_SESSION['ServiceID'] = $resolve[0]["Service_ID"];
//	$_SESSION['ServiceName'] = $resolve[0]["Service_Name"];
//	$_SESSION['ServiceSlots'] = $resolve[0]['Service_Time']?($resolve[0]["Service_Time"]/120):1;
//	$_SESSION['ServicePrice'] = $Styling->convertToPrice($resolve[0]["Service_Price"]);
//	$_SESSION['Price'] = $resolve[0]["Service_Price"];
//	echo 'success';
//}else if($command == 4){
//	$slot = $_GET["slot"];
//	$day = $_GET["day"];
//	$_SESSION['Day'] = $day;
//	$_SESSION['Slot'] = $slot;
//	echo 'success';
//}

?>