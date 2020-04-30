<?php
require dirname(__FILE__) . '\SecurityHelper.php';

$nonce = SecurityHelper::generateRandomString();
//This is your domain name where. The domain will have to be enabled for you by interswitch.
$client_id = "you domain name";
//Your secret key will be given to you by interswitch.
$shared_secret_key = "you secret key";
//PwQ service url. This url is test environment url. Ensure you use the live version (ask for it) before you go live
$api_base = "http://testwebpay.interswitchng.com/quicktellercheckout/api/v1";
$endpoint = "/Transaction.json";
$url = $api_base . $endpoint;
//Set the transaction ref here
$params = array("transactionRef" => "payment transaction ref");

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

//Send your request here
$context = stream_context_create($opts);
$response = file_get_contents($_url, false, $context);

var_dump($response);