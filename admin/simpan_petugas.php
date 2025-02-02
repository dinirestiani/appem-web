<?php
require '../koneksi.php'; // Pastikan file koneksi.php benar dan koneksi ke database berhasil

// Ambil data dari form
$nama = $_POST['nama_petugas'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];

// Query untuk menyimpan data ke tabel petugas
$sql = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas, username, password, telp, level) 
                               VALUES ('$nama', '$user', '$pass', '$telp', '$level')");

// Cek apakah query berhasil
if ($sql) {
    echo "
    <script type='text/javascript'>
        alert('Data berhasil disimpan');
        window.location='admin.php?url=lihat_petugas';
    </script>";
} else {
    echo "
    <script type='text/javascript'>
        alert('Data gagal disimpan: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}
?>
