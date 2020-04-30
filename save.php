<?php

	require_once('connectionvars.php');
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$fullname= mysqli_real_escape_string($dbc, $_GET['fullname']);
	$mb= mysqli_real_escape_string($dbc, $_GET['mb']);
	$email= mysqli_real_escape_string($dbc, $_GET['email']);
	$address= mysqli_real_escape_string($dbc, $_GET['address']);
	$model= mysqli_real_escape_string($dbc, $_GET['model']);
	$color= mysqli_real_escape_string($dbc, $_GET['color']);
	$storage= mysqli_real_escape_string($dbc, $_GET['storage']);
	$nowdate = date("Y-m-d H:i:s");

	
	if(empty($fullname) || empty($mb))
	{
		header('Location: index.php');
		exit;
	}

			
	//Connect and Log transaction on local db
	try
	{
	    
		$id = "0"; $empty = ""; $zero = "0";
			 
		$stmt = $dbc->prepare("INSERT INTO iphone6reg VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");	
		$stmt->bind_param("issssssss", $id, $nowdate, $fullname, $mb, $email, $address, $model, $color, $storage);	
		$stmt->execute();
		
		echo "successfully registered";
	
	}
	catch(Exception $e)
	{
		echo "oops, error";
	}

 									 	
?>