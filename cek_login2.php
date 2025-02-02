<?php
require 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

// Menggunakan prepared statement dengan placeholder
$stmt = $koneksi->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);  // 'ss' untuk dua parameter string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    
    session_start(); // Memulai sesi setelah koneksi berhasil dan data ditemukan

    // Cek level pengguna
    if ($data['level'] == "admin") {
        session_start();
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['user'] = $user;  
        $_SESSION['nama'] = $data['nama_petugas'];
        $_SESSION['level'] = $data['level'];
        header('Location: admin/admin.php');
        exit();
    } else if ($data['level'] == "petugas") {
        session_start();
        $_SESSION['user'] = $user;  
        $_SESSION['nama'] = $data['nama_petugas'];
        $_SESSION['level'] = $data['level'];
        header('Location: petugas/petugas.php');
        exit();
    }
} else {
    echo "<script type='text/javascript'>
            alert('Username atau Password tidak ditemukan'); 
            window.location.href='index2.php';
          </script>";
}

$stmt->close();
$koneksi->close();
?>
