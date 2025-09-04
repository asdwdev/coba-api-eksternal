<?php
header("Content-Type: application/json");

// URL API tujuan
$url = "https://jsonplaceholder.typicode.com/posts/1";

// 1. Inisialisasi cURL
$ch = curl_init();

// 2. Set opsi cURL
curl_setopt_array($ch, [
    CURLOPT_URL => $url, // alamat api
    CURLOPT_RETURNTRANSFER => true, // hasil jangan langsung echo, tapi simpan
]);

// 3. Eksekusi request
$response = curl_exec($ch);

// 4. Cek error
if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
}

// 5. Tutup koneksi
curl_close($ch);

// 6. Decode JSON ke array
$data = json_decode($response, true);

// 7. Kirim balik hasil
echo json_encode($data, JSON_PRETTY_PRINT);
