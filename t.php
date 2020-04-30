
<?php

require_once('SecurityHelper.php');
require_once('connectionvars.php');

echo("<center>Authenticating...</center>");
//$ref = "FBN|Web|3PWQ0001|ETID|260313141357|00003868";
//$ref = "FBN|Web|3PWQ0001|ETID|090413170400|00006066";
$ref = "FBN|Web|3PWQ0001|ETID|110413100454|00002642";
$custid = "144000000091";
$query = "";


$nonce = SecurityHelper::generateRandomString();

$client_id = "preorder.etisalat.com.ng";

$shared_secret_key = "E9300DJLXKJLQJ2993N1190023";

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
	'shared_secret_key' => $shared_secret_key
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

	
if($isw_response == '00')
{			
	header('Location: receipt_s.php?custid=' . $custid . '&ref=' . $ref);
}
else
{
	header('Location: receipt_f.php?custid=' . $custid. '&ref=' . $ref);
}



?>