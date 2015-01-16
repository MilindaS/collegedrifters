<?php
$url = 'https://www.facebook.com/dialog/oauth?client_id=1414466445501627&redirect_uri=http://collegedrifters.com/facebookcallback.php';
//$url = 'https://www.facebook.com/dialog/oauth??client_id=1414466445501627&se&redirect_uri=http://collegedrifters.com/facebookcallback.php';
header('location:'.$url);
?>