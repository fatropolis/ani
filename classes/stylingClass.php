<?php
class Styling{
	
	
	
	
	
	
	
	
public function convertToPrice($a){
	$b = $a/100;
	
	if(is_float($b)){
		return (number_format($b,2));
	}
	return($b);
}
	
public function styles($a,$c = ['https://storage.googleapis.com/publicmedia/Bonnet.png','https://storage.googleapis.com/publicmedia/Bonnet.png']){
	$b = $this->convertToPrice($a["Service_Price"]);
	if(!isset($c[0])){
		$c[0] = 'https://storage.googleapis.com/publicmedia/Bonnet.png';
	}
	if(!isset($c[1])){
		$c[1] = 'https://storage.googleapis.com/publicmedia/Bonnet.png';
	}
echo('<div class="style ace--dis-Flex" styleid="'.$a["Service_ID"].'" onClick="stylesFunc('.$a["Service_ID"].')">
	<div class="container-Style-Left ace--dis-Flex-Column">
		<div class="style-Name">'.$a["Service_Name"].'</div>
		<div class="style-Desc">'.$a["QDesc_Con"].'</div>
		<div class="style-Desc">'.$a["FDesc_Con"].'</div>
		<div class="style-Cost">$'.$b.'</div>
		<div class="style-Time">('.$a["Service_Time"].' minutes)</div>
	</div>
	<div class="container-Style-Right ace--dis-Flex ace--pos-Relative">
		<div class="style-Image style-Image-First ace--CenterVerticalRel">
			<img class="ace--CenterRel" src="'.$c[0].'" alt="">
		</div>
		<div class="style-Image style-Image-Second ace--CenterVerticalRel">
			<img class="ace--CenterRel" src="'.$c[1].'" alt="">
		</div>
	</div>
</div>');
}
public function style($a){
	$image = $a['Images'][0]? $a['Images'][0]: 'https://storage.googleapis.com/publicmedia/Bonnet.png';
echo('<div id="container-Image" class="ace--Center"><img class="ace--CenterRel" src="'.$image.'" alt=""></div>
		<div id="button-Book" class="ace--CenterHorizontal" onClick="bookFunc('.$a["Service_ID"].')">Book</div>');
	
}
	
public function product($a) {
	if($a['Images']){
		$p = pathinfo($a['Images'], PATHINFO_EXTENSION);
		$image = substr_replace($a['Images'][0],'_400x400.webp',array_search($p));
	}
	$name = $a['Product_Name']?$a['Product_Name']:'';
	$price = $a['Product_SalePrice']?"<be class=\"cTP\">".($a['Product_Price']/100)."</be><be>".
		($a['Product_SalePrice']/100)."</be>":"<be>".($a['Product_Price']/100)."</be>";
	return(
		"<product>
			<images><img src='$image'></images>
			<category>Product category</category>
			<name>$name</name>
			<price>$price</price>
		</product>"
	);
}

	
	
	
	
	
	
	
	
	
	
	
	
}
?>