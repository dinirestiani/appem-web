<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tanggapan</title>

    <!-- Custom fonts for this template-->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div class="card shadow">
        <div class="card-header">
            Tanggapan
        </div>
          
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-6 text-left">
                    <a href="?url=verifikasi_pengaduan" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>

            <form action="simpan_tanggapan.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group col-sm-6">
    <label for="id_pengaduan">ID Pengaduan</label>
    <input type="text" name="id_pengaduan" 
           value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" 
           class="form-control" readonly>
</div>


                <div class="form-group col-sm-6">
                    <label>Tanggal Tanggapan</label>
                    <input type="text" name="tgl_tanggapan" value="<?php echo date('Y/m/d'); ?>" class="form-control" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label>Tulis Tanggapan</label>
                    <textarea class="form-control" rows="7" name="tanggapan"></textarea>
                </div>
                <div class="form-group col-sm-6">
                    <label>ID Petugas</label>
                    <input type="text" name="id_petugas" value="<?php echo isset($_SESSION['id_petugas']) ? $_SESSION['id_petugas'] : ''; ?>" class="form-control" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <input type="submit" class="btn btn-primary btn-user" value="tanggapi">
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="./js/sb-admin-2.min.js"></script>

</body>

</html>
