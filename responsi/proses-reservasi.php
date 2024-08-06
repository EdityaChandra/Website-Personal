<?php

// Mendapatkan nilai dari form reservasi
$namaTamu = htmlspecialchars(trim($_POST['nama-tamu'])); // Mendapatkan nilai nama tamu
$tipeKamar = htmlspecialchars(trim($_POST['tipe-kamar'])); // Mendapatkan nilai tipe kamar
$tanggalMasuk = htmlspecialchars(trim($_POST['tanggal-masuk'])); // Mendapatkan nilai tanggal masuk
$tanggalKeluar = htmlspecialchars(trim($_POST['tanggal-keluar'])); // Mendapatkan nilai tanggal keluar

// Mengecek apakah semua data telah diisi
if (empty($namaTamu) || empty($tipeKamar) || empty($tanggalMasuk) || empty($tanggalKeluar)) {
    // Jika ada data yang kosong, tampilkan pesan error
    echo "Semua data harus diisi!";
    exit; // Keluar dari program
}

// Mengecek apakah tanggal masuk dan tanggal keluar valid
if (strtotime($tanggalMasuk) === false || strtotime($tanggalKeluar) === false) {
    // Jika tanggal tidak valid, tampilkan pesan error
    echo "Tanggal tidak valid!";
    exit; // Keluar dari program
}

// Mengecek apakah tanggal keluar lebih besar dari tanggal masuk
if (strtotime($tanggalKeluar) <= strtotime($tanggalMasuk)) {
    // Jika tanggal keluar tidak lebih besar dari tanggal masuk, tampilkan pesan error
    echo "Tanggal keluar harus setelah tanggal masuk!";
    exit; // Keluar dari program
}

// Membuat string data reservasi
$dataReservasi = "$namaTamu,$tipeKamar,$tanggalMasuk,$tanggalKeluar\n";

// Menyimpan data reservasi ke file
if (file_put_contents('data-reservasi.txt', $dataReservasi, FILE_APPEND) === false) {
    // Jika gagal menyimpan data, tampilkan pesan error
    echo "Terjadi kesalahan saat menyimpan data reservasi!";
    exit; // Keluar dari program
}

// Jika semua proses berhasil, tampilkan pesan sukses
echo "Reservasi berhasil dilakukan!";

?>