<?php               
$pageContent = file_get_contents('http://freegeoip.net/json/' . $_SERVER['REMOTE_ADDR']);
$parsedJson  = json_decode($pageContent);

$country = htmlspecialchars($parsedJson->country_code);

if ($country == "NG")
{
	echo "1"; 
}
else if ($country == "US")
{
	echo "2"; 
}
else
{
	echo "0";
}

?>