<?php
require '../koneksi.php'; // Pastikan file koneksi.php benar dan koneksi ke database berhasil

// Ambil data dari form
$nama = $_POST['nama_petugas'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];
$id = $_POST['id_petugas'];

// Query untuk memperbarui data di tabel petugas
$sql = mysqli_query($koneksi, "UPDATE petugas 
    SET 
        nama_petugas = '$nama',
        username = '$user',
        password = '$pass',
        telp = '$telp',
        level = '$level' 
    WHERE id_petugas = '$id'");

// Cek apakah query berhasil
if ($sql) {
    echo "
    <script type='text/javascript'>
        alert('Data berhasil diubah');
        window.location='admin.php?url=lihat_petugas';
    </script>";
} else {
    echo "
    <script type='text/javascript'>
        alert('Data gagal diubah: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}
?>
