<?php
header("Content-Type: application/json");

$url = "https://httpbin.org/headers";

// inisialisasi curl
$ch = curl_init();

// set opsi
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer 123456SECRET",
        "x-Custom-Header: BelajarAPI",
        "Accept: application/json"
    ]
]);

// eksekusi
$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

curl_close($ch);

// tampilkan 
echo $response;
