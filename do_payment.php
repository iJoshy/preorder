<?php

require_once('SecurityHelper.php');
require_once('connectionvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySql Server');

$ref = $_POST['tx_ref'];
$custid = $_GET['params'];
$query = "";

$nonce = SecurityHelper::generateRandomString();

$client_id = "preorder.etisalat.com.ng";

$api_base = "https://paywith.quickteller.com/api/v1";

$endpoint = "/Transaction.json";
$url = $api_base . $endpoint;

$params = array("transactionRef" => $ref);

$encoded_url = SecurityHelper::url_encode($url, $params);
$authorization_token = SecurityHelper::get_authorization_token($client_id);

$timestamp = time();
$_url = $url . "?" . SecurityHelper::to_query($params);

$_params = array(
	'http_verb' => "GET",
	'url' => $encoded_url,
	'timestamp' => $timestamp,
	'nonce' => $nonce,
	'client_id' => $client_id,
	'shared_secret_key' => SECRET_KEY
);

$signature = SecurityHelper::calculate_signature($_params);

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header' => "nonce: $nonce\r\n" .
              	"Authorization: $authorization_token\r\n" .
              	"signature: $signature\r\n" .
              	"timestamp: $timestamp\r\n"
  )
);

$context = stream_context_create($opts);
$response = file_get_contents($_url, false, $context);

$obj = json_decode($response);
$isw_response = $obj->{'ResponseCode'};
$amount = $obj->{'Amount'};
$amount = $amount / 100;


$stmt = "";
		 
$stmt = $dbc->prepare("UPDATE iphone6payment SET amount = ?, iswresponse = ?, transref = ? WHERE customerid = ?");	
$stmt->bind_param("ssss", $amount, $isw_response, $ref, $custid);	
$stmt->execute();


$stmt = "";
		 
$stmt = $dbc->prepare("SELECT message FROM responsecode WHERE id = ?");	
$stmt->bind_param("s", $isw_response);	
$stmt->execute();


$msg = "";
$data = $stmt->get_result();
while($row = mysqli_fetch_array($data))
{
	$msg = $row['message'];
}

mysqli_close($dbc);	
	
if($isw_response == '00')
{	
	header('Location: receipt_s.php?custid=' . $custid . '&ref=' . $ref);	
}
else
{
	header('Location: receipt_f.php?msg=' . $msg . '&custid=' . $custid. '&ref=' . $ref);
}


?>