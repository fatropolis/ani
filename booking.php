<?php
session_start();


include_once("includes/dbConn.php");
include_once("classes/serviceClass.php");
$Service = new Service();
if (isset($_SESSION['ServiceID']) && isset($_SESSION['User']['ID'])){
		$service = $_SESSION['ServiceID'];
		isset($_SESSION['Slot'])?$slot = $_SESSION['Slot']:'';
		isset($_SESSION['Day'])?$day = $_SESSION['Day']:'';
		$user = $_SESSION['User']['ID'];
		$slots = $_SESSION['ServiceSlots'];
		$Service->removeAppointment($service, $slot, $day, $user, $slots);
}
	


try{
	$a = $Service->getCat(null,null,1);
}
catch (Exception $e) {
	echo $e->getMessage();
	die();
}

?>



<!DOCTYPE html>
<html>
<head>
	
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/bookings.css">
	<script type="text/javascript" src="js/booking.js" defer></script>
	 <script src="js/javaScipt.js" defer></script>
<title>Page Title</title>
</head>
	
	
	
	
<body>
	
	<?php include("includes/nav.php")?>
	
	
	
	
	
	
<div id="Container">
		
		
	<div id="win1" class="ace--win-1920">
		
		<div id="container-App" class="ace--dis-Flex ace--Center">
			<div id="container-Categories" class="ace--dis-Flex-Column ace--pos-Relative">
				
				<?php
				if(isset($a))
					foreach($a as $x => $y){
	//					echo(
	//						'<ace--cat class="category ace--pos-Relative" catID="'.$y["Cat_ID"].'" onClick="getCont(this,\'catFunc\',\'d='.$y["Cat_ID"].'\')">
	//							<div class="category-Content ace--Center">'.$y["Cat_Con"].'</div>
	//						</ace--cat>'
	//						);
						echo(
							'<ace--cat class="category ace--pos-Relative" catID="'.$y["Category_ID"].'" onClick="catFunc('.$y["Category_ID"].')">
								<div class="category-Content ace--Center">'.$y["Category_Name"].'</div>
							</ace--cat>'
							);
					}else{
						'<ace--cat class="category ace--pos-Relative"">
								<div class="category-Content ace--Center">Empty</div>
							</ace--cat>';
					}
				
				?>
			</div>
			<div id="container-Styles">
				<div id="container-Styles-Inner">
				</div>
				<div id="container-ScrollShadow">
					<div id="scrollShadow" class="ace--CenterHorizontal"></div>
				</div>
			</div>
			<div id="container-Style" class="ace--pos-Relative">
			</div>
		</div>
		
	</div>
		
		
</div>
	
</body>
	
	
	
	
	
	
</html>