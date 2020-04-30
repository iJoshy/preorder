<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><!-- InstanceBegin template="/Templates/Inner Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Etisalat Nigeria | Preorder</title>

<?php 

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$ref = $_GET['ref'];
$custid = $_GET['custid'];
$created = ""; $firstname = ""; 
$email = ""; $mobile = ""; $shop = ""; 
$device_model = ""; $device_color = ""; 
$device_storage = ""; $amount = ""; 
$isw_resp = "0"; $shopsemails = ""; 
$shops = "";

$stmt = "";
		 
$stmt = $dbc->prepare("SELECT * FROM iphone6payment a, etisalatshops b WHERE a.shop = b.ID AND a.customerid = ?");	
$stmt->bind_param("s", $custid);	
$stmt->execute();

$data = $stmt->get_result();
while($row = mysqli_fetch_array($data))
{	
	$created = $row['created'];
	$firstname = $row['fullname'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$device_model = $row['model'];
	$device_color = $row['color'];
	$device_storage = $row['storage'];
	$amount = $row['amount'];
	$shops = $row['SHOPS'];
	$shopsemails = $row['SHOPSEMAILS'];
}

$custname = $firstname . ' ' .$mobile;
$device_info = $device_model . ' ' . $device_storage . ' ' . $device_color;

//discount check
$likemb = "";
if(strlen($mobile) == 14)
{
	$likemb = substr($mobile,4);
}
if(strlen($mobile) == 13)
{
	$likemb = substr($mobile,3);
}
if(strlen($mobile) == 11)
{
	$likemb = substr($mobile,1);
}


$stmt = "";

$stmt = $dbc->prepare("UPDATE discount SET USED = '1' WHERE MOBILE LIKE ?");
$find = '%' . $likemb . '%';	
$stmt->bind_param("s",$find);	
$stmt->execute();


mysqli_close($dbc);


$toemail = $email; 
$subject = "Etisalat - iPhone 6 Online Payment Notification";
$message = '<html>
<head>
  <title>Etisalat - iPhone 6 Online Payment Notification</title>
</head>
<body>
<img name="headermenu_r1_c1" src="http://preorder.etisalat.com.ng/images/etisalat.jpg" width="201" height="57" border="0" id="headermenu_r1_c1" alt="" />
<br/><br/>
<h2>Thank you for purchasing the all new iPhone 6 !</h2>
<br/><br/>
Dear '. $firstname . ' ' . $mobile .',
<br/><br/>
Please bring along this transaction details to the etisalat experience center below, from the <strong>19th of November 2014</strong> to redeem your device.
<br/>
<div align="left">
<br/>
<strong>Customer Name:</strong><br/>'. ucwords($custname) .'<br/><br/>
<strong>Transaction Reference:</strong><br/>'. $ref .'<br/><br/>
<strong>Payment:</strong><br/>'. $device_info .'<br/><br/>
<strong>Customer Id:</strong><br/>'. $custid .'<br/><br/>
<strong>Amount:<br/><strike>N</strike></strong>'. number_format($amount) .'<br/><br/>	
<strong>Etisalat Experience Center:</strong><br/>'. $shops .'<br/><br/><br/>
</div>
<hr />
If you will like to know the status of your purchase, please feel free to send an email to RetailOperations@etisalat.com.ng or call 200 (our toll-free Customer Care number).
<br/>
For all the latest on Etisalat and our innovative services, please visit http://www.etisalat.com.ng 
<br/><br/>
Thank you for choosing Etisalat.
<br/><br/>
Regards,
<br/><br/>
Retail Team 
</body>
</html>';

ini_set('SMTP', 'apprelay.etisalatng.com'); 
ini_set('smtp_port', 25);
	
$headers  = "From: $device_info <RetailOperations@etisalat.com.ng>\r\n X-Mailer: php\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'Bcc: ' . $shopsemails . ",DeviceUnit@etisalat.com.ng,portal.services@etisalat.com.ng\r\n";


$msg_status = mail($toemail, $subject, $message, $headers);
	

?>

</head>
<body>
<center>
<table style="background-image:url('images/receiptback.jpg'); width: 506px; height: 616px;margin-top:20px">
	<tr>
	  <td valign="top">
		  <table width="90%" style=" margin-top:125px;margin-left:15px">
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
			  			<strong>Payment:</strong><br/><?php echo $device_info; ?><br/><br/>
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
