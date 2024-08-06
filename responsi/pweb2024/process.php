<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = htmlspecialchars($_POST['nim']);
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $religion = htmlspecialchars($_POST['religion']);

    $data = "$nim,$name,$address,$email,$username,$religion\n";

    file_put_contents("students.txt", $data, FILE_APPEND | LOCK_EX);

    echo "Data berhasil disimpan! <a href='index.html'>Kembali ke Menu Utama</a>";
}
?>
