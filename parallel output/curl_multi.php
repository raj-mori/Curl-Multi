<?php

$ch1 = curl_init();
$ch2 = curl_init();
$ch3 = curl_init();

// set URL and other appropriate options
curl_setopt($ch1, CURLOPT_URL, "http://localhost/a.txt");
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_URL, "http://localhost/b.txt");
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch3, CURLOPT_URL, "http://localhost/c.txt");
curl_setopt($ch3, CURLOPT_HEADER, 0);

//create the multiple cURL handle
$mh = curl_multi_init();

//add the two handles
curl_multi_add_handle($mh, $ch1);
curl_multi_add_handle($mh, $ch2);
curl_multi_add_handle($mh, $ch3);

$running = null;
//execute the handles
do {
    curl_multi_exec($mh, $running);
} while ($running > 0);

//close all the handles
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_remove_handle($mh, $ch3);
curl_multi_close($mh);
?>
 