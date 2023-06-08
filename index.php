<?php
    session_start();
    include 'function.php';
    $koneksi = new mysqli('localhost', 'root', '', 'modul-perpustakaan');
    // if ($_SESSION['level']) {
    //     header('location:login.php');

    if (@$_SESSION['admin'] || @$_SESSION['user']) {
        ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PERPUSTAKAAN | DASHABOARD</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- stayle -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">PERPUSTAKAAN</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            <!-- <div style="color: white; padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div> -->
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu" >
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                        <h2>Welcome Back Admin,<?php echo @$_SESSION['nama']; ?></h5>
                    </li>
                    <li >
                        <a style="font-size: 15px;" href="?index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a href="?page=petugas"><i class="fa fa-dashboard fa-3x"></i>Petugas</a>
                    </li> -->
                    <li >
                        <a style="font-size: 15px;" href="?page=mahasiswa"><i class="fa fa-users fa-3x"></i>Mahasiswa</a>
                    </li>
                    <li>
                        <a  style="font-size: 15px;"href="?page=buku"><i class="fa fa-book fa-3x "></i></i>Data Buku</a>
                    </li>
                    <li> 
                        <a  style="font-size: 15px;"href="?page=transaksi"><i class="fa fa-dashboard fa-3x"></i>Transaksi</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                                          $page = @$_GET['page'];
        $aksi = @$_GET['aksi'];

        if ($page == 'buku') {
            if ($aksi == '') {
                include 'page/buku/buku.php';
            } elseif ($aksi == 'tambah') {
                include 'page/buku/tambah.php';
            } elseif ($aksi == 'ubah') {
                include 'page/buku/ubah.php';
            } elseif ($aksi == 'hapus') {
                include 'page/buku/hapus.php';
            }
        } elseif ($page == 'mahasiswa') {
            if ($aksi == '') {
                include 'page/mahasiswa/mahasiswa.php';
            } elseif ($aksi == 'tambah') {
                include 'page/mahasiswa/tambah.php';
            } elseif ($aksi == 'ubah') {
                include 'page/mahasiswa/ubah.php';
            } elseif ($aksi == 'hapus') {
                include 'page/mahasiswa/hapus.php';
            }
        } elseif ($page == 'transaksi') {
            if ($aksi == '') {
                include 'page/transaksi/transaksi.php';
            } elseif ($aksi == 'tambah') {
                include 'page/transaksi/tambah.php';
            } elseif ($aksi == 'kembali') {
                include 'page/transaksi/kembali.php';
            } elseif ($aksi == 'perpanjang') {
                include 'page/transaksi/perpanjang.php';
            }
        } elseif ($page == '') {
            include 'home.php';
        }
        ?>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php

    } else {
        header('location:login.php');
    }
    ?>
