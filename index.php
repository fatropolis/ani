<?php
session_start();
include_once 'includes/dbConn.php';
// if(!isset($_SESSION['instagram'])){
// 	include_once 'defines.php';
// 	include_once 'apps/instagramApp.php';
// }else if(isset($_SESSION['instagram']['time'])){
// 	if((date('U') - $_SESSION['instagram']['time'])/3600 >= 6){
// 		include_once 'defines.php';
// 		include_once 'apps/instagramApp.php';
// 	}
// }
include_once 'classes/productClass.php';
include_once 'classes/stylingClass.php';

$Product = new Product();
$Styling = new Styling();
$featured = $Product->getProducts(2);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="media/Anibere Logos-20.svg">
<title>Anibere</title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/index.css">
	 <script src="js/javaScipt.js" defer></script>

</head>
<body>
<?php include("includes/nav.php")?>
	<div id="Container">
		<div id="banner" class="ace--win">
			<div id="background">
				<div id="container-iFrame" class="ace--Center">
					<video id="toop" class="ace--Center" autoplay muted loop>
						<source src="media/BannerHairFlip.mp4">
					</video>
				</div>
				<div id="backgroundCover" class="ace--Center"></div>
			</div>
			<div id="banner-Welcome" class="banner-Bg-Text ace--Center"><b>|</b>Welcome</div>
			<div id="banner-Akwaaba" class="banner-Bg-Text ace--Center">Akwaaba</div>
			<div id="bannerCon">
				<a href="booking.php" id="baaLink">
					<div id="bAA" class="ace--Button ace--Center">Book An Appointment</div>
				</a>
				<div id="gTL">
					<div id="gtlTitle">Get the look</div>
					<div id="gtlCarousel">
						<div id="gtlCCon">
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/sundayLook.jpg" alt="">
								<div class="gtlDT">Sunday</div>
								<div class="gtlDN">Esi</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/mondayLook.jpg" alt="">
								<div class="gtlDT">Monday</div>
								<div class="gtlDN">Adwoa</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/tuesdayLook.jpg" alt="">
								<div class="gtlDT">Tuesday</div>
								<div class="gtlDN">Abena</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/wednesdayLook.jpg" alt="">
								<div class="gtlDT">Wednesday</div>
								<div class="gtlDN">Ekua</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/thursdayLook.jpg" alt="">
								<div class="gtlDT">Thursday</div>
								<div class="gtlDN">Aba/Ya</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/fridayLook.jpg" alt="">
								<div class="gtlDT">Friday</div>
								<div class="gtlDN">Efua</div>
							</div>
							<div id="mon" class="gtlDays">
								<div class="cover-gtlDays ace--outline"></div>
								<img src="media/saturdayLook.jpg" alt="">
								<div class="gtlDT">Saturday</div>
								<div class="gtlDN">Ama</div>
							</div>
						</div>
					</div>
				</div>
				<div id="banner-Quote" class="ace--CenterHorizontal">
					<div>"beautiful inside and out"</div>
					<div class="treSwatch">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="66.427" height="25" viewBox="0 0 66.427 25">
							<defs>
								<filter id="Ellipse_5" x="41.427" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="-1" dy="-1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur"/>
									<feFlood flood-color="#030303"/>
									<feComposite operator="in" in2="blur"/>
								</filter>
								<filter id="Ellipse_5-2" x="41.427" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="1" dy="1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur-2"/>
									<feFlood flood-opacity="0.31" result="color"/>
									<feComposite operator="out" in="SourceGraphic" in2="blur-2"/>
									<feComposite operator="in" in="color"/>
									<feComposite operator="in" in2="SourceGraphic"/>
								</filter>
								<filter id="Ellipse_6" x="20.62" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="-1" dy="-1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur-3"/>
									<feFlood flood-color="#030303"/>
									<feComposite operator="in" in2="blur-3"/>
								</filter>
								<filter id="Ellipse_6-2" x="20.62" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="1" dy="1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur-4"/>
									<feFlood flood-opacity="0.31" result="color-2"/>
									<feComposite operator="out" in="SourceGraphic" in2="blur-4"/>
									<feComposite operator="in" in="color-2"/>
									<feComposite operator="in" in2="SourceGraphic"/>
								</filter>
								<filter id="Ellipse_7" x="0" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="-1" dy="-1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur-5"/>
									<feFlood flood-color="#030303"/>
									<feComposite operator="in" in2="blur-5"/>
								</filter>
								<filter id="Ellipse_7-2" x="0" y="0" width="25" height="25" filterUnits="userSpaceOnUse">
									<feOffset dx="1" dy="1" input="SourceAlpha"/>
									<feGaussianBlur stdDeviation="1.5" result="blur-6"/>
									<feFlood flood-opacity="0.31" result="color-3"/>
									<feComposite operator="out" in="SourceGraphic" in2="blur-6"/>
									<feComposite operator="in" in="color-3"/>
									<feComposite operator="in" in2="SourceGraphic"/>
								</filter>
							</defs>
							<g id="Logo_3" data-name="Logo 3" transform="translate(-6.5 -70.74)">
								<g data-type="innerShadowGroup">
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_5)">
										<circle id="Ellipse_5-3" data-name="Ellipse 5" cx="7.5" cy="7.5" r="7.5" transform="translate(47.43 6)" fill="#df1c48" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
									</g>
									<circle id="Ellipse_5-4" data-name="Ellipse 5" cx="7.5" cy="7.5" r="7.5" transform="translate(53.927 76.74)" fill="#df1c48"/>
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_5-2)">
										<circle id="Ellipse_5-5" data-name="Ellipse 5" cx="7.5" cy="7.5" r="7.5" transform="translate(47.43 6)" fill="#fff"/>
									</g>
									<circle id="Ellipse_5-6" data-name="Ellipse 5" cx="7.5" cy="7.5" r="7.5" transform="translate(53.927 76.74)" fill="none" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
								</g>
								<g data-type="innerShadowGroup">
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_6)">
										<circle id="Ellipse_6-3" data-name="Ellipse 6" cx="7.5" cy="7.5" r="7.5" transform="translate(26.62 6)" fill="#fff100" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
									</g>
									<circle id="Ellipse_6-4" data-name="Ellipse 6" cx="7.5" cy="7.5" r="7.5" transform="translate(33.12 76.74)" fill="#fff100"/>
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_6-2)">
										<circle id="Ellipse_6-5" data-name="Ellipse 6" cx="7.5" cy="7.5" r="7.5" transform="translate(26.62 6)" fill="#fff"/>
									</g>
									<circle id="Ellipse_6-6" data-name="Ellipse 6" cx="7.5" cy="7.5" r="7.5" transform="translate(33.12 76.74)" fill="none" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
								</g>
								<g data-type="innerShadowGroup">
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_7)">
										<circle id="Ellipse_7-3" data-name="Ellipse 7" cx="7.5" cy="7.5" r="7.5" transform="translate(6 6)" fill="#ec81b3" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
									</g>
									<circle id="Ellipse_7-4" data-name="Ellipse 7" cx="7.5" cy="7.5" r="7.5" transform="translate(12.5 76.74)" fill="#ec81b3"/>
									<g transform="matrix(1, 0, 0, 1, 6.5, 70.74)" filter="url(#Ellipse_7-2)">
										<circle id="Ellipse_7-5" data-name="Ellipse 7" cx="7.5" cy="7.5" r="7.5" transform="translate(6 6)" fill="#fff"/>
									</g>
									<circle id="Ellipse_7-6" data-name="Ellipse 7" cx="7.5" cy="7.5" r="7.5" transform="translate(12.5 76.74)" fill="none" stroke="rgba(35,31,32,0.1)" stroke-miterlimit="10" stroke-width="1"/>
								</g>
							</g>
						</svg>
					</div>
				</div>
			</div>
		</div>
		<div id="body">
			<div id="win2" class="ace--win-1920-w ace--win">
				<div id="container-Shop-Header" class="ace--only-mobile">Shop</div>
				<div class="ace--only-desktop container-Shop-Header">New and limited releases</div>
				<div class="container-Products">
					<products>
						<?php 
						foreach($featured as $x => $y){
							$p = $Styling->product($y);
							echo($p);
						}
						
						?>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
						<product>
							<images></images>
							<category>Product category</category>
							<name>Product Name</name>
							<price>$45</price>
						</product>
					</products>
				</div>
				<div class="ace--only-desktop container-Shop-Header">Visit the shop</div>
				<div id="container-Shop-Categories"> <a href="" id="c-S-1" class="categories-Shop">
					<div class="ace--Center">Wigs</div>
					</a> <a href="" id="c-S-2" class="categories-Shop">
					<div class="ace--Center">Lashes</div>
					</a> <a href="" id="c-S-3" class="categories-Shop">
					<div class="ace--Center">Accessories</div>
					</a> </div>
				<div id="bSC" class="ace--pos-Relative">
					<div id="button-Shop" class="ace--Button ace--Center">Shop →</div>
				</div>
			</div>
			<div id="win3" class="ace--only-desktop ace--win-1920-w ace--win">
				<div class="ace--only-desktop container-Shop-Header">Looks by you</div>
				<div id="instaFeedCon">
				<div id="instaFeed">
<!--					<div id="ifIDis" class="ace--Center"></div>-->
					<a href="https://www.instagram.com/anibere.beauty">
						<div class="ifFirst ace--pos-Relative">
						<div class="ifLogo"></div>
							<div class="ifLink ace--CenterHorizontal">@anibere.beauty</div>
						</div>
					</a>
					<!--?php
					$img = 0;
					while($img < 8){
						$link = $_SESSION['instagram']['posts'][$img]['permalink'];
						$type = $_SESSION['instagram']['posts'][$img]['media_type'];
						$url = $_SESSION['instagram']['posts'][$img]['media_url'];
						if($type == 'VIDEO'){
							echo "
								<div class=\"ifPost ace--pos-Relative ace--outline\" onclick='ScrollTo(this)'>
									<div class=\"ifImg\"><video loop> <source src='$url' type=\"video/mp4\"></video></div>
									<div class=\"ifFore ace--Center\" onClick=\"this.classList.toggle('ifFore-active')\">
										<div class=\"ifFore-info ace--Center\">
											<a href='$link' target='_blank'>— Go to Post —</a>
										</div>
									</div>
								</div>";
						}else{
							echo "
								<div class=\"ifPost ace--pos-Relative ace--outline\" onclick='ScrollTo(this)'>
									<div class=\"ifImg\"><img src='$url'></div>
									<div class=\"ifFore ace--Center\" onClick=\"this.classList.toggle('ifFore-active')\">
										<div class=\"ifFore-info ace--Center\">
											<a href='$link' target='_blank'>— Go to Post —</a>
										</div>
									</div>
								</div>";
						}
						$img++;
					}
			echo '</div></div>';
					if(count($_SESSION['instagram']['posts']) > 8)
						echo "<div id=\"ifVM\" onClick=\"loadMore()\">(load more)</div>";
					?-->
				
		</div>
		</div>
		<prefooter>
			<prefootershadow>
				<clip></clip>
			</prefootershadow>
		</prefooter>
	</div>
	<footer><div class="ace--Center" style="font-size: 200px; font-weight: 900;">FOOTER</div></footer>
</body>
</html>