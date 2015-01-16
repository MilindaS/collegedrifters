<?php
$curl = curl_init();

$api = array (
'oauth_consumer_key'=> 'U89RmhebYHcMLYFSS9zu9Q',
'oauth_nonce' => '4395c41c8756412d60ef7f547187d2c',
'oauth_signature'=> 'xFnBACO%2FRUNCglq%2FTPjkfXSgaOA%3D',
'oauth_signature_method' => 'HMAC-SHA1',
'oauth_timestamp'=>'1401221853',
'oauth_token'=>'711543882-d3aFcy3NVJuEEXaLhpplOcs8GG4gB1dXs3BznBxV',
'oauth_callback'=>'http://collegedrifters.com/',
'oauth_version'=>'1.0'
);

$url = "https://api.instagram.com/oauth/access_token?oauth_consumer_key=" . $api['oauth_consumer_key'] . "&oauth_nonce=" . $api['oauth_nonce'] . "&oauth_signature=" . $api['oauth_signature'] . "&oauth_signature_method=" . $api['oauth_signature_method'] . "&oauth_timestamp=" . $api['oauth_timestamp'] . "&oauth_token=" . $api['oauth_token'] . "&oauth_callback=" . $api['oauth_callback'] . "&oauth_version=" . $api['oauth_version'];

curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_POSTFIELDS, $api);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 


$resp = curl_exec($curl);

curl_close($curl);

$arr = json_decode($resp,true);
		echo $arr['access_token'];   // display the access_token
		echo $arr['user']['username'];   // display the username
	$profilePic = $arr['user']['profile_picture'];
?>