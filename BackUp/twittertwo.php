<?php
session_start();
$con = 'Fl2ypjPqONrqD3faJO5B7Ypm4';
$conS = 'AB7UFHLK9yVhWsneqPlPKQ9Gle2m1LVR9FR5gKOklpcd6cQifi';
$token = '711543882-d3aFcy3NVJuEEXaLhpplOcs8GG4gB1dXs3BznBxV';
$tokenS = '6hkhYartlyCntUdPRwt7kfcQETFiOx4hucTRiNLD4W3wf';


$my_sign = hash_hmac("sha1", $con, base64_decode($conS), true);


//$my_sign = strtr(base64_encode($my_sign), '+/', '-_');
$mt = microtime(); 
    $rand = mt_rand(); 
    $oauth_nonce=md5($mt . $rand); 
   $_SESSION['oauth_nonce'] = $oauth_nonce;

 
 
 
 
 
 
 $oauth = array( 
            'oauth_consumer_key' => $con,
            'oauth_nonce' => $oauth_nonce,
            'oauth_signature' => $oauth_signature,
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0',
            'OAUTH_CALLBACK'=> 'http://www.collegedrifters.com/twitter/twittercallback.php'
        );
        

$signing_key = rawurlencode($oauth_consumer_secret) . "&" . rawurlencode($token_secret);
        $base_string = 'oauth_consumer_key=' . rawurlencode($oauth['oauth_consumer_key']) . '&oauth_nonce=' . rawurlencode($oauth['oauth_nonce']) . '&oauth_token=' . rawurlencode($oauth['oauth_token']) . '&oauth_timestamp=' . rawurlencode($oauth['oauth_timestamp']) . '&oauth_version='. rawurlencode($oauth['oauth_version']) . '&oauth_signature_method=' . rawurlencode($oauth['oauth_signature_method']) . '&oauth_callback=' . rawurlencode($oauth['OAUTH_CALLBACK']);
      
        $baseS = "POST&" . rawurlencode("https://api.twitter.com/oauth/request_token") . "&" . rawurlencode($base_string);
 $callback = rawurlencode($oauth['OAUTH_CALLBACK']);
$oauth_signature = base64_encode(hash_hmac('sha1', $baseS, $signing_key, true));
 
        $_SESSION['time'] = $oauth['oauth_timestamp'];
         $_SESSION['signature'] = $oauth_signature;
         
         
         $oauthT = array( 
            'oauth_consumer_key' => $con,
            'oauth_nonce' => $oauth_nonce,
            'oauth_signature' => $oauth_signature,
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0',
            'OAUTH_CALLBACK'=> $callback
        );
        //echo $my_sign;
//oauth_consumer_key
//oauth_signature_method
//oauth_signature
//oauth_timestamp
//oauth_nonce
//oauth_version
//oauth_callback
//jhpj
$url = 'https://api.twitter.com/oauth/request_token?oauth_consumer_key=' . $oauth['oauth_consumer_key'] . '&oauth_signature_method=' . $oauth['oauth_signature_method'] . '&oauth_signature=' . $oauth['oauth_signature'] . '&oauth_timesamp=' . $oauth['oauth_timestamp'] . '&oauth_nonce=' . $oauth['oauth_nonce'] . '&oauth_version=' . $oauth['oauth_version'] . '&oauth_callback=' . $oauth['OAUTH_CALLBACK'];
echo $oauth['oauth_nonce'];
$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL, $url);
       curl_setopt($curl,CURLOPT_POST, true);
	curl_setopt($curl,CURLOPT_POSTFIELDS, $oauthT);
	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        
       $output = curl_exec($curl);       
       curl_close($curl);
        

?>