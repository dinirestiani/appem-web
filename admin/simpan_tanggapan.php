<?php
require '../koneksi.php';
$id_pengaduan = $_POST['id_pengaduan'];
$tgl = $_POST['tgl_tanggapan'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$st = 'selesai';

$sql = mysqli_query($koneksi, "INSERT INTO tanggapan(id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')");
$update_st = mysqli_query($koneksi, "UPDATE pengaduan SET status='$st' WHERE id_pengaduan='$id_pengaduan'");

if ($sql && $update_st) {
    ?>
    <script type="text/javascript">
        alert('Data sudah ditanggapi');
        window.location = "admin.php?url=verifikasi_pengaduan";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert('Gagal menyimpan data tanggapan');
        window.history.back();
    </script>
    <?php
}
?>
