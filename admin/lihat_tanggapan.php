<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>data tanggpan</title>

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
            <h6 class="m-0 font-weight-bold text-primary">data tanggapan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID tanggapan</th>
                            <th>ID pengaduan</th>
                            <th>tanggal</th>
                            <th>tanggapan</th>
                            <th>ID petugas</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        include '../koneksi.php'; // Pastikan koneksi.php sudah benar

                        // Perbaiki query dengan menambahkan koneksi
                        $sql = mysqli_query($koneksi, "SELECT * FROM tanggapan");

                        // Cek apakah query berhasil
                        if (!$sql) {
                            die("Query gagal: " . mysqli_error($conn));
                        }

                        while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_tanggapan']; ?></td>
                                    <td><?php echo $data['id_pengaduan']; ?></td>
                                    <td><?php echo $data['tgl_tanggapan']; ?></td>
                                    <td><?php echo $data['tanggapan']; ?></td>
                                    <td><?php echo $data['id_petugas']; ?></td>                                    
                                </tr>
                            <?php
                            }                            