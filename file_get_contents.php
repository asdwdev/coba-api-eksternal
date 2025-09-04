<?php
header("Content-Type: application/json");

$apiKey = "309e7b6a"; // ganti dengan API key asli kalau punya
$title = "batman";

$url = "http://www.omdbapi.com/?apikey=$apiKey&s=" . urlencode($title);

$response = file_get_contents($url);
$data = json_decode($response, true);

echo json_encode($data, JSON_PRETTY_PRINT);
