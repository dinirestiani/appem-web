<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../koneksi.php'; // Perhatikan jalur file koneksi

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch($url) {
        
        case 'verifikasi_pengaduan':
            include 'verifikasi_pengaduan.php';
            break;
            case 'detail_pengaduan':
                include 'detail_pengaduan.php';
                break;
    }
} else {
    echo "Selamat datang di aplikasi pelaporan pengaduan masyarakat.<br><br>";
    echo "Anda login sebagai: <h2><b>" . $_SESSION['nama'] . "</b></h2>";

    include '../koneksi.php'; // Perhatikan jalur file koneksi
    $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'");
    $cek = mysqli_num_rows($sql);
    ?>
    <br>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan pengaduan :</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">ada <?php echo $cek; ?> laporan pengaduan dari masyarakat</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comment fa-4x text-gray-300"></i>
                        <span class="badge badge-danger badge-counter"><?php echo $cek; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
