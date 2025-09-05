<?php
header("Content-Type: application/json");

// ambil payload yang dikirim Postman ke sistem kamu
$input = json_decode(file_get_contents("php://input"), true);

// kalau gak ada input, kasih error
if (!$input) {
    echo json_encode(["error" => "No input received"]);
    exit;
}

// URL API luar (contoh: httpbin.org/post)
$url = "https://httpbin.org/post";

// inisialisasi cURL
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
    CURLOPT_POSTFIELDS => json_encode($input), // kirim payload yang diterima
]);

$response = curl_exec($ch);
if ($response === false) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}
curl_close($ch);

// tampilkan response dari API luar
echo $response;
