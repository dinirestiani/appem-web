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

    <title>Data Petugas</title>

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
        <h6 class="m-0 font-weight-bold text-secondary" align="center"> jalan bubulak jati baru gang padawa III RT.002 RW.007</h6>
        <br><br><hr>
        <h4 class="m-0 font-weight-bold text-secondary" align="center">laporan data masyarakat</h4>
        <br><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                        <tr>
                            <th>nik</th>
                            <th>nama</th>
                            <th>username</th>
                            <th>password</th>
                            <th>telepon</th>
                        </tr>
                    
                    
                    <tbody>
                        <?php
                        include '../koneksi.php'; // Pastikan koneksi.php sudah benar

                        // Query untuk mengambil data dari tabel petugas
                        $sql = mysqli_query($koneksi, "SELECT * FROM masyarakat");

                        // Cek apakah query berhasil
                        if (!$sql) {
                            die("Query gagal: " . mysqli_error($koneksi));
                        }

                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['telp']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
                <br>
                <h6 class="m-0 font-weight-bold text-secondary" align="right">bubulak, <?php echo date('d/m/Y'); ?></h6>
                <h6 class="m-0 font-weight-bold text-secondary" align="right">petugas</h6>
                <br><br><br><br>
                <h6 class="m-0 font-weight-bold text-secondary" align="right">
    <?php 
    if (isset($_SESSION['nama'])) {
        echo $_SESSION['nama'];
    } else {
        echo "Nama tidak ditemukan";
    }
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
