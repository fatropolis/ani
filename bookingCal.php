<?php
session_start();
date_default_timezone_set("America/Chicago");

include_once("includes/dbConn.php");
include_once("classes/calendarClass.php");

if (!isset($_SESSION['ServiceName'])){
	header("HTTP/1.1 301 Moved Permanently");
	header('location: booking.php');
}

$Cal = new Calendar();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/bookCal.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script type="text/javascript" src="js/booking.js" defer></script>
	 <script src="js/javaScipt.js" defer></script>
</head>
<body>
	<?php 
	if(!isset($_SESSION['User']['ID'])){
		require_once('includes/sUtoCont.php');
		return;
	}?>
	<?php include("includes/nav.php");?>
	<div id="Container">
		<div id="container-App" class="ace--dis-Flex ace--Center">
			<div id="cal">
				<?php
				$Cal->aceCal(0,0);
				?>
			</div>
			<div id="sideBar" class="ace--dis-Flex-Column">
				<div id="mobile-ArrBck" onClick="remSideBar()">&#10094;</div>
				<div id="container-Service" class="ace--dis-Flex-Column">
					<div id="service-Name">
						<div id="text-Service-Name">
							<?php
							echo $_SESSION['ServiceName'];
							?>
						</div>
					</div>
					<div id="service-Price">
						<div id="text-Service-Price">
							<?php
							echo '$'.$_SESSION['ServicePrice'];
							?>
						</div>
					</div>
				</div>
				<div id="container-Time" class="ace--dis-Flex-Column">
					<div id="day">No Day Chosen</div>
					<div id="container-Slots" class="ace--dis-Flex-Column">
						<div class="container-Slot slot-Invalid">
							<div class="slot-Time ace--Center">9am to 11pm</div>
						</div>
						<div class="container-Slot slot-Invalid">
							<div class="slot-Time ace--Center">11am to 1pm</div>
						</div>
						<div class="container-Slot slot-Invalid">
							<div class="slot-Time ace--Center">1pm to 3pm</div>
						</div>
						<div class="container-Slot slot-Invalid">
							<div class="slot-Time ace--Center">3pm to 5pm</div>
						</div>
						<div class="container-Slot slot-Invalid">
							<div class="slot-Time ace--Center">5pm to 7pm</div>
						</div>
						<div id="book">
							<div class="slot-Time ace--Center">Book</div>
						</div>
					</div>
					<div id="glossary" class="ace--dis-Flex-Column">
						<div id="container-Glossary-Active" class="ace--dis-Flex-Row container-Glossary">
							<div id="glossary-Active"></div>
							<div id="text-Glossary-Active">Available time slots</div>
						</div>
						<div id="container-Glossary-Inactive" class="ace--dis-Flex-Row container-Glossary">
							<div id="glossary-Inactive"></div>
							<div id="text-Glossary-Inactive">Unavailable time slots</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="mobile-BgBlur" onClick="remSideBar()"></div>
		</div>
	</div>
</body>
</html>