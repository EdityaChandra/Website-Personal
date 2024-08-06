<?php

// Fungsi untuk membaca reservasi dari file
function readReservations($filename) {
    // Inisialisasi array untuk menyimpan reservasi
    $reservations = [];
    
    // Cek apakah file ada
    if (!file_exists($filename)) {
        // Jika file tidak ada, kembalikan array kosong
        return $reservations;
    }
    
    // Buka file untuk dibaca
    $file = fopen($filename, 'r');
    
    // Baca file baris per baris
    while (($line = fgetcsv($file)) !== FALSE) {
        // Tambahkan reservasi ke array
        $reservations[] = [
            'nama' => $line[0], // Nama tamu
            'tipe_kamar' => $line[1], // Tipe kamar
            'tanggal_masuk' => $line[2], // Tanggal masuk
            'tanggal_keluar' => $line[3] // Tanggal keluar
        ];
    }
    
    // Tutup file
    fclose($file);
    
    // Kembalikan array reservasi
    return $reservations;
}

// Ambil tanggal masuk dan tanggal keluar dari form
$tanggalMasuk = $_POST['tanggal-masuk'];
$tanggalKeluar = $_POST['tanggal-keluar'];

// Cek apakah tanggal masuk dan tanggal keluar sudah diisi
if (empty($tanggalMasuk) || empty($tanggalKeluar)) {
    // Jika belum diisi, tampilkan pesan error
    echo "Tanggal masuk dan tanggal keluar harus diisi!";
    exit;
}

// Cek apakah tanggal keluar sudah sesuai (setelah tanggal masuk)
if (strtotime($tanggalKeluar) <= strtotime($tanggalMasuk)) {
    // Jika tidak sesuai, tampilkan pesan error
    echo "Tanggal keluar harus setelah tanggal masuk!";
    exit;
}

// Baca reservasi dari file
$reservations = readReservations('data-reservasi.txt');

// Inisialisasi array untuk menyimpan ketersediaan kamar
$availableRooms = [
    'standard' => 10, // Jumlah kamar standard
    'deluxe' => 5, // Jumlah kamar deluxe
    'suite' => 3 // Jumlah kamar suite
];

// Loop reservasi untuk menghitung ketersediaan kamar
foreach ($reservations as $reservation) {
    // Cek apakah reservasi berada dalam rentang tanggal yang dipilih
    if (!(($tanggalKeluar <= $reservation['tanggal_masuk']) || ($tanggalMasuk >= $reservation['tanggal_keluar']))) {
        // Jika reservasi berada dalam rentang tanggal, kurangi ketersediaan kamar
        $availableRooms[strtolower($reservation['tipe_kamar'])]--;
    }
}

// Tampilkan tabel ketersediaan kamar
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead>";
echo "<tr><th>Tipe Kamar</th><th>Tersedia</th></tr>";
echo "</thead>";
echo "<tbody>";

// Loop ketersediaan kamar untuk menampilkan dalam tabel
foreach ($availableRooms as $roomType => $available) {
    echo "<tr>";
    echo "<td>" . ucfirst($roomType) . "</td>"; // Tipe kamar
    echo "<td>" . $available . "</td>"; // Ketersediaan kamar
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>