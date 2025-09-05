<?php
// API target
$url = "https://jsonplaceholder.typicode.com/users";

// inisialisasi cURL
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 5, // maksimal tunggu koneksi
    CURLOPT_TIMEOUT => 10        // maksimal tunggu response
]);

$response = curl_exec($ch);

// cek error cURL
if ($response === false) {
    $errorMsg = curl_error($ch);
    $users = null;
} else {
    // cek status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode !== 200) {
        $errorMsg = "API Error: HTTP $httpCode";
        $users = null;
    } else {
        // decode JSON
        $users = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errorMsg = "Invalid JSON format";
            $users = null;
        }
    }
}
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar User dari API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f4f4f4;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Daftar User dari API</h2>

    <?php if ($users === null): ?>
        <p class="error">Gagal ambil data: <?= htmlspecialchars($errorMsg) ?></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kota</th>
                    <th>Website</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['address']['city']) ?></td>
                        <td><?= htmlspecialchars($user['website']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>