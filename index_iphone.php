<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Etisalat Nigeria | iPhone 6</title>

<link rel="shortcut icon" href="images/favicon.ico" />
<link href="./resources/style.css" rel="stylesheet" type="text/css">
<link href="./resources/other.css" rel="stylesheet" type="text/css">
<link href="./resources/stylesheet.css" rel="stylesheet" type="text/css" media="screen">
<script language="javascript" src="./resources/jquery-1.7.2.min.js"></script>
<script src="./resources/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="css/bjqs.css">
<script src="js/bjqs-1.3.min.js"></script>

<script language="javascript">

function removesize()
{
	document.getElementById( '128GB').style.display = 'none';
}

function showsize()
{
	document.getElementById( '128GB').style.display = 'block';
}

function choosehandset(var1,var2)
{

	document.getElementById( 'iphone0').style.display = 'none';
	
	for(var i=1; i<4; i++)
	{
		if(i==var1)
		{
			document.getElementById( 'iphone'+i ).style.display = 'block';
		}
		else
		{
			document.getElementById( 'iphone'+i ).style.display = 'none';
		}
	}
}

$(".model_one").live("click",function(){
	var id=$(this).attr("id");
	$("#model").val(id);
	$('.model_one').css("box-shadow","0 0 0px 0px #719e19");
	$('.model_one').css("border","#999999 solid 2px");
	$(this).css("border","#719e19 solid 2px");
	$(this).css("box-shadow","0 0 4px 2px #719e19");
	$("#choosefinish").hide("slow");
	return false;
});

$(".color_one").live("click",function(){
	var id=$(this).attr("id");
	$("#finish").val(id);
	$('.color_one').css("box-shadow","0 0 0px 0px #719e19");
	$('.color_one').css("border","#999999 solid 2px");
	$(this).css("border","#719e19 solid 2px");
	$(this).css("box-shadow","0 0 4px 2px #719e19");
	$("#choosestorage").hide("slow");
	return false;
});
$(".storage_one").live("click",function(){
	var id=$(this).attr("id");
	$("#storage").val(id);
	$('.storage_one').css("box-shadow","0 0 0px 0px #719e19");
	$('.storage_one').css("border","#999999 solid 2px");
	$(this).css("border","#719e19 solid 2px");
	$(this).css("box-shadow","0 0 4px 2px #719e19");
	$("#fillform").hide("slow");
	return false;
});


function slide(){
	$("#second").effect('slide', { direction: 'down', mode: 'show' }, 2000);
    $("#third").effect('slide', { direction: 'down', mode: 'show' }, 2000);
}



</script>
<style>
#second
{
display:none;
}
#third
{
display:none;
}
#forth
{
display:none;
}
.wraptools
{
float:left;
height:250px;
}

.booked_message {
    float: left;
    font-family: etisalat, opensens_semibold;
    height: auto;
    margin-top: 25px;
    text-align: center;
    width: 1000px;
}

</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41419539-5', 'auto');
  ga('send', 'pageview');

</script>

</head>

<?php

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(Isset($_POST['cboshop']))
	$cboshop = $_POST['cboshop']; else $cboshop = "";


?>

<body onload="return slide();">
<div class="main">
<div class="header">
<div class="header_inner">
<div style="margin-left:10px;" class="main_logo"><a href="http://preorder.etisalat.com.ng/index.php"><img src="./resources/logo.png" /></a></div><!-- main_logo close -->
</div><!-- header_inner close -->
</div><!-- header close -->



<div id="second">
<form id="target" method="post" action="checkout.php" onsubmit='return formValidator()'>

<div style="padding-bottom:50px;" class="content">
	<div class="content_inner">
	<div class="cart_options">
	
    <div class="cart_options_image" id="iphone0" >
        <div id="banner-fade">
            <ul class="bjqs">
              <li><img src="resources/iphones.png" /></li>
              <li><img src="resources/iphones1.png" /></li>
            </ul>
        </div>
    </div>
    <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
				
				width:450,
				height:650,
				
				// animation values
				animtype : 'fade', // accepts 'fade' or 'slide'
				animduration : 1500, // how fast the animation are
				animspeed : 10000, // the delay between each slide
				automatic : true, // automatic
				
				// control and marker configuration
				showcontrols : false, // show next and prev controls
				centercontrols : false, // center controls verically
				showmarkers : false, // Show individual slide markers
				centermarkers : false, // Center markers horizontally
				
				// interaction values
				keyboardnav : true, // enable keyboard navigation
				hoverpause : true, // pause the slider on hover
				
				// presentational options
				usecaptions : false, // show captions for images using the image title tag
				randomstart : false, // start slider at random slide
				responsive : false // enable responsive capabilities (beta)
          });

        });
      </script>
      
     
	<div class="cart_options_image" id="iphone1" style="display:none; margin-top:60px;"><img src="./resources/iphone_silver.png" /></div><!-- cart_options_image close -->
	<div class="cart_options_image" id="iphone2" style="display:none; margin-top:60px;"><img src="./resources/iphone_gold.png" /></div><!-- cart_options_image close -->
	<div class="cart_options_image" id="iphone3" style="display:none; margin-top:60px;"><img src="./resources/iphone_gray.png" /></div><!-- cart_options_image close -->
    
    
	<div class="cart_options_details">
	<div class="cart_options_details_phone_name"><img src="./resources/iphone_name.png" /></div><!-- cart_options_details_phone_name close -->
	
	<div class="cart_options_title">1. Select a model:</div>
	<div class="models">
		<a href="http://preorder.etisalat.com.ng/#" onclick="return showsize();"><div id="iphone6" class="model_one"><span class="model_one_name">iPhone 6</span> <br/>4.7-inch display<br/>from <span style="color:red">₦118,800</span></div></a><!-- model_one close -->
		<a href="http://preorder.etisalat.com.ng/#" onclick="return removesize();"><div id="iphone6plus" class="model_one" style="margin-left: 20px; box-shadow: 0px 0px 0px 0px rgb(0, 0, 0); border: 1px solid rgb(153, 153, 153);"><span class="model_one_name">iPhone 6 Plus</span><br/>5.5-inch display<br/>from <span style="color:red">₦136,800</span></div></a><!-- model_one close -->
	</div>
	
	<div id="choosefinish" style="float: left; position: absolute; width: 499px; height: 151px; margin-top: 282px; background-color: rgb(255, 255, 255); opacity: 0.2;"> </div>
	<div class="cart_options_title">2. Select a color:</div><!-- cart_options_title close -->
	<div class="models">
		<a href="http://preorder.etisalat.com.ng/#" onclick="return choosehandset(1,0);"><div class="color_one" id="silver"><img src="./resources/silver.jpg" /></div></a><!-- model_one close -->
		<a href="http://preorder.etisalat.com.ng/#" onclick="return choosehandset(2,0);"><div style="margin-left:20px;" class="color_one" id="gold"><img src="./resources/gold.jpg" /></div></a><!-- model_one close -->
		<a href="http://preorder.etisalat.com.ng/#" onclick="return choosehandset(3,0);"><div style="margin-left:20px;" class="color_one" id="gray"><img src="./resources/gray.jpg" /></div></a><!-- model_one close -->
	</div><!-- models close -->
	
	<div id="choosestorage" style="float: left; position: absolute; width: 499px; height: 151px; margin-top: 440px; background-color: rgb(255, 255, 255); opacity: 0.2;"> </div>
	<div class="cart_options_title">3. Select storage size:</div>
	<div class="models">
		<a href="http://preorder.etisalat.com.ng/#"><div id="16GB" class="storage_one" >&nbsp; <br/>16 GB</div></a><!-- model_one close -->
		<a href="http://preorder.etisalat.com.ng/#"><div id="64GB" class="storage_one" style="margin-left:20px;">&nbsp;<br/>64 GB</div></a><!-- model_one close -->
		<a href="http://preorder.etisalat.com.ng/#"><div id="128GB" class="storage_one" style="margin-left:20px;">&nbsp;<br/>128 GB</div></a><!-- model_one close -->
	</div>
	
	
	
<div id="fillform" style="float: left; position: absolute; width: 499px; background-color: rgb(255, 255, 255); opacity: 0.2; height: 520px; margin-top: 604px;"> </div>
	<div class="cart_options_title">4. Enter following details:</div><!-- cart_options_title close -->


	<div class="models">
		<p class="error" style="color:red;"></p>
		<input id="model" type="hidden" value="" name="model" />
		<input id="finish" type="hidden" value="" name="finish" />
		<input id="storage" type="hidden" value="" name="storage" />
		
		<div class="form_title">Name<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="fulname" class="preorder_form" name="fulname" />
		<div class="form_title">Mobile No.<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="mb" class="preorder_form" name="mb" />
		<div class="form_title">Email<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="email" class="preorder_form" name="email" />
		<div class="form_title">Address <span style="color:#719e19;">(Optional)</span></div><!-- form_title close -->
		<textarea type="text" class="preorder_form_textarea" id="Address" name="Address"></textarea>
		<div class="form_title">Prefered etisalat shop for pick-up <span style="color:#719e19;">*</span></div><!-- form_title close -->
		<select type="text" name="cboshop" id="cboshop" class="preorder_form_select" onchange="document.getElementById('txtshops').value=this.options[this.selectedIndex].text">
        <option selected="selected" value="" <?php echo '' . ( $cboshop == '' ? 'selected':'' ); ?>></option>
		  <?php

            	$shops = ""; $shopsid= "";
            	$query = "SELECT * FROM ETISALATSHOPS";
				$data = mysqli_query($dbc,$query);

				while($row = mysqli_fetch_array($data))
				{

					$shopsid = $row['ID'];
					$shops = $row['SHOPS'];

			 	    echo '<option value="'. $shopsid . '" ' . ( $cboshop == $shopsid ? 'selected':'' ) ." > $shops </option>";

			    }

		  ?>
	    </select>
	    <input type="hidden" name="txtshops" id="txtshops" value="" />
		<div class="terms_conditions">By clicking on proceed, you agree to receive notifications on your choice of iPhone 6</div><!-- terms_conditions close -->
		<div class="wraptool">&nbsp;</div>
		<ul class="proceed_button">
			<li>
				 <a id="nothing" onclick="javascript:pay();">Proceed to checkout</a>
			</li>
		</ul>
	</div><!-- models close -->
	

	</div><!-- cart_options_details close -->
	<br class="clear">
	</div><!-- cart_options close -->
	<br class="clear">
	</div><!-- content_inner close -->
</div>
<!-- content close -->
</form>

<!-- footer_text close -->
</div><!-- wrapper close -->

<div id="third">
		<div class="content">
			
			<div style="background:#F0F0F0;" class="main">
<div class="main_inner">
<div class="iphone_main_logo"><img src="./resources/iphone_logo.png"></div><!-- iphone_main_logo close -->
<div class="main_inner"><img src="./resources/all-design.jpg"></div><!-- content_phones_inner_images close -->
<br class="clear">
<div class="content_phones_text" style=" text-align:center">iPhone 6 is not simply bigger – its better in every way.Larger yet dramatically thinner. More powerful, but remarkable power efficient. With a smooth metal surface that seamlessly meets our most advanced Multi-Touch display. Its a new generation of iphone that’s better by any measure.</div>
</div><!-- content_phones_inner close -->
<br class="clear">
</div><!-- main_inner close -->

</div><!-- content close -->


<div style="padding-bottom:0;" class="main">
<div class="main_inner">

<div class="text_left">
<div class="text_left_title">Retina HD displays</div><!-- text_left_title close -->
<div class="text_left_text">Even at 5.5 inches and 4.7 inches,they are the thinnest,most advanced multi-touch displays ever made for iphone.</div><!-- content_phones_text close -->


</div><!-- text_left close -->
<div class="image_right"><img src="./resources/retina.png"></div><!-- image_right close -->
<br class="clear">
</div><!-- main_inner close -->
</div><!-- main close -->


<div style="background:#F0F0F0;" class="main">
<div class="main_inner">

<div class="processor_image"><img src="./resources/processor.png"></div><!-- processor_image close -->

<div class="processor_text">
<div class="processor_title">A8 chip with 64-bit architecture</div><!-- processor_title close -->
<div class="text_left_text">The A8 chip is not only faster than A7 chip, its upto 50 percent more energy efficient too.</div>
</div><!-- processor_text close -->

<br class="clear">
</div><!-- main_inner close -->
</div><!-- main close -->




<div class="main_inner">
<br>
<br>
<div class="comparison_images">
<div style="margin-left:200px;" class="comparison_images_one"><img src="./resources/iphone_six_plus.png"></div><!-- comparison_images_one close -->
<div class="comparison_images_one"><img src="./resources/iphone_six.png"></div><!-- comparison_images_one close -->
</div><!-- comparison_images close -->


<div class="comparison_images">
<div style="margin-left:200px;" class="comparison_images_one">iPhone 6 Plus</div><!-- comparison_images_one close -->
<div class="comparison_images_one">iPhone 6</div><!-- comparison_images_one close -->
</div><!-- comparison_images close -->








<div class="comparison_text_inner">

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Capacity</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">16GB &nbsp; 64GB &nbsp; 128GB</span></div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">16GB &nbsp; 64GB &nbsp; 128GB</span></div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Chips</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">A8 chip with 64-bit architecture<br>M8 motion coprocessor</span></div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">A8 chip with 64-bit architecture<br>M8 motion coprocessor</span></div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Display</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">5.5-inch Retina HD display</span><br>1920-by-1080 resolution<br>401 ppi</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">4.7-inch Retina HD display</span><br>1334-by-750 resolution<br>326 ppi</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Touch ID</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">Fingerprint identity sensor</span></div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">Fingerprint identity sensor</span></div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">iSight Camera</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">8 megapixels with 1.5µ pixels</span><br>Sapphire crystal lens cover<br>Autofocus with Focus Pixels<br>
Tap to focus<br>
True Tone flash<br>
Backside illumination sensor <br>
Five-element lens<br>
Exposure control<br>
Auto HDR for photos<br>
Improved face detection<br>
Hybrid IR filter<br>
ƒ/2.2 aperture<br>
Panorama (up to 43 megapixels)<br>
Photo geotagging<br>
Auto image stabilization <br>
Burst mode<br>
Optical image stabilization
</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">8 megapixels with 1.5µ pixels</span><br>Sapphire crystal lens cover<br>Autofocus with Focus Pixels<br>
Tap to focus<br>
True Tone flash<br>
Backside illumination sensor <br>
Five-element lens<br>
Exposure control<br>
Auto HDR for photos<br>
Improved face detection<br>
Hybrid IR filter<br>
ƒ/2.2 aperture<br>
Panorama (up to 43 megapixels)<br>
Photo geotagging<br>
Auto image stabilization <br>
Burst mode<br>
-</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Video Recording</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">1080p HD video recording</span><br>
30 fps or 60 fps<br>
Continuous autofocus video<br>
True Tone flash<br>
Cinematic video stabilization<br>
Take still photos while recording video<br>
Improved face detection<br>
3x zoom<br>
Slo-mo video (120 fpsor 240 fps) <br>
Video geotagging<br>
Time-lapse video
</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">1080p HD video recording</span><br>
30 fps or 60 fps<br>
Continuous autofocus video<br>
True Tone flash<br>
Cinematic video stabilization<br>
Take still photos while recording video<br>
Improved face detection<br>
3x zoom<br>
Slo-mo video (120 fpsor 240 fps) <br>
Video geotagging<br>
Time-lapse video</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">FaceTime Camera</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription">1.2MP photos (1280 by 960)<br>
ƒ/2.2 aperture<br>
720p HD video recording<br>
Auto HDR for photos and videos<br>
Backside illumination sensor<br>
Improved face detection<br>
Burst mode<br>
Exposure control</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription">1.2MP photos (1280 by 960)<br>
ƒ/2.2 aperture<br>
720p HD video recording<br>
Auto HDR for photos and videos<br>
Backside illumination sensor<br>
Improved face detection<br>
Burst mode<br>
Exposure control</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Video and Audio Calling</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">FaceTime</span><br>
iPhone 6 Plus to any<br>FaceTime-enabled device over Wi-Fi or cellular</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">FaceTime</span><br>
iPhone 6 to any<br>FaceTime-enabled device over Wi-Fi or cellular</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Cellular and Wireless</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">LTE</span><br>
GSM model: GSM/EDGE<br>
UMTS/HSPA+<br>
DC-HSDPA <br>
CDMA model: CDMA EV-DO Rev. A and Rev. B<br>
Wi-Fi (802.11a/b/g/n/ac)<br>
Bluetooth 4.0<br>
GPS and GLONASS</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">LTE</span><br>
GSM model: GSM/EDGE<br>
UMTS/HSPA+<br>
DC-HSDPA <br>
CDMA model: CDMA EV-DO Rev. A and Rev. B<br>
Wi-Fi (802.11a/b/g/n/ac)<br>
Bluetooth 4.0<br>
GPS and GLONASS</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">SIM Card</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription">Nano-SIM</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription">Nano-SIM</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->

<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">Battery Life</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">Talk time:</span><br>Up to 24 hours on 3G<br>
<span class="heading_dark">Browsing time:</span><br>Up to 12 hours on LTEUp to 12 hours on 3GUp to 12 hours on Wi-Fi<br>
<span class="heading_dark">Standby time:</span><br>Up to 16 days (384 hours)
</div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription"><span class="heading_dark">Talk time:</span><br>Up to 24 hours on 3G<br>
<span class="heading_dark">Browsing time:</span><br>Up to 12 hours on LTEUp to 12 hours on 3GUp to 12 hours on Wi-Fi<br>
<span class="heading_dark">Standby time:</span><br>Up to 16 days (384 hours)
</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


<div class="comparison_text_inner_one">
<div class="comparison_text_inner_one_heading">In the Box</div><!-- comparison_text_inner_one_heading close -->
<div class="content_phones_inner_one_discription">Apple EarPods with Remote and Mic<br>
Lightning to USB Cable<br>
USB Power Adapter </div><!-- content_phones_inner_one_discription close -->
<div class="content_phones_inner_one_discription">Apple EarPods with Remote and Mic<br>
Lightning to USB Cable<br>
USB Power Adapter</div><!-- content_phones_inner_one_discription close -->
<br class="clear">
</div><!-- comparison_text_inner_one close -->


</div><!-- comparison_text_inner close -->

<br class="clear">
</div><!-- main_inner close -->	
</div>

<div id="forth">
	<div id="congs" class="content">
	<div class="content_inner" style="border-bottom:1px solid #dedede; padding-bottom:120px;">
		<div class="content_inner_logo" style="margin-top:30px;"><img src="./resources/congratulations.jpg"></div><!-- content_inner_logo close -->
		<div class="booked_message">You have successfully pre-registered for your iPhone 6.<br>We will contact you soon.</div><!-- booked_message close -->

        <div class="main_image"><img src="./resources/iphone_down.jpg"></div><!-- main_image close -->
        <br class="clear">
	</div><!-- content_inner close -->
	<div class="benefits">
            <div class="footer">Copyright © 2014 Etisalat Nigeria. All rights reserved</div>
	</div>
</div><!-- main close -->



</body>
</html>

<script language="javascript">
/*******************Validation Script***************************/

function pay(form)
{
	$("#target").submit();
}
	
function formValidator()
{

	var error="";
	var fulname=$("#fulname").val();
	var mb=$("#mb").val();
	var email=$("#email").val();
    var Address = $('#Address').val();
    var cboshop = $('#cboshop').val();
    var modelval=$("#model").val();
    var finishval=$("#finish").val();
	var storageval=$("#storage").val();

	if(modelval == "")
	{
		error +='Select Model | ';
	}
	
	if(finishval == "")
	{
		error +='Select Finish | ';
	}
	
	if(storageval == "")
	{
		error +='Select Storage | ';
	}
	else
	{
		if(storageval == "128GB" && modelval == "iphone6plus")
		{
			error +='Select Storage | ';
		}
	}

	if(fulname == "")
	{
		error +='Enter Fullname | ';
	}
	
	if(mb == "")
	{
		error +='Enter Mobile Number | ';
	}
	else
	{
		var chknumeric="No";
		if(!$.isNumeric(mb))
		{
			error +='Mobile number should be Numeric | ';
			chknumeric="Yes";
		}
		if(chknumeric=="No")
		{
			var okay="false";
			if(mb.length==10)
			{
				okay="true";
			}
			if(mb.length==14)
			{
				var prefix=mb.substr(0, 4);
				if(prefix=="+234")
				{
					okay="true";
				}
			}
			if(mb.length==11)
			{
				var prefix=mb.substr(0, 1);
				if(prefix=="0")
				{
					okay="true";
				}
			}
			if(mb.length==13)
			{
				var prefix=mb.substr(0, 3);
				if(prefix=="234")
				{
					okay="true";
				}
			}
			if(okay=="false")
			{
				error +='You have entered incorrect mobile number | ';
			}
		}
	}
	
	if(email == "")
	{
		error +='Enter Email | ';
	}
	else
	{
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	    if( !emailReg.test(email) ) 
	    {
		  error +='Email is not correct';
	    }
	}
	
	if(cboshop == "")
	{
		error +='Select Shop | ';
	}


	if(error != "")
	{
		$(".error").html(error);
		return false;
	}
	else
	{
	  return true;	
	}
	
	return false;
	
}


</script>


<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 962852725;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/962852725/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>