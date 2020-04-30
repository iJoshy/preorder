<?php
	
	require_once('connectionvars.php');					
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(Isset($_POST['MOBILE']))
        $mobile = $_POST['MOBILE'];
    else $mobile = "";
    
	if(Isset($_POST['SIMINFO']))
		$simInfo = $_POST['SIMINFO'];
	else $simInfo = "";
    
    if(Isset($_POST['DEVICEINFO']))
        $deviceinfo = $_POST['DEVICEINFO'];
    else $deviceinfo = "";
    
    if(Isset($_POST['ACCOUNTINFO']))
        $accountinfo = $_POST['ACCOUNTINFO'];
    else $accountinfo = "";
    
	
	//echo "Incoming message :::: $incomMsg";
	
	if ($mobile == "" || $simInfo == "" || $deviceinfo == "" || $accountinfo == "")
	{
		echo "0";
	}
	else
	{
		$stmt = ""; $empty = ""; $dbmobile = ""; $nowdate = date("Y-m-d H:i:s");
		 
		$stmt = $dbc->prepare("SELECT MOBILE_NO FROM userinfo WHERE MOBILE_NO = ?");	
		$stmt->bind_param("s", $mobile);	
		$stmt->execute();
		
		$data = $stmt->get_result();
		while($row = mysqli_fetch_array($data))
		{
			$dbmobile = $row['MOBILE_NO'];
		}


		if($dbmobile == "")
		{
			$stmt = $dbc->prepare("INSERT INTO userinfo VALUES ( ?, ?, ?, ?, ?, ?)");	
			$stmt->bind_param("ssssss", $mobile, $nowdate, $simInfo, $deviceinfo, $accountinfo, $empty);	
			$stmt->execute();
		}
		else
		{
			$stmt = $dbc->prepare("UPDATE userinfo SET created = ?, sim_info = ?, device_info = ?, account_info = ?, social_info = ? WHERE mobile_no = ?");	
			$stmt->bind_param("ssssss", $nowdate, $simInfo, $deviceinfo, $accountinfo, $empty, $mobile);	
			$stmt->execute();
		}

		echo "1";		
		$stmt->close();
		mysqli_close($dbc);
		
	}
	
?>
