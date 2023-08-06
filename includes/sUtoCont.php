
<div id="bg-SignUp" class="ace--Center">
	<div id="container-outter-SignUp" class="ace--CenterRel" onclick="event.stopPropagation();">
	<form action="../apps/signUpApp.php" id="container-SignUp" method="post">
		<div id="header-SignUp">Join Us!</div>
		<div id="body-SignUp">Create an account to continue</div>
		<div class="container-dual-Input">
			<ace--input id="container-FName" class="container-input dual-Input" input-id="input-FName" name="fName" type="text">First name</ace--input>
			<ace--input id="container-LName" class="container-input dual-Input" input-id="input-LName" name="lName" type="text">Last name</ace--input>
		</div>
		<ace--input id="container-Email" class="container-input" input-id="input-Email" name="email" type="text">Email</ace--input>
		<div class="container-dual-Input">
			<ace--input id="container-NPassword" class="container-input dual-Input" input-id="input-NPass" name="npsw" type="password">Password</ace--input>
			<ace--input id="container-LName" class="container-input dual-Input" input-id="input-CPass" name="cpsw" type="password">Confirm</ace--input>
		</div>
		<a id="fPass" href="">Forgot Password</a>
		<button id="cSubmit" type="submit" class="ace--Button">Continue</button>
		<div id="cAcc">
			<p class="ace--dis-InlineBlock">Already have an account?</p>
			<a href="../logIn.php" class="ace--dis-InlineBlock">Sign in instead</a>
		</div>
	</form>
	</div>
</div>