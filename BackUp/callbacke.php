<?php
session_start();

$curl = curl_init();

 $code = $_GET['code'];
$api = array (
'client_id'=> 'bf949073a932485e82b8d92b97c7a67d',
'client_secret'=> '7ac73a98a29e4ba8984cb0e3deae0f05',
'grant_type' => 'authorization_code',
'redirect_uri'=> 'http://collegedrifters.com/callbacke.php',
'code'=> $code
);
$code_string = "client_id=" . $api['client_id'] . "&client_secret=" . $api['client_secret'] . "&grant_type=" . $api['grant_type'] . "&redirect_uri=" . $api['redirect_uri'] . "&code=" . $api['code'];
$url = "https://api.instagram.com/oauth/access_token?client_id=" . $api['client_id'] . "&client_secret=" . $api['client_secret'] . "&grant_type=" . $api['grant_type'] . "&redirect_uri=" . $api['redirect_uri'] . "&code=" . $api['code'];

curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POST, true);
curl_setopt($curl,CURLOPT_POSTFIELDS, $api);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
$resp = curl_exec($curl);

curl_close($curl);

$arr = json_decode($resp,true);
		 $acc = $arr['access_token'];   // display the access_token
		echo $arr['user']['username'];   // display the username
	$profilePic = $arr['user']['profile_picture'];
	
	$fee = file_get_contents('https://api.instagram.com/v1/users/self/feed?access_token=' . $acc);
		echo "<a href='coneks.php'><h1>Coneks</h1></a> ";
		$_SESSION['instagram'] = $fee;
?>
?>
<?
$host = 'localhost';
$user = 'colleged_coneks';
$password = 'Pimp0327';
$database = 'colleged_coneks';

$connect = mysqli_connect($host, $user, $password, $database);
$userID = $arr['user']['id'];

mysqli_close($connect);
?>
 
<!Doctype html>
<html>
<head>
<style>
</style>
</head>
<body>
<img src="<?php echo $profilePic ?>" >

</body>
</html>