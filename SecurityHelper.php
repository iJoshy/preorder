<?php

class SecurityHelper {

	/*
	* Converts key, value dictionary to query string
	*/
	public static function to_query($params) {
		return urldecode(http_build_query($params));
	}

	/*
	* Returns Authorization Token Expected in Header for
	* request to interswitch api.
	*
	* $client_id.
	*/
	public static function get_authorization_token($client_id) {
		$token = "InterswitchAuth " . base64_encode($client_id);
		return $token;
	}

	/*
	* Calculate signature to be put in request header
	*
	* $params['http_verb'] => request method
	* $params['url'] => final request url with query string
	* $params['timestamp']
	* $params['nonce']
	* $params['client_id']
	* $params['shared_secret_key']
	* $params['additional_elements']
	*/
	public static function calculate_signature($params) {
		$baseStringToBeSigned = 
			$params['http_verb'] . "&" . $params['url'] . "&" . 
			$params['timestamp'] . "&" . $params['nonce'] . "&" . 
			$params['client_id'] . "&" . $params['shared_secret_key'];


		if (array_key_exists('additional_elements', $params)){ 
			$additional_elements = $params['additional_elements'];
			foreach($params as $param) {
				$baseStringToBeSigned += "&" . 
					SecurityHelper::url_encode($param);
			}
		}

		$signature = hash('sha512', $baseStringToBeSigned);
		$signature = SecurityHelper::hex_to_64($signature);
		return $signature;
	}

	public static function url_encode($url, $params=NULL) {
		if ($params != NULL) {
			if (count($params) > 0) {
				$url = $url . "?" . SecurityHelper::to_query($params);
			}
		}

		$url = urlencode($url);
		return $url;
	}

	public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	private static function hex_to_64($hex) { 
		return base64_encode(pack("H*",$hex));
	} 

}