<?php
// $ch = curl_init("https://jsonplaceholder.typicode.com/posts/1");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// var_dump($response);

$ch = curl_init("https://example.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo substr($response, 0, 200);
