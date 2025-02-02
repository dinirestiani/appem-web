<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>data laporan</title>

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
            <h6 class="m-0 font-weight-bold text-primary">data laporan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>tanggal</th>
                            <th>NIK</th>
                            <th>isi Laporan</th>
                            <th>foto</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        include '../koneksi.php'; // Pastikan koneksi.php sudah benar

                        // Perbaiki query dengan menambahkan koneksi
                        $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");

                        // Cek apakah query berhasil
                        if (!$sql) {
                            die("Query gagal: " . mysqli_error($conn));
                        }

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
                                        <a href="?url=delete_pengaduan&id=<?php echo $data['id_pengaduan']; ?>"
                                         class="btn btn-danger btn-circle"
                                         onclick="return confirm('yakin mau hapus?')">
                                         <i class="fas fa-trash"></i>                                           
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }                            