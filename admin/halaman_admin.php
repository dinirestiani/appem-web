<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Pastikan ini adalah baris pertama dalam file// Cek apakah ada parameter 'url' dalam query string
if (isset($_GET['url'])) {
    $url = $_GET['url'];
     
    switch($url) {
                case 'verifikasi_pengaduan':
                include 'verifikasi_pengaduan.php';
                break;
                case 'detail_pengaduan':
                include 'detail_pengaduan.php';
                break;
                case 'tanggapan':
                include 'tanggapan.php';
                break;
                case 'lihat_petugas';
                include 'lihat_petugas.php';
                break;
                case 'tambah_petugas';
                include 'tambah_petugas.php';
                break;
                case 'edit_petugas';
                include 'edit_petugas.php';
                break;
                case 'preview_petugas';
                include 'preview_petugas.php';
                break;
                case 'lihat_masyarakat';
                include 'lihat_masyarakat.php';
                break;
                case 'preview_masyarakat';
                include 'preview_masyarakat.php';
                break;
                case 'lihat_laporan';
                include 'lihat_laporan.php';
                break;
                case 'preview_pengaduan';
                include 'preview_pengaduan.php';
                break;
                case 'lihat_tanggapan';
                include 'lihat_tanggapan.php';
                break;
                case 'preview_tanggapan';
                include 'preview_tanggapan.php';
                break;
                

    


        // Tambahkan case lain sesuai kebutuhan
        default:
            // Jika URL tidak dikenali, bisa redirect atau tampilkan pesan
            echo "Halaman tidak ditemukan.";
            break;
    }
} else {
    // Jika tidak ada parameter 'url', tampilkan halaman utama
    ?>
    <div>
        Selamat datang di aplikasi pelaporan pengaduan masyarakat (APPEM) yang dibuat untuk melaporkan pelanggaran
        atau penyimpangan kejadian-kejadian yang ada pada masyarakat. <br><br>
        Anda login sebagai: <h2><b><?php echo ($_SESSION['nama']) ; ?></b></h2> 
    </div>

    <?php
    include '../koneksi.php'; // Pastikan jalur file koneksi benar

    // Query untuk menghitung jumlah pengaduan dengan status 'proses'
    $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
    
    // Cek apakah query berhasil
    if (!$sql) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    $cek = mysqli_num_rows($sql); // Menghitung jumlah baris hasil query
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