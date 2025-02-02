<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
     
    switch($url) {
        case 'tulis_pengaduan':
            include 'tulis_pengaduan.php';
            break;

        case 'lihat_pengaduan':
            include 'lihat_pengaduan.php';
            break;
        case 'detail_pengaduan':
            include 'detail_pengaduan.php';
            break;
        case 'lihat_tanggapan':
            include 'lihat_tanggapan.php';
            break;

    }
} else {
    ?>
    Selamat datang di aplikasi pelaporan pengaduan masyarakat yang dibuat untuk melaporkan pelanggaran
    atau penyimpanan kejadian-kejadian yang ada pada masyarakat. <br><br>
    Anda login sebagai: <h2><b><?php echo $_SESSION['nama']; ?></b></h2>
    <?php
}
?>
