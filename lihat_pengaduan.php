<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Lihat Pengaduan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lihat Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        require 'koneksi.php'; // Pastikan koneksi.php sudah benar

                        // Perbaiki query dengan menambahkan koneksi
                        $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]'");

                        // Cek apakah query berhasil
                        if (!$sql) {
                            die("Query gagal: " . mysqli_error($conn));
                        }

                        // Menampilkan data
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $data['id_pengaduan']; ?></td>
                                <td><?php echo $data['tgl_pengaduan']; ?></td>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['isi_laporan']; ?></td>
                                <td><img src="<?php echo $data['foto']; ?>" alt="Foto" style="width:100px; height:auto;"></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <!--button-->
                                    <a href="?url=detail_pengaduan&id=<?php echo $data['id_pengaduan']; ?>" 
                                    class="btn btn-info btn-icon-split">
                                     <span class="icon text-white-50">
                                        <i class="fas fa-info"></i>
                                        </span>
                                            <span class="text">detail</span>
                                         </a>
                                         <a href="?url=lihat_tanggapan&id=<?php echo $data['id_pengaduan']; ?>" class="btn btn-secondary btn-icon-split">
                                     <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                        </span>
                                            <span class="text">lihat tanggapan</span>
                                         </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id