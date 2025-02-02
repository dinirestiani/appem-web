<?php
require '../koneksi.php'; // Pastikan file koneksi.php benar

// Ambil ID dari URL
$nik = $_GET['nik'];

// Pastikan query menggunakan sintaks yang benar
$sql = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = '$nik'");

// Periksa apakah query berhasil
if ($sql) {
    echo "
    <script type='text/javascript'>
        alert('Data berhasil dihapus');
        window.location = 'admin.php?url=lihat_masyarakat';
    </script>";
} else {
    echo "
    <script type='text/javascript'>
        alert('Data gagal dihapus: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}
?>
