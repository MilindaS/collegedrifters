<?php

$curl = curl_init();
curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'Https://www.googleapis.com/freebase/v1/search?query=bob&key=AIzaSyAhbehwdIrwqiiE8nd8uUAmUQbqjuEqC70',
				CURLOPT_USERAGENT => 'CURL EXAMPLE'
				));
$resp = curl_exec($curl);


curl_close($curl);
echo $resp;
?>