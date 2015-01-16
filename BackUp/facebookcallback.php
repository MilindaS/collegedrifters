<?php
session_start();
$curl = curl_init();

 $code = $_GET['code'];
$api = array (
'client_id'=> '1414466445501627',
'client_secret'=> 'c5e615d2fe37537666c95a8952ec740c',
//'grant_type' => 'client_credentials',
'redirect_uri'=> 'http://collegedrifters.com/facebookcallback.php',
'code'=> $code
);

$url = "https://graph.facebook.com/oauth/access_token?code=" . $api['code'] . "&client_id=" . $api['client_id'] . "&client_secret=" . $api['client_secret'] . "&redirect_uri=" . $api['redirect_uri'];

curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_POSTFIELDS, $api);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
$resp = curl_exec($curl);

curl_close($curl);
 

		
		$feed = explode('&',$resp,2);
		
		   // display the access_token
		//$fee = file_get_contents('https://graph.facebook.com/me');
		//echo $fee;
?>
<?php

$cur = curl_init();
$ur = 'https://graph.facebook.com/me?' . $feed[0];

curl_setopt($cur,CURLOPT_URL, $ur);
curl_setopt($cur, CURLOPT_HEADER, 0);

curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1); 
$res = curl_exec($cur);

curl_close($cur);
 $_SESSION['facebookTime'] = $res;
$ar = json_decode($res,true);
//echo $ar['id'];
		
		
		
		   // display the access_token
		//$fee = file_get_contents('https://graph.facebook.com/me');
		//echo $fee;
?>