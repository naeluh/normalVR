<?php

$state = 'Ohio';
$url = 'http://en.wikipedia.org/w/api.php?action=parse&page='. $state .'&format=json&prop=text';
$ch = curl_init($url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript"); // required by wikipedia.org server
$c = curl_exec($ch);

$json = json_decode($c);

print_r($json);

?>
