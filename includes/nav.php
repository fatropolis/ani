<nav id="nav">
<?php
$isMobCh = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
$isMob = isset($isMobCh)&&$isMobCh?1:0;
$loggedIn = isset($_SESSION['User']['ID'])?1:0;
	
	echo isset($isMob)&&$isMob?'
	<a href="index.php" id="nav-Logo-2">
		<div class="ace--CenterVertical nav-Logo">
			<svg xmlns="http://www.w3.org/2000/svg" width="117.25" height="16" viewBox="0 0 117.25 16">
				<g id="Logo_13" data-name="Logo 13" transform="translate(-59.5 -79.5)">
					<path id="A" d="M67.5,95a1.875,1.875,0,0,0,0-3.75,3.75,3.75,0,1,1,3.75-3.75v5.625a1.875,1.875,0,0,0,3.75,0V87.5A7.5,7.5,0,1,0,67.5,95Z" fill="#ec81b3" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="A-2" data-name="A" d="M187.5,80a1.875,1.875,0,0,0,0,3.75,3.75,3.75,0,1,1-3.75,3.75V81.875a1.875,1.875,0,0,0-3.75,0V87.5a7.5,7.5,0,1,0,7.5-7.5Z" transform="translate(-75)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="Path_55" data-name="Path 55" d="M125,87.5a7.5,7.5,0,0,0-15,0v5.625a1.875,1.875,0,0,0,3.75,0V87.5a3.75,3.75,0,0,1,7.5,0v5.625a1.875,1.875,0,0,0,3.75,0Z" transform="translate(-31.25)" fill="#fff100" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="Path_56" data-name="Path 56" d="M160,81.875a1.875,1.875,0,0,1,3.75,0v11.25a1.875,1.875,0,0,1-3.75,0Z" transform="translate(-62.5)" fill="#df1c48" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="Path_57" data-name="Path 57" d="M245,87.5a7.5,7.5,0,1,0-7.5,7.5h1.875a1.875,1.875,0,0,0,0-3.75H237.5a3.75,3.75,0,1,1,3.247-5.625H237.5a1.875,1.875,0,0,0,0,3.75h5.625A1.875,1.875,0,0,0,245,87.5Z" transform="translate(-106.25)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="Path_58" data-name="Path 58" d="M345,87.5a7.5,7.5,0,1,0-7.5,7.5h1.875a1.875,1.875,0,0,0,0-3.75H337.5a3.75,3.75,0,1,1,3.247-5.625H337.5a1.875,1.875,0,0,0,0,3.75h5.625A1.875,1.875,0,0,0,345,87.5Z" transform="translate(-168.75)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
					<path id="Path_59" data-name="Path 59" d="M283.75,93.125a1.875,1.875,0,0,1-3.75,0V87.5a7.5,7.5,0,0,1,15,0,1.875,1.875,0,0,1-3.75,0,3.75,3.75,0,0,0-7.5,0Z" transform="translate(-137.5)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
				</g>
			</svg>
		</div>
	</a>
	':'';
?>
	<div id="nav-Inner">
		<div id="nav-DropDown" class="ace--CenterHorizontal"><a href="apps/logoutApp.php">Sign Out</a></div>
		<div id="nav-Inner-Bg" class="ace--pos-Relative navHide">
			<div id="nav-Container-Link" class="ace--dis-Flex ace--Center">
				<a href="index.php"><div class="nav-Link">Home</div></a>
				<a href="booking.php"><div class="nav-Link">Book</div></a>
				<a href="booking.php"><div class="nav-Link">Store</div></a>
				<a href="booking.php"><div class="nav-Link">About</div></a>
				<?php 
				if(isset($_SESSION['ServiceID']) && !isset($_SESSION['Slot']))
					echo('<a href="bookingCal.php" style="color:green;"><div class="nav-Link">(Finish Booking)</div></a>');
				else if(isset($_SESSION['ServiceID']) && isset($_SESSION['Slot']))
					echo('<a href="payment.php" style="color:green;"><div class="nav-Link">(Finish Booking)</div></a>');
				?>
			</div>
			<a href="index.php">
				<div id="nav-Logo-1" class="ace--CenterVertical nav-Logo">
					<svg xmlns="http://www.w3.org/2000/svg" width="117.25" height="16" viewBox="0 0 117.25 16">
						<g id="Logo_14" data-name="Logo 14" transform="translate(-59.5 -79.5)">
							<path id="A" d="M67.5,95a1.875,1.875,0,0,0,0-3.75,3.75,3.75,0,1,1,3.75-3.75v5.625a1.875,1.875,0,0,0,3.75,0V87.5A7.5,7.5,0,1,0,67.5,95Z" fill="#ec81b3" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="A-2" data-name="A" d="M187.5,80a1.875,1.875,0,0,0,0,3.75,3.75,3.75,0,1,1-3.75,3.75V81.875a1.875,1.875,0,0,0-3.75,0V87.5a7.5,7.5,0,1,0,7.5-7.5Z" transform="translate(-75)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="Path_60" data-name="Path 60" d="M125,87.5a7.5,7.5,0,0,0-15,0v5.625a1.875,1.875,0,0,0,3.75,0V87.5a3.75,3.75,0,0,1,7.5,0v5.625a1.875,1.875,0,0,0,3.75,0Z" transform="translate(-31.25)" fill="#fff100" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="Path_61" data-name="Path 61" d="M160,81.875a1.875,1.875,0,0,1,3.75,0v11.25a1.875,1.875,0,0,1-3.75,0Z" transform="translate(-62.5)" fill="#df1c48" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="Path_62" data-name="Path 62" d="M245,87.5a7.5,7.5,0,1,0-7.5,7.5h1.875a1.875,1.875,0,0,0,0-3.75H237.5a3.75,3.75,0,1,1,3.247-5.625H237.5a1.875,1.875,0,0,0,0,3.75h5.625A1.875,1.875,0,0,0,245,87.5Z" transform="translate(-106.25)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="Path_63" data-name="Path 63" d="M345,87.5a7.5,7.5,0,1,0-7.5,7.5h1.875a1.875,1.875,0,0,0,0-3.75H337.5a3.75,3.75,0,1,1,3.247-5.625H337.5a1.875,1.875,0,0,0,0,3.75h5.625A1.875,1.875,0,0,0,345,87.5Z" transform="translate(-168.75)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
							<path id="Path_64" data-name="Path 64" d="M283.75,93.125a1.875,1.875,0,0,1-3.75,0V87.5a7.5,7.5,0,0,1,15,0,1.875,1.875,0,0,1-3.75,0,3.75,3.75,0,0,0-7.5,0Z" transform="translate(-137.5)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						</g>
					</svg>
				</div>
			</a>
			<div id="nav-Logo-D" class="ace--CenterVertical nav-Logo">
				<svg xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 201.634 61.002">
					<g id="Layer_21" data-name="Layer 21" transform="translate(-59.898 -23.432)">
						<path id="Path_14" data-name="Path 14" d="M491,148.373a2.956,2.956,0,1,0,5.913,0v-2.215a.741.741,0,1,0-1.478,0v2.215a1.478,1.478,0,1,1-2.956,0v-2.219a.741.741,0,0,0-1.478,0Z" transform="translate(-261.109 -73.563)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="e" d="M460.913,148.462a2.956,2.956,0,1,0-2.956,2.96h.7a.788.788,0,0,0,.788-.7.741.741,0,0,0-.737-.788h-.678a1.518,1.518,0,0,1-1.541-1.431,1.478,1.478,0,0,1,2.736-.824.024.024,0,0,1-.02.035h-1.183a.788.788,0,0,0-.788.7.737.737,0,0,0,.737.788h2.219A.741.741,0,0,0,460.913,148.462Z" transform="translate(-239.299 -73.653)" fill="#fff" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
						<path id="Path_15" data-name="Path 15" d="M475.962,145.5a2.956,2.956,0,1,0,1.545,5.479.737.737,0,0,0,1.411-.307v-2.215A2.956,2.956,0,0,0,475.962,145.5Zm0,4.435a1.478,1.478,0,1,1,1.478-1.478A1.478,1.478,0,0,1,475.962,149.935Z" transform="translate(-250.209 -73.646)" fill="#fff" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
						<path id="Path_16" data-name="Path 16" d="M439.953,140.873a2.968,2.968,0,0,0-1.478.394v-2.61a.741.741,0,1,0-1.478,0v5.172a2.956,2.956,0,1,0,2.956-2.956Zm0,4.435a1.478,1.478,0,1,1,1.478-1.478A1.478,1.478,0,0,1,439.953,145.308Z" transform="translate(-228.391 -69.02)" fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_17" data-name="Path 17" d="M532.913,148.456v-2.188a.761.761,0,0,0-.717-.769.741.741,0,0,0-.761.741v2.168a1.514,1.514,0,0,1-1.451,1.525,1.478,1.478,0,0,1-1.506-1.478v-2.188a.761.761,0,0,0-.717-.769.741.741,0,0,0-.761.741v2.152a3,3,0,0,0,2.9,3.019,2.941,2.941,0,0,0,1.537-.394V153.6a.761.761,0,0,0,.717.769.737.737,0,0,0,.761-.737Z" transform="translate(-282.918 -73.646)" fill="#fff" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
						<path id="Path_18" data-name="Path 18" d="M510.475,143.83a1.478,1.478,0,1,0,2.956,0,.741.741,0,1,1,1.478,0,2.956,2.956,0,0,1-5.913,0v-5.172a.741.741,0,1,1,1.478,0v2.215h1.478a.741.741,0,0,1,0,1.478h-1.478v1.478" transform="translate(-272.01 -69.02)" fill="#fff" stroke="#000" stroke-linejoin="round" stroke-width="1"/>
						<path id="A" d="M267.884,105.767a1.971,1.971,0,0,0,0-3.942,3.942,3.942,0,1,1,3.942-3.942V103.8a1.971,1.971,0,0,0,3.942,0V97.884a7.884,7.884,0,1,0-7.884,7.884Z" transform="translate(-121.164 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="A-2" data-name="A" d="M387.884,90a1.971,1.971,0,1,0,0,3.942,3.942,3.942,0,1,1-3.942,3.942V91.971a1.971,1.971,0,1,0-3.942,0v5.913A7.884,7.884,0,1,0,387.884,90Z" transform="translate(-193.863 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_19" data-name="Path 19" d="M325.767,97.884a7.884,7.884,0,1,0-15.767,0V103.8a1.971,1.971,0,0,0,3.942,0V97.884a3.942,3.942,0,1,1,7.884,0V103.8a1.971,1.971,0,0,0,3.942,0Z" transform="translate(-151.455 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_20" data-name="Path 20" d="M360,91.971a1.971,1.971,0,1,1,3.942,0V103.8a1.971,1.971,0,1,1-3.942,0Z" transform="translate(-181.746 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_21" data-name="Path 21" d="M445.767,97.884a7.884,7.884,0,1,0-7.884,7.884h1.971a1.971,1.971,0,0,0,0-3.942h-1.971a3.942,3.942,0,1,1,3.414-5.913h-3.414a1.971,1.971,0,0,0,0,3.942H443.8A1.971,1.971,0,0,0,445.767,97.884Z" transform="translate(-224.154 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_22" data-name="Path 22" d="M545.767,97.884a7.884,7.884,0,1,0-7.884,7.884h1.971a1.971,1.971,0,0,0,0-3.942h-1.971a3.942,3.942,0,1,1,3.414-5.913h-3.414a1.971,1.971,0,0,0,0,3.942H543.8A1.971,1.971,0,0,0,545.767,97.884Z" transform="translate(-284.736 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_23" data-name="Path 23" d="M483.942,103.8a1.971,1.971,0,0,1-3.942,0V97.884a7.884,7.884,0,0,1,15.767,0,1.971,1.971,0,0,1-3.942,0,3.942,3.942,0,1,0-7.884,0Z" transform="translate(-254.445 -40.023)" stroke="#000" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_24" data-name="Path 24" d="M115,119.04c8.4-.335,20.781-2.223,26.686-4.052a47.533,47.533,0,0,0,10.9-4.612,19.224,19.224,0,0,0,8.893-10.45c1.766-5.014.875-10.592-3.827-13.059a9.426,9.426,0,1,0-9.1,16.508l.788.457a1.116,1.116,0,0,1,.3,1.652h0c-.347.485-5.479,4.833-13.355,8.238C129.73,116.561,121.508,117.877,115,119.04Z" transform="translate(-33.32 -37.415)" fill="#df1c48" stroke="#231f20" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_25" data-name="Path 25" d="M60,83.935c9.681-2.018,18-4.833,26.9-13.154,5.814-5.432,9.161-13.359,8.329-18.471h0c-.15-.922-.808-1.1-1.971-.741a13.505,13.505,0,0,1-6.7.678A14.19,14.19,0,1,1,97.053,27.232h0c5.519,4.222,8.361,11.337,7.178,24.045-.619,6.654-4.308,15.925-11.065,21.68C82.827,81.732,69.61,83.482,60,83.935Z" fill="#fff100" stroke="#231f20" stroke-miterlimit="10" stroke-width="1"/>
						<path id="Path_26" data-name="Path 26" d="M66.1,129.933c6.571-3.153,9.244-7.627,9.91-8.916a1.324,1.324,0,0,0-1.025-1.92,7.1,7.1,0,0,1-6.212-6.126,7.261,7.261,0,0,1,5.775-7.911,7.04,7.04,0,0,1,8.313,6.725v1.049C82.529,120.193,77.933,125.625,66.1,129.933Z" transform="translate(-3.696 -49.077)" fill="#ec81b3" stroke="#231f20" stroke-miterlimit="10" stroke-width="1"/>
					</g>
				</svg>
			</div>
			
	<?php
			echo $loggedIn?'
						<div class="ace--CenterVertical" style="
								width: max-content;
								right: 100px;
								">
							<a href="apps/logoutApp.php" class="" style="
									width: auto;
									right: 50px;
									bottom: 50px;
									padding: 5px 30px 5px 10px;
									font-weight: 900;
									font-size: 20px;
									">
								Log Out
							</a>
						</div>
			'
				:
					($isMob?'
						<div class="ace--CenterHorizontal" style="
								width: max-content;
								bottom: 10%;
								">
							<a onClick="getElementById(\'bg-SignUp\').classList.toggle(\'ace--dis-None\')" style="
									margin-right: 10px;
									">
								Join Us!
							</a>
							<a href="logIn.php" class="ace--Button" style="
									width: auto;
									right: 50px;
									bottom: 50px;
									padding: 5px 30px;
									">
								Log In
							</a>
						</div>
						':'
						<div class="ace--CenterVertical" style="
								width: max-content;
								right: 100px;
								">
							<b onClick="getElementById(\'bg-SignUp\').classList.toggle(\'ace--dis-None\')" style="
									font-weight: 900;
									">
								Join Us!
							</b>
							<a href="logIn.php" class="" style="
									width: auto;
									right: 50px;
									bottom: 50px;
									padding: 5px 30px 5px 10px;
									color: hsla(332,74%,72%,1.00);
									text-shadow: .5px .5px 1px black;
									font-weight: 900;
									font-size: 20px;
									">
								Log In
							</a>
						</div>
						');
	?>
		</div>
	</div>
	<div id="container-Hamburger" class="ace--CenterVertical">
		<div id="hamburger" onClick="this.classList.toggle('hamburger-Active');getElementById('nav-Inner-Bg').classList.toggle('navHide');getElementById('nav').classList.toggle('navHiden');">
			<div id="hamburger-1"></div>
			<div id="hamburger-2"></div>
			<div id="hamburger-3"></div>
		</div>
	</div>
</nav>
<?php
echo $loggedIn?'':
'<div id="bg-SignUp" class="ace--Center ace--dis-None" onClick="this.classList.toggle(\'ace--dis-None\')">
	<div id="container-outter-SignUp" class="ace--CenterRel" onclick="event.stopPropagation();">
	<form action="../apps/signUpApp.php" id="container-SignUp" class="ace--dis-Flex-Column" method="post">
		<div id="header-SignUp">Join Us!</div>
		<div id="body-SignUp">Create your account</div>
		<div class="container-dual-Input">
			<ace--input id="container-FName" class="container-input dual-Input" input-id="input-FName" name="fName" type="text">First name</ace--input>
			<ace--input id="container-LName" class="container-input dual-Input" input-id="input-LName" name="lName" type="text">Last name</ace--input>
		</div>
		<ace--input id="container-Email" class="container-input" input-id="input-Email" name="email" type="text">Email</ace--input>
		<div class="container-dual-Input">
			<ace--input id="container-NPassword" class="container-input dual-Input" input-id="input-NPass" name="npsw" type="password">Password</ace--input>
			<ace--input id="container-LName" class="container-input dual-Input" input-id="input-CPass" name="cpsw" type="password">Confirm</ace--input>
		</div>
		<p id="fPass"><a href="">Forgot Password</a></p>
		<button id="cSubmit" type="submit" class="ace--Button">Continue</button>
		<div id="cAcc">
			<p class="ace--dis-InlineBlock">Already have an account?</p>
			<a href="" class="ace--dis-InlineBlock">Sign in instead</a>
		</div>
	</form>
	</div>
</div>';
?>