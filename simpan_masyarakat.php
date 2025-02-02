<?php 
require 'koneksi.php'; // Pastikan koneksi.php ada dan benar

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];

// Pastikan koneksi menggunakan variabel $conn dari koneksi.php
$sql = "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES ('$nik', '$nama', '$user', '$pass', '$telp')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script type='text/javascript'>
            alert('Data Berhasil Disimpan, Silahkan Gunakan Untuk Login'); 
            window.location.href='index.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
