<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
  echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
} else {
?>
  <?php
  include "../koneksi.php";
  $query = "select max(id_pelanggan) as maxKode from t_pelanggan";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($hasil);
  $idpelanggan = $data['maxKode'];

  $no_urut = (int) substr($idpelanggan, 3, 3);

  $no_urut++;
  $char = "P";
  $idpelanggan = $char . sprintf("%03s", $no_urut);


  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bintang Utama Komputer| Transaksi </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Dasboard</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Hubungi Kami</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a href="logout.php" class="nav-link">

              <p><i class="fas fa-sign-out-alt"></i></i><b> Logout </b></p>
            </a>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <span class="brand-text font-weight-light"> Bintang Utama Komputer</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    DASBOARD
                  </p>
                </a>
              </li>

              <li class="nav-header">DATA MASTER</li>
              <li class="nav-item">
                <a href="pelanggan.php" class="nav-link">
                  <i class="nav-icon fas fa-user-tag"></i>
                  <p>
                    PELANGGAN
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    LAYANAN
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="jasa.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>DAFTAR JASA REPARASI</p>
                    </a>
                  </li>


              </li>

            </ul>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  STOK SPAREPART
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="sparepart.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DAFTAR STOK SPAREPART</p>
                  </a>
                </li>


            </li>

            </ul>
            </li>
            <li class="nav-header">DATA SERVIS MASUK </li>
            <li class="nav-item">
              <a href="servis.php" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Input Servis </p>
              </a>
            </li>

            <li class="nav-header">DATA TRANSAKSI</li>
            <li class="nav-item">
              <a href="transaksi-head.php" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>TRANSAKSI</p>
              </a>
            </li>
            <li class="nav-header">LAPORAN</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>
                  Jenis Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="laporan-transaksi.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Laporan Transaki</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan-pelanggan.php" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Laporan Data Pelanggan</p>
                  </a>
                </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">

              <h1 class="m-0 text-dark" align="center"></h1>
            </div><!-- /.col -->
            <!-- /.col -->
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!--row -->
            <!-- /.card -->

            <div class="card ">
              <div class="card-header" align="right">
                <br>
                <h2 align="Center" class="m-0 text-dark">Transaksi Reparasi </h2>
                <!-- <a class="btn btn-warning" href="form_input_servis.php" ><i class="fas fa-plus nav-icon"></i> Tambah</a> -->
                <br>
              </div>


              <!-- Modal - Validasi Hapus -->
              <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      Anda yakin ingin Membatalkan transaksi ini ?<br><br>
                      <a class="btn btn-warning btn-ok"> Ya </a>
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Tidak </button>
                    </div>
                  </div>
                </div>
              </div>


              <!-- /Modal - Validasi -->
              <!-- Modal - Validasi Hapus -->
              <div class="modal fade" id="konfirmasi_selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      Anda yakin Barang Ini Telah Selesai ?<br><br>
                      <a class="btn btn-success btn-ok"> Selesai </a>
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Belum </button>
                    </div>
                  </div>
                </div>
              </div>


              <!-- /Modal - Validasi -->
              <!-- /.card-header -->
              <div class="card-body">

                <table id="pelanggan" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>ID Reparasi</th>
                      <th>Tanggal Reparasi</th>
                      <th>Nama Pelanggan</th>
                      <th>Pembelian</th>
                      <th>aksi</th>

                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php include "../koneksi.php";
                    $no = 0;
                    $data = mysqli_query($koneksi, "select * from t_servis_head inner join t_pelanggan on t_servis_head.id_pelanggan=t_pelanggan.id_pelanggan where status='selesai' ");
                    while ($d = mysqli_fetch_array($data)) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo "$no"; ?> </td>
                        <td><a href="struk_servis.php?id_servis=<?php echo $d['id_servis']; ?>"><?php echo $d['id_servis']; ?></a> </td>
                        <td><?php echo "$d[tanggal_servis]"; ?> </td>
                        <td><?php echo "$d[nama_pelanggan]"; ?> </td>


                        <td align="center">
                          <a class='btn btn-success' style="color:white;" href="form_input_det_jasa.php?id_servis=<?php echo "$d[id_servis]"; ?>">Jasa</a>

                          <a class='btn btn-primary' style="color:white;" href="form_input_det_sparepart.php?id_servis=<?php echo "$d[id_servis]"; ?>">Sparepart</a>
                          <a class='btn btn-danger  ' style="color:white;" href="transaksi_pembayaran.php?id_servis=<?php echo "$d[id_servis]"; ?>">Bayar</a>
                        </td>

                        <td align="center">

                          <a class='btn btn-warning' data-toggle='modal' data-target='#konfirmasi_hapus' data-href="batal_transaksi.php?id_servis=<?php echo "$d[id_servis]"; ?>">Batal</a>

                        </td>
                      </tr>
                    <?php } ?>
                  <tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

              <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->


        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2023&nbsp; </strong>

        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.0-rc.5
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
      $(function() {
        $("#pelanggan").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>
    <script type="text/javascript">
      //Hapus Data
      $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      });
    </script>
    <!-- Modal - Validasi -->
    <script type="text/javascript">
      //Hapus Data
      $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      });
    </script>
    <!-- Validasi Selesai -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#konfirmasi_selesai').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      });
    </script>
    <!-- Modal - Validasi -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#konfirmasi_selesai').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      });
    </script>


    <div id="message<?php echo $d['id_pelanggan']; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
            <?php echo $row['id']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </body>

  </html>
<?php } ?>