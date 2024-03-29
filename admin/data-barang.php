<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
              content="">
        <meta name="author"
              content="">

        <title>Dashboard Admin</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css"
              rel="stylesheet"
              type="text/css">
        <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css"
              rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
                id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                   href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">KASIR <sup>APP</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link"
                       href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed"
                       href="toko.php"
                       data-toggle="collapse"
                       data-target="#collapseTwo"
                       aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Toko</span>
                    </a>
                    <a class="nav-link collapsed"
                       href="data-pelanggan.php"
                       data-toggle="collapse"
                       data-target="#collapseTwo"
                       aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pelanggan</span>
                    </a>
                    <a class="nav-link collapsed"
                       href="data-pembelian.php"
                       data-toggle="collapse"
                       data-target="#collapseTwo"
                       aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Pembelian</span>
                    </a>
                    <a class="nav-link collapsed"
                       href="data-penjualan.php"
                       data-toggle="collapse"
                       data-target="#collapseTwo"
                       aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Penjualan</span>
                    </a>

                    <a class="nav-link collapsed"
                       href="data-stok-barang.php"
                       data-toggle="collapse"
                       data-target="#collapseTwo"
                       aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Stok Barang</span>
                    </a>
                    <div id="collapseTwo"
                         class="collapse"
                         aria-labelledby="headingTwo"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Components:</h6>
                            <a class="collapse-item"
                               href="buttons.html">Buttons</a>
                            <a class="collapse-item"
                               href="cards.html">Cards</a>
                        </div>
                    </div>
                </li>



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>



                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="../Logout.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0"
                            id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper"
                 class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop"
                                class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Dropdown - Messages -->

                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>


                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Data Barang -->
                    <div class="container-fluid">

                        <!DOCTYPE html>
                        <html lang="en">

                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport"
                                      content="width=device-width, initial-scale=1.0">
                                <title>Data Barang</title>
                                <style>
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                    margin-top: 20px;
                                }

                                th,
                                td {
                                    border: 1px solid #ddd;
                                    padding: 8px;
                                    text-align: left;
                                }

                                th {
                                    background-color: #4e73df;
                                    color: #ffff;
                                }

                                button {
                                    padding: 5px 10px;
                                    margin-right: 5px;
                                }
                                </style>
                            </head>

                            <body>

                                <h2>Data Barang</h2>

                                <a href="tambah-barang.php"><button class="btn btn-primary">Tambah Barang</button></a>

                                <table border="1">
                                    <tr>
                                        <th>id produk</th>
                                        <th>id toko</th>
                                        <th>nama produk</th>
                                        <th>id kategori</th>
                                        <th>harga beli</th>
                                        <th>harga jual</th>
                                        <th>stok</th>
                                        <th>aksi</th>
                                    </tr>
                                    <?php 
    include "../koneksi.php";
    $result = mysqli_query($koneksi,"SELECT * FROM produk");
    while($d = mysqli_fetch_assoc($result)):
?>
                                    <tr>
                                        <td><?= $d['id_produk']?></td>
                                        <td><?= $d['id_toko']?></td>
                                        <td><?= $d['nama_produk']?></td>
                                        <td><?= $d['id_kategori']?></td>
                                        <td><?= $d['harga_beli']?></td>
                                        <td><?= $d['harga_jual']?></td>
                                        <td><?= $d['stok']?></td>
                                        <td>
                                            <a href="edit-barang.php?id_produk=<?= $d['id_produk']?>"><button
                                                        class="btn btn-primary">Edit</button></a>
                                            <a href="delete-barang.php?id_produk=<?= $d['id_produk']?>"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                                        class="btn btn-danger">Delete</button></a>
                                        </td>


                                    </tr>
                                    <?php endwhile ?>
                                </table>

                            </body>

                        </html>
                    </div>

                    <!-- End Data Barang -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->


                            <!-- Color System -->


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->


                            <!-- Approach -->


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded"
           href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade"
             id="logoutModal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"
                                type="button"
                                data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary"
                           href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

    </body>

</html>