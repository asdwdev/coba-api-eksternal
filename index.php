<?php
// ambil data user dari api
$url = "https://jsonplaceholder.typicode.com/users";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);
curl_close($ch);

// decode json -> jadi array php
$users = json_decode($response, true);

// var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">

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
    </style>
</head>

<body>

    <h2>daftar user dari api</h2>

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
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= htmlspecialchars($user["id"]); ?></td>
                    <td><?= htmlspecialchars($user["name"]); ?></td>
                    <td><?= htmlspecialchars($user["email"]); ?></td>
                    <td><?= htmlspecialchars($user["address"]["city"]); ?></td>
                    <td><?= htmlspecialchars($user["website"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>