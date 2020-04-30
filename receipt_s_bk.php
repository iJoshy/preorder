<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><!-- InstanceBegin template="/Templates/Inner Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Etisalat Nigeria | Preorder</title>
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5547935-1']);
  _gaq.push(['_setDomainName', 'etisalat.com.ng']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>

<?php 

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$ref = $_GET['ref'];
$custid = $_GET['custid'];
$firstname = ""; $lastname = ""; 
$alt_email = ""; $amount = ""; $email = "";
$mobile = ""; $alt_mobile = ""; $quantity = "";
$shop = ""; $question = ""; $answer = "";
$device_size = ""; $device_name = ""; $created = "";
$payment_type = ""; $isw_resp = "0"; $shopsemails = ""; 


$query = "SELECT * FROM transactions a, etisalatshops b WHERE a.SHOP = b.ID AND a.CUSTOMERID = '$custid'";
$data = mysqli_query($dbc,$query);

while($row = mysqli_fetch_array($data))
{	
	$created = $row['CREATED'];
	$firstname = $row['FIRSTNAME'];
	$lastname = $row['LASTNAME'];
	$email = $row['EMAIL'];
	$alt_email = $row['ALT_EMAIL'];
	$mobile = $row['MOBILE'];
	$alt_mobile = $row['ALT_MOBILE'];
	$quantity = $row['QUANTITY'];
	$device_name = $row['DEVICE_NAME'];
	$device_size = $row['DEVICE_SIZE'];
	$amount = $row['AMOUNT'];
	$shop = $row['SHOP'];
	$question = $row['QUESTION'];
	$answer = $row['ANWSER'];
	$payment_type = $row['PAYMENT_TYPE'];
	$isw_resp = $row['INTERSWITCH_RESPONSE'];
	$shopsemails = $row['SHOPSEMAILS'];
}

$custname = $firstname . ' ' .$lastname;

mysqli_close($dbc);

$params = array(
  'altMsidn' => $alt_mobile, 
  'alternativeEmail' => $alt_email, 
  'amount' => $amount, 
  'answer' => $answer, 
  'customerId' => $custid, 
  'deviceName' => $device_name,
  'deviceSize' => $device_size,
  'email' => $email,
  'firstname' => $firstname,  
  'interswitchResponse' => $isw_resp, 
  'interswitchTxnRef' => $ref,
  'lastname' => $lastname, 
  'msisdn' => $mobile, 
  'paymentType' => $payment_type, 
  'preorderDate' => $created,
  'quantity' => $quantity, 
  'question' => $question, 
  'shop' => $shop, 
  'title' => '' 
);

//var_dump($params);
$client = ""; $result = ""; $array = "";

try 
{
	if(!@file_get_contents(WSDL_REM)) 
	{
		throw new SoapFault('Server', 'No WSDL found at ' . WSDL_REM);
	}

	$client = new SoapClient(WSDL_REM);
	$result = $client->createPreorder(array('order' => $params));
	
	//var_dump($result);
	//exit;
	
	$array = $result->return->responseCode;
	//echo "array is $array";
	//exit;
}
catch (Exception $e) 
{ 
    //
} 
catch(SoapFault $se)
{
	//
}


$toemail = $email; 
$subject = "Etisalat $device_name Online Payment !";
$message = '<html>
<head>
  <title>Etisalat '. $device_name .' Online Payment</title>
</head>
<body>
<img name="headermenu_r1_c1" src="http://preorder.etisalat.com.ng/images/etisalat.jpg" width="201" height="57" border="0" id="headermenu_r1_c1" alt="" />
<br/>
Dear '. $firstname . ' ' . $lastname .',
<br/><br/>
Please bring along this transaction details to your selected experience center to redeem your device.
<br/>
<div align="left">
<br/>
<strong>Customer Name:</strong><br/>'. ucwords($custname) .'<br/><br/>
<strong>Transaction Reference:</strong><br/>'. $ref .'<br/><br/>
<strong>Payment:</strong><br/>'. $device_name . ' ' . $device_size .'<br/><br/>
<strong>Customer Id:</strong><br/>'. $custid .'<br/><br/>
<strong>Amount:<br/><strike>N</strike></strong>'. number_format($amount) .'<br/><br/>	
</div>
<hr />
If you will like to know the status of your request, please feel free to call 200 (our toll-free Customer Care number).
For all the latest on Etisalat and our innovative services, please visit http://www.etisalat.com.ng 
<br/><br/>
Thank you for choosing Etisalat.
<br/><br/>
Regards,
<br/><br/>
Care 
</body>
</html>';

ini_set('SMTP', 'apprelay.etisalatng.com'); 
ini_set('smtp_port', 25);
	
$headers  = "From: $device_name <care@etisalat.com.ng>\r\n X-Mailer: php\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "Cc: devicesunit@etisalat.com.ng\r\n";
$headers .= "Bcc: $shopsemails\r\n";

$msg_status = mail($toemail, $subject, $message, $headers);
	

?>

</head>
<body>
<center>
<table style="background-image:url('images/receiptback.jpg'); width: 506px; height: 616px;margin-top:20px">
	<tr>
	  <td valign="top">
		  <table width="90%" style=" margin-top:130px;margin-left:20px">
			  <tr>
			  	<td align="center">
				  	<div style="background-color:#e4f7e1; height:50px;border:1px #00b50b solid;">
			  			<p style="margin-top:15px; font-weight:bold; color:#00b50b">Successful Transaction!</p>
			  		</div>
		  		</td>
			  </tr>
			  <tr>
			  	<td>
				  	<div style="height:100%;" align="left">
			  			<br/>
			  			<strong>Customer Name:</strong><br/><?php echo ucwords($custname); ?><br/><br/>
			  			<strong>Transaction Reference:</strong><br/> <?php echo $ref; ?><br/><br/>
			  			<strong>Payment:</strong><br/><?php echo "$device_name $device_size"; ?><br/><br/>
			  			<strong>Customer Id:</strong><br/><?php echo $custid; ?><br/><br/>
			  			<strong>Amount:<br/><strike>N</strike></strong><?php echo number_format($amount); ?><br/><br/>
			  			<hr />
			  			Please bring along this transaction details to your selected experience center to redeem your device.			  			
			  		</div>
		  		</td>
			  </tr>
		  </table>
	  </td>
	</tr>   
</table>
</center>
</body>
</html>
