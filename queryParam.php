<?php
header("Content-Type: application/json");

$url = "https://jsonplaceholder.typicode.com/posts?userId=1";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($ch);
if ($response === null) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);
echo json_encode($data, JSON_PRETTY_PRINT);
