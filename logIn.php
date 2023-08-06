<?php
session_start();
isset($_SESSION['User']['ID'])?header('location: index.php'):'';
// (A) CHECK IF "MOBILE" EXISTS IN USER AGENT
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/login.css">
	 <script src="https://accounts.google.com/gsi/client" async defer></script>
	 <script src="js/javaScipt.js" defer></script>

</head>

<body>
<?php include("includes/nav.php")?>
<div id="Container">
		<!--div id="background">
			<div id="container-iFrame" class="ace--Center">
				<video id="toop" class="ace--Center" autoplay muted loop>
					<source src="media/BannerHairFlip.mp4">
				</video>
			</div>
			<div id="backgroundCover" class="ace--Center"></div>
		</div-->
	<!--?php
	echo $isMob?'
		<div id="container-img" class="ace--Center">
			<img src="imgs/Anibere Logos-20.svg" alt="">
		</div>
		':'';
	?-->
	<form id="container-Login" class="ace--Center ace--dis-Flex-Column" action="apps/loginApp.php" method="post">
		<div id="header-Login">Log In!</div>
		<div id="body-Login">Please enter your email and password</div>
		<ace--input id="container-Username" class="container-input" input-id="input-Username"  name="uName" type="email">Email</ace--input>
		<ace--input id="container-Password" class="container-input" input-id="input-Pass"  name="psw" type="password">Password</ace--input>
		<p id="fPass"><a href="">Forgot Password</a></p>
		<button id="submit" type="submit" class="ace--Button">Login</button>
		<div id="cAcc">
			<p class="ace--dis-InlineBlock">Don't have an account?</p>
			<a href="" class="ace--dis-InlineBlock">Create one</a>
		</div>
	</form>
	<div id="treStreak" class="ace--Center">
		<div id="treStreak-1" class="treStreak"></div>
		<div id="treStreak-2" class="treStreak"></div>
		<div id="treStreak-3" class="treStreak"></div>
	</div>
</div>
</body>
</html>