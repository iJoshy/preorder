<?php
	
	require_once('connectionvars.php');					
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(Isset($_POST['MOBILE']))
        $mobile = $_POST['MOBILE'];
    else $mobile = "";
    
    if(Isset($_POST['SOCIALINFO']))
        $socialinfo = $_POST['SOCIALINFO'];
    else $socialinfo = "";
    
	
	//echo "Incoming message :::: $incomMsg";
	
	if ( $mobile == "" || $socialinfo == "" )
	{
		echo "0";
	}
	else
	{
        $stmt = "";
        
        $stmt = $dbc->prepare("UPDATE userinfo SET social_info = ? WHERE mobile_no = ?");
        $stmt->bind_param("ss", $socialinfo, $mobile);
        $stmt->execute();

		echo "1";
		
		$stmt->close();
		mysqli_close($dbc);
		
	}
	
?>
