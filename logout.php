<?php
session_start();

// Periksa apakah sesi 'nama' ada
if (isset($_SESSION['nama'])) {
    unset($_SESSION['nama']);  // Hapus sesi 'nama'
    session_destroy();         // Hancurkan semua sesi
    header('Location: index.php');  // Arahkan ke halaman login
} else {
    header('Location: masyarakat.php');  // Kembali ke halaman masyarakat jika belum login
    exit;
}
?>
