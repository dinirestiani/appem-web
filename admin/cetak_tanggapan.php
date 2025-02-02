<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Tanggapan</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <h3 class="m-0 font-weight-bold text-secondary" align="center">PEMERINTAH KABUPATEN KARAWANG </h3>
            <h4 class="m-0 font-weight-bold text-secondary" align="center">DESA TANJUNGPURA KEC.KARAWANG BARAT</h4>
            <h6 class="m-0 font-weight-bold text-secondary" align="center">jalan bubulak jati baru gang padawa III RT.002 RW.007</h6>
            <br><br>
            <hr>
            <h4 class="m-0 font-weight-bold text-secondary" align="center">Laporan Data Tanggapan</h4>
            <br><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Tanggapan</th>
                            <th>ID Pengaduan</th>
                            <th>Tanggal</th>
                            <th>Tanggapan</th>
                            <th>ID Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php'; // Pastikan koneksi.php sudah benar

                        // Pastikan mengambil data dari tabel yang benar
                        $sql = mysqli_query($koneksi, "SELECT * FROM tanggapan");

                        if (!$sql) {
                            die("Query gagal: " . mysqli_error($koneksi));
                        }

                        while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                            <tr>
                                <td><?php echo isset($data['id_tanggapan']) ? $data['id_tanggapan'] : 'N/A'; ?></td>
                                <td><?php echo isset($data['id_pengaduan']) ? $data['id_pengaduan'] : 'N/A'; ?></td>
                                <td><?php echo isset($data['tgl_tanggapan']) ? $data['tgl_tanggapan'] : 'N/A'; ?></td>
                                <td><?php echo isset($data['tanggapan']) ? $data['tanggapan'] : 'N/A'; ?></td>
                                <td><?php echo isset($data['id_petugas']) ? $data['id_petugas'] : 'N/A'; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <br><br>
            <h6 class="m-0 font-weight-bold text-secondary" align="right">Bubulak, <?php echo date('d/m/Y'); ?></h6>
            <h6 class="m-0 font-weight-bold text-secondary" align="right">Petugas</h6>
            <br><br><br><br>
            <h6 class="m-0 font-weight-bold text-secondary" align="right">
                <?php 
                echo isset($_SESSION['nama']) ? $_SESSION['nama'] : "Nama tidak ditemukan";
                ?>
            </h6>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>
