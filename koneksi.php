<?php

$host = "localhost";  // Sesuaikan dengan konfigurasi server
$username = "root";   // Sesuaikan dengan username database
$password = "";       // Biasanya kosong untuk XAMPP
$dbname = "appem";  // Ganti dengan nama database

$koneksi= mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk memeriksa login
$stmt = $koneksi->prepare("SELECT * FROM masyarakat WHERE username = ? AND password = ?");
?>
