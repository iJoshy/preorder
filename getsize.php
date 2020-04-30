<?php

require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$q=$_GET["q"];

$size = "";
$query = "SELECT SIZE FROM DEVICES WHERE NAME = '".$q."'";
$data = mysqli_query($dbc,$query);
//echo "<select>";											
while($row = mysqli_fetch_array($data))
{
											
	$size = $row['SIZE'];
	//echo "Size is $size";
	echo "<option value='$size'> $size </option>"; 									 	
}
									
//echo "</select>";
?>