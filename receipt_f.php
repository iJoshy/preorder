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
$msg = $_GET['msg'];
$firstname = ""; $mobile = ""; 
$device_model = ""; $amount = "";
$device_color = ""; $device_storage = "";

$query = "SELECT * FROM iphone6payment WHERE customerid = '$custid'";
$data = mysqli_query($dbc,$query);

while($row = mysqli_fetch_array($data))
{	
	$firstname = $row['fullname'];
	$mobile = $row['mobile'];
	$device_model = $row['model'];
	$device_color = $row['color'];
	$device_storage = $row['storage'];
	$amount = $row['amount'];
}

$custname = $firstname .' ' .$mobile;
$device_name = $device_model . ' ' . $device_storage . ' ' . $device_color;

mysqli_close($dbc);

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
				  	<div style="background-color:#f9e5e6; height:50px;border:1px #ff000d solid;">
			  			<p style="margin-top:5px; font-weight:bold; color:#ff000d">Failed Transaction!<br/><?php echo $msg; ?></p>
			  		</div>
		  		</td>
			  </tr>
			  <tr>
			  	<td>
				  	<div style="height:100%;" align="left">
			  			<br/>
			  			<strong>Customer Name:</strong><br/><?php echo ucwords($custname); ?><br/><br/>
			  			<strong>Transaction Reference:</strong><br/> <?php echo $ref; ?><br/><br/>
			  			<strong>Payment:</strong><br/><?php echo $device_name; ?><br/><br/>
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
