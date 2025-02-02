<?php
require 'koneksi.php'; // Pastikan koneksi.php benar dan koneksi berhasil

// Mengambil data dari form
$tgl = date('Y/m/d');
$nik = $_POST['nik'];
$isi_laporan = $_POST['isi_laporan'];
$ft = $_FILES['foto']['name']; // Perbaikan nama field 'name'
$file_tmp = $_FILES['foto']['tmp_name']; // Perbaikan nama field 'tmp_name'
$st = 0; // Status default

// Perbaikan sintaks SQL
$sql = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES ('$tgl', '$nik', '$isi_laporan', '$ft', '$st')";

// Memindahkan file yang diunggah ke folder "foto"
if (move_uploaded_file($file_tmp, "foto/wi ha joon (3)" . $ft)) {
    if (mysqli_query($koneksi, $sql)) {
        echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan, terimakasih sudah menulis laporan'); 
                window.location.href='masyarakat.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Gagal menyimpan data ke database!'); 
                window.history.back();
              </script>";
    }
} else {
    echo "<script type='text/javascript'>
            alert('Gagal mengunggah file! Pastikan folder foto/ dapat ditulis.'); 
            window.history.back();
          </script>";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
