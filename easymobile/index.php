<?php
	
	if(Isset($_POST['msg'])) 
		$incomMsg = $_POST['msg'];
	else $incomMsg = "";
	
	//echo "Incoming message :::: $incomMsg";
	
	if ($incomMsg == "vbal")
	{
		echo "Main bal: N 360.40; Recharge N600 NOW, dial *344*300# three times & Get N1800 Credit to Call All Networks. Valid/7days.";
	}
	else if ($incomMsg == "rechs")
	{
		echo "Dear customer, you have been successfully credited. Thanks for choosing Etisalat.";
	}
	else if ($incomMsg == "trans")
	{
		echo "Dear customer, you have suceessfully transfered to another number. Thanks for choosing Etisalat.";
	}
	else if ($incomMsg == "recho")
	{        
		echo "Dear customer, you have suceessfully recharged another number. Thanks for choosing Etisalat";
	}
	else if ($incomMsg == "dbal")
	{
		echo "Your data balance is 2616 MB valid till 2014-08-17. Dial *229*1# @N100 and enjoy extra data between 1am to 5AN for 7days.";
	}
	else if ($incomMsg == "buydata")
	{
		echo "Your request has been successfully sent. You will be credited shortly";
	}
	else if ($incomMsg == "optout")
	{
		echo "You have successfuly opted out of your current data plan. Please continue to  enjoy easyblaze.";
	}
	else if ($incomMsg == "email")
	{
		if(Isset($_POST['email'])) 
			$email = $_POST['email'];
		else $email = "";
		
		
		if(Isset($_POST['pass'])) 
			$pass = $_POST['pass'];
		else $pass = "";
		
		
		$toemail = $email; 
		$subject = "EasyMobile Care !";
		$message = '<html>
		<head>
		  <title>EasyMobile Care</title>
		</head>
		<body>
		<img name="headermenu_r1_c1" src="http://preorder.etisalat.com.ng/images/etisalat.jpg" width="201" height="57" border="0" id="headermenu_r1_c1" alt="" />
		<br/>
		Dear EasyMobile User,
		<br/><br/>
		A forgot password request was made, below is your password.
		<br/>
		<div align="left">
		<br/>
		<strong>Password:</strong><br/>'. $pass .'<br/><br/>	
		</div>
		<hr />
		If you did not make this request, simply ignore this mail. please feel free to call 200 (our toll-free Customer Care number).
		For all the latest on Etisalat and our innovative services, please visit http://www.etisalat.com.ng 
		<br/><br/>
		Thank you for choosing Etisalat.
		<br/><br/>
		Regards,
		<br/><br/>
		Care 
		</body>
		</html>';
		
			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <care@etisalat.com.ng>' . "\r\n";
		
		$msg_status = mail($toemail, $subject, $message, $headers);
			
		echo "Your password has been sent to email : $email";
	}
	else
	{
		echo "The data you supplied seem invalid. Kindly check and try again.";
	}
	
	
	
?>
