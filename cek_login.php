<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

// Menggunakan prepared statement dengan placeholder
$stmt = $koneksi->prepare("SELECT * FROM masyarakat WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);  // 'ss' untuk dua parameter string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    session_start();
    $_SESSION['nama'] = $data['username'];  // Ambil nama yang sesuai dari hasil query
    $_SESSION['nik'] = $data['nik'];
    header('Location: masyarakat.php');
} else {
    echo "<script type='text/javascript'>
            alert('Username atau Password tidak ditemukan'); 
            window.location.href='index.php';
          </script>";
}

$stmt->close();
$conn->close();
?>
