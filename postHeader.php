<?php
header("Content-Type: application/json");

$url = "https://httpbin.org/post";

// data yang mau dikirim
$payload = [
    "title" => "Belajar Authorization",
    "body"  => "Coba POST dengan Bearer Token",
    "userId" => 1
];

// token dummy (di dunia nyata ini hasil login JWT/OAuth)
$token = "abc123XYZ.fakeTokenValue";

// inisialisasi cURL
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $token", // 👈 header token
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload)
]);

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
