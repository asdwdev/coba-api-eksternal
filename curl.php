<?php
header("Content-Type: application/json");

$apiKey = "309e7b6a";
$title = "batman";

$url = "http://www.omdbapi.com/?apikey=$apiKey&s=" . urlencode($title);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true, // biar hasilnya gak langsung echo
]);

$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

curl_close($ch);

$data = json_decode($response, true);
echo json_encode($data, JSON_PRETTY_PRINT);
