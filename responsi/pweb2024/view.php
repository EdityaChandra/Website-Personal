<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Agama</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'data.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
