const formKetersediaan = document.getElementById('form-ketersediaan');
const formReservasi = document.getElementById('form-reservasi');
const hasilKetersediaan = document.getElementById('hasil-ketersediaan');
const hasilReservasi = document.getElementById('hasil-reservasi');

formKetersediaan.addEventListener('submit'),
  function (event) {
    event.preventDefault();

    const tanggalMasuk = document.getElementById('tanggal-masuk').value;
    const tanggalKeluar = document.getElementById('tanggal-keluar').value;
  };
