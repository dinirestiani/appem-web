<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lihat Tanggapan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div class="card shadow">
        <div class="card-header">
            Lihat Tanggapan
        </div>
        <div class="card-body">
            <div class="form-group col-sm-6">
                <a href="?url=lihat_pengaduan" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                <?php
                require 'koneksi.php'; 

                // Pastikan koneksi berhasil
                if ($koneksi) {
                    // Perbaiki query dengan menambahkan koneksi
                    $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan, tanggapan WHERE tanggapan.id_pengaduan='$_GET[id]' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");
                    
                    // Cek apakah query berhasil
                    if (!$sql) {
                        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                    } else {
                        $cek = mysqli_num_rows($sql);
                        if ($cek < 1) { // Jika tidak ditemukan
                            echo "<font color='red'>Mohon bersabar, pengaduan belum ditanggapi.</font>";
                        } else {
                            $data = mysqli_fetch_array($sql);
                            ?>
                            <div class="form-group col-sm-6">
                                <label>Tanggal Tanggapan</label>
                                <input type="text" name="tgl_tanggapan" value="<?php echo $data['tgl_tanggapan']; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Tulis Laporan</label>
                                <textarea class="form-control" rows="7" name="isi_laporan" readonly><?php echo $data['isi_laporan']; ?></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Tulis Tanggapan</label>
                                <textarea class="form-control" rows="7" name="tanggapan" readonly><?php echo $data['tanggapan']; ?></textarea>
                            </div>
                            <?php 
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>Koneksi gagal.</div>";
                }
                ?>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>