<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Etisalat Nigeria | iPhone 6</title>
<link href="./resources/style.css" rel="stylesheet" type="text/css">
<link href="./resources/other.css" rel="stylesheet" type="text/css">
<link href="./resources/stylesheet.css" rel="stylesheet" type="text/css" media="screen">
<script language="javascript" src="./resources/jquery-1.7.2.min.js"></script>
<script src="./resources/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script language="javascript">

function selected()
{
	var hash = "#";
	
	var id = $('#model').val();
	var model = hash.concat(id);
	$(model).css("border","#719e19 solid 2px");
	$(model).css("box-shadow","0 0 4px 2px #719e19");
	
	hash = "#";
	var id = $('#finish').val();
	var finish = hash.concat(id);
	$(finish).css("border","#719e19 solid 2px");
	$(finish).css("box-shadow","0 0 4px 2px #719e19");

	hash = "#";
	var id = $('#storage').val();
	var storage = hash.concat(id);
	$(storage).css("border","#719e19 solid 2px");
	$(storage).css("box-shadow","0 0 4px 2px #719e19");
}	

</script>
<style>
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
</head>

<?php

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$fulname= mysqli_real_escape_string($dbc, $_POST['fulname']);
$mb= mysqli_real_escape_string($dbc, $_POST['mb']);
$email= mysqli_real_escape_string($dbc, $_POST['email']);
$Address= mysqli_real_escape_string($dbc, $_POST['Address']);
$modelval= mysqli_real_escape_string($dbc, $_POST['model']);
$finishval= mysqli_real_escape_string($dbc, $_POST['finish']);
$storageval= mysqli_real_escape_string($dbc, $_POST['storage']);
$cboshop= mysqli_real_escape_string($dbc, $_POST['cboshop']);
$txtshops= mysqli_real_escape_string($dbc, $_POST['txtshops']);

$cboquantity= "1";

/*echo "<br/><span>$fulname <br/> $mb <br/> $email <br/> $Address <br/> $modelval <br/> $finishval <br/> $storageval </span><br/>";*/


$itemcode = "";
$paymentcode = "";
$amount = "";


$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")+17);
$expdate = date("Y-m-d", $tomorrow);
$query=""; $newdbref = ""; $nowdate = date("Y-m-d");
$iswresult = ""; $client = ""; $array = "";


//Generate Customer ID and get device details (amount, itemcode & paymentcode)
$custid = ""; $stmt = "";

try
{
	$query = "SELECT REFERENCE_NO FROM reference";
	$data = mysqli_query($dbc,$query);

	if(mysqli_num_rows($data) == 1)
	{
		$row = mysqli_fetch_array($data);

		$newdbref = $row['REFERENCE_NO'] + 1;
		$custid = ISW_ID . str_pad($newdbref,9,"0",STR_PAD_LEFT);
	}
	
	$stmt = $dbc->prepare("SELECT * FROM DEVICES WHERE NAME = ? AND SIZE = ?");	
	$stmt->bind_param("ss", $modelval, $storageval);	
	$stmt->execute();
	
	$data = $stmt->get_result();
	while($row = mysqli_fetch_array($data))
	{
		$amount = $row['AMOUNT'];
		$paymentcode = $row['PAYMENTCODE'];
		$itemcode = $row['ITEMCODE'];
	}
		
	//$amount = 100;
	$amount = $amount * $cboquantity;
	$iswamount = $amount * 100;

}
catch (Exception $e)
{
	header('Location: index.php?msg=101 - Oops, server is temporarily unavailable, please try again later!');
	exit;
}


//Connect to Interswitch to log Id
try
{

	$Booking = array(
		  'ReferenceNumber' => $custid,
		  'Description' => $modelval,
		  'Amount' => $iswamount ,
		  'DateBooked' => $nowdate,
		  'DateExpired' => $expdate,
		  'FirstName' => $fulname,
		  'LastName' => $mb,
		  'Email' => $email,
		  'ItemCode' => $itemcode
	);
	
	$params = array(
		  'MerchantId' => ISW_ID,
		  'Bookings' => array($Booking)
	);

	if(!@file_get_contents(WSDL_URL))
	{
		throw new SoapFault('Server', 'No WSDL found at ' . WSDL_URL);
	}

	$client = new SoapClient(WSDL_URL);

	$array = $client->CreateBooking(array('ReservationRequest' => $params));
	$iswresult = $array->CreateBookingResult->Booking->ResponseCode;

}
catch (Exception $e)
{
    header('Location: index.php?msg=102 - Oops, server is temporarily unavailable, please try again later!');
}
catch(SoapFault $se)
{
	header('Location: index.php?msg=103 - Oops, server is temporarily unavailable, please try again later!');
}

//var_dump($Booking);
//var_dump($params);
//echo $iswresult;
//exit;
//Connect and Log transaction on local db

if( $iswresult == '100' )
{
	try
	{
		 $stmt = ""; $id = "0"; $empty = ""; $zero = "0"; $nowdate = date("Y-m-d H:i:s");
			 
		 $stmt = $dbc->prepare("INSERT INTO iphone6payment VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");	
		 $stmt->bind_param("isssssssssssss", $id, $custid, $nowdate, $fulname, $mb, $email, $Address, $modelval, $finishval, $storageval, $cboshop, $amount, $empty, $empty);	
		 $stmt->execute();

		 $stmt = "";
		 
		 $stmt = $dbc->prepare("UPDATE reference SET REFERENCE_NO =  ?");	
		 $stmt->bind_param("s", $newdbref);	
		 $stmt->execute();

	}
	catch(Exception $e)
	{
		header('Location: index.php?msg=104 - Oops, server is temporarily unavailable, please try again later!');
	}

}
else
{
	header('Location: index.php?msg=105 - Oops, server is temporarily unavailable, please try again later! errorcode - '.$iswresult);
}


//$txtredirect = 'http://preorder.etisalat.com.ng/do_payment.php?params=' . $amount . ',' . $custid . ',' . $device . ',' . $ipadtype . ',' . $txtfirstname . ',' . $txtlastname;
$txtredirect = 'http://preorder.etisalat.com.ng/do_payment.php?params=' . $custid;

?>

<body onload="return selected();">
<div class="main">
<div class="header">
<div class="header_inner">
<div style="margin-left:10px;" class="main_logo"><a href="http://preorder.etisalat.com.ng/index.php"><img src="./resources/logo.png"></a></div><!-- main_logo close -->
</div><!-- header_inner close -->
</div><!-- header close -->



<div id="second">

<form id="target"  action="do_booking.php" method="post" >

<div style="padding-bottom:50px;" class="content">
	<div class="content_inner">
	<div class="cart_options">
	<div class="cart_options_image"><img src="./resources/iphones.png" /></div><!-- cart_options_image close -->
	<div class="cart_options_details">
	
	<div class="cart_options_title">1. Selected model:</div>
	<div class="models">
	<a><div id="iphone6" class="model_one"><span class="model_one_name">iPhone 6</span> <br/>4.7-inch display<br/></div></a><!-- model_one close -->
	<a><div id="iphone6plus" class="model_one" style="margin-left: 20px; box-shadow: 0px 0px 0px 0px rgb(0, 0, 0); border: 1px solid rgb(153, 153, 153);"><span class="model_one_name">iPhone 6 Plus</span><br/>5.5-inch display<br/></div></a><!-- model_one close -->
	</div>
	
	<div id="choosefinish" style="float: left; position: absolute; width: 499px; height: 151px; margin-top: 282px; background-color: rgb(255, 255, 255); opacity: 0.2;"> </div>
	<div class="cart_options_title">2. Selected color:</div><!-- cart_options_title close -->
	<div class="models">
	<a><div class="color_one" id="silver"><img src="./resources/silver.jpg" /></div></a><!-- model_one close -->
	<a><div style="margin-left:20px;" class="color_one" id="gold"><img src="./resources/gold.jpg" /></div></a><!-- model_one close -->
	<a><div style="margin-left:20px;" class="color_one" id="gray"><img src="./resources/gray.jpg" /></div></a><!-- model_one close -->
	</div><!-- models close -->
	
	<div id="choosestorage" style="float: left; position: absolute; width: 499px; height: 151px; margin-top: 440px; background-color: rgb(255, 255, 255); opacity: 0.2;"> </div>
	<div class="cart_options_title">3. Selected storage size:</div>
	<div class="models">
		<a><div id="16GB" class="storage_one" ><span class="model_one_name" >iPhone</span> <br/>16 GB</div></a><!-- model_one close -->
		<a><div id="64GB" class="storage_one" style="margin-left:20px;"><span class="model_one_name">iPhone</span><br/>64 GB</div></a><!-- model_one close -->
		<a><div id="128GB" class="storage_one" style="margin-left:20px;"><span class="model_one_name">iPhone</span> <br/>128 GB</div></a><!-- model_one close -->
	</div>
	
	
	
<div id="fillform" style="float: left; position: absolute; width: 499px; height: 400px; margin-top: 590px;"> </div>
	<div class="cart_options_title">4. Details Entered :</div><!-- cart_options_title close -->


	<div class="models">
		<input id="model" type="hidden" value="<?php echo $modelval; ?>" name="model" />
		<input id="finish" type="hidden" value="<?php echo $finishval; ?>" name="finish" />
		<input id="storage" type="hidden" value="<?php echo $storageval; ?>" name="storage" />
		<input id="custid" type="hidden" value="<?php echo $custid; ?>" name="custid"  />
		<div class="form_title">Name<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="fulname" class="preorder_form" name="fulname" value="<?php echo $fulname; ?>" />
		<div class="form_title">Mobile No.<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="mb" class="preorder_form" name="mmb" value="<?php echo $mb; ?>" />
		<div class="form_title">Email<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="email" class="preorder_form" name="email" value="<?php echo $email; ?>" />
		<div class="form_title">Prefered etisalat shop for pick-up<span style="color:#719e19;">*</span></div><!-- form_title close -->
		<input type="text" id="cboshop" class="preorder_form" name="cboshop" value="<?php echo $txtshops; ?>" />
		<div class="form_title">Amount</div><!-- form_title close -->
		<input type="text" id="firstamount" class="preorder_form" name="firstamount" value="<?php echo '₦' . number_format($amount,2); ?>" />
		
		<?php
					            	  
        	  	$stmt = ""; $discountval = "0.0"; $discountamt = "";
        	  	
        	  	//discount check
        	  	$likemb = "";
        	  	if(strlen($mb) == 14)
        	  	{
        	  		$likemb = substr($mb,4);
        	  	}
        	  	if(strlen($mb) == 13)
        	  	{
        	  		$likemb = substr($mb,3);
        	  	}
				if(strlen($mb) == 11)
        	  	{
        	  		$likemb = substr($mb,1);
        	  	}
        	  	
        	  	
        	    $stmt = $dbc->prepare("SELECT DISCOUNTVALUE FROM discount WHERE MOBILE LIKE ? AND USED  = '0' ");
        	    $find = '%' . $likemb . '%';	
				$stmt->bind_param("s",$find);	
				$stmt->execute();
				
				$data = $stmt->get_result();
				while($row = mysqli_fetch_array($data))
				{
					$discountval = $row['DISCOUNTVALUE'];
				}
					
				//$amount = 100;
				$discountamt = $amount * $discountval;
				$amount = $amount - $discountamt;
				$iswamount = $amount * 100;
				
				$stmt->close();
				mysqli_close($dbc);

        ?>


		<div class="form_title">Discount</div><!-- form_title close -->
		<input type="text" id="discount" class="preorder_form" name="discount" value="<?php echo '₦ ' . number_format($discountamt,2); ?>" />
		<div class="form_title">Total</div><!-- form_title close -->
		<input type="text" id="amount" class="preorder_form_total" name="amount" value="<?php echo '₦ ' . number_format($amount,2); ?>" />	
		<div>	
			<ul class="proceed_button2" style="list-style-type:none">
				<li>
					 <a id="nothing" href="http://preorder.etisalat.com.ng/index.php">Back</a>				 
				</li>		
			</ul>
		    <a class="quickteller-checkout-anchor" id="<?php echo $paymentcode; ?>" ></a>
		</div>
				       
		<input type="hidden" id="amountField" runat="server" value="<?php echo $iswamount; ?>" />
		<input type="hidden" id="customerIdField" runat="server" value="<?php echo $custid; ?>" />
		<input type="hidden" id="emailField" runat="server" value="<?php echo $email; ?>" />
		<input type="hidden" id="mobileNumberField" runat="server" value="<?php echo $mb; ?>" />
		<input type="hidden" id="txtredirect" value="<?php echo $txtredirect; ?>" />
			
		 <script type="text/javascript">
               var QTCheckout = QTCheckout || {};
               QTCheckout.paymentItems = QTCheckout.paymentItems || [];
               QTCheckout.paymentItems.push({
                   paymentCode: '<?php echo $paymentcode; ?>',
                   extraData: {
                        amount: 'default',
			            amountFieldId:'amountField',
			            customerId: 'default',
			            customerIdFieldId:'customerIdField',
			            mobileNumber:'default',
			            mobileNumberFieldId:'mobileNumberField',
			            emailAddress:'default',
			            emailAddressFieldId: 'emailField',
			            buttonSize:'large',
			            redirectUrl:'<?php echo $txtredirect; ?>'
                   }
               });
               if (!QTCheckout.qtScript) {
                   var qtScript = document.createElement('script'); qtScript.type = 'text/javascript'; qtScript.async = true; qtScript.src = "https://paywith.quickteller.com/scripts/quickteller-checkout-min.js?v=" + new Date().getDay(); var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(qtScript, s); QTCheckout.qtScript = qtScript;
               } else if (QTCheckout.buildPaymentItemsUI) { QTCheckout.buildPaymentItemsUI(); }
           </script>
           
	</div>
	
	<!-- models close -->
	

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
