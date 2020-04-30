<?php
session_start();

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySql Server');


$txtfirstname = $_POST['txtfirstname'];
$txtlastname = $_POST['txtlastname'];
$custid = $_POST['custid'];
$devicetype = $_POST['devicetype'];
$query= "";
	 

$toemail = "DeviceUnit@etisalat.com.ng"; 
$subject = $device . " - Online Prebooking !";
$message = '<html>
<head>
  <title>'. $device .' PreBooking</title>
</head>
<body>
Dear '. $txtfirstname . ' ' . $txtlastname .',
<br/><br/>
We acknowledge receipt of your booking request and assure you it will be treated accordingly.
<br/><br/>


<br/><br/>
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

	
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '. $device .' <care@etisalat.com.ng>' . "\r\n";

$toemail = $txtemail;

mail($toemail, $subject, $message, $headers);

if( $txtalternateemail != "" || $txtalternateemail != NULL)
{
	mail($txtalternateemail, $subject, $message, $headers);
}
	
/*if($msg_status)
{
*/
	$query = "UPDATE transactions SET AMOUNT = '$amount', PAYMENT_TYPE = '1' WHERE CUSTOMERID = '$custid'";
				
	mysqli_query($dbc, $query) or die('Error inserting new profile ');
				
	header('Location: prebooking_s.php?devicetype='. $devicetype . '&firstname='. $txtfirstname . '&lastname=' . $txtlastname . '&custid=' . $custid);
	
	mysqli_close($dbc);
/*
}
else
{
	mysqli_close($dbc);
	header('Location: index.php');
}
*/

?>