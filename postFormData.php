<?php
header("Content-Type: application/json");

$url = "https://httpbin.org/post";

// data yang mau dikirim
$payload = [
    "name" => "arya",
    "age" => 21,
];

// inisialisasi curl
$ch = curl_init();

// set opsi
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
    CURLOPT_POSTFIELDS => http_build_query($payload) // ubah array ke query string
]);

// eksekusi
$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

curl_close($ch);

// decode hasil
$data = json_decode($response, true);

// tampilkan
echo json_encode($data, JSON_PRETTY_PRINT);
