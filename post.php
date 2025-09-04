<?php
header("Content-Type: application/json");

$url = "https://jsonplaceholder.typicode.com/posts";

// data yang mau dikirim
$payload = [
    "title" => "Belajar API dengan cURL",
    "body"  => "Halo ini percobaan POST request",
    "userId" => 1
];

// inisialisasi cURL
$ch = curl_init();

// set opsi
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,      // supaya hasilnya bisa disimpan ke variabel
    CURLOPT_POST => true,                // method = POST
    CURLOPT_HTTPHEADER => ["Content-Type: application/json"], // header JSON
    CURLOPT_POSTFIELDS => json_encode($payload),              // body JSON
]);

// kirim form-data (x-www-form-urlencoded)
// $payload = [
//     "name" => "Farhan",
//     "age" => 20
// ];

// curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

// eksekusi
$response = curl_exec($ch);

// cek error
if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

// tutup koneksi
curl_close($ch);

// decode JSON
$data = json_decode($response, true);

// tampilkan
echo json_encode($data, JSON_PRETTY_PRINT);
