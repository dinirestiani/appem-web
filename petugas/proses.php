<?php 
include '../koneksi.php';

// Pastikan id_pengaduan ada di dalam GET
if (isset($_GET['id'])) {
    $id_pengaduan = $_GET['id'];

    // Menggunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("UPDATE pengaduan SET status='proses' WHERE id_pengaduan=?");
    $stmt->bind_param("s", $id_pengaduan); // 's' untuk string

    if ($stmt->execute()) {
        header('Location: ?url=verifikasi_pengaduan');
        exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $stmt->error; // Menampilkan error jika query gagal
    }

    $stmt->close();
} 
$koneksi->close();
?>