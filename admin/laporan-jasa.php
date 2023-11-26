<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
  echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
} else {
?>


  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Bintang Utama Komputer | Laporan </title>
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
        <?php

        include "navbar.php";

        ?>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php

        include "siddebar-1.php";

        ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Laporan </h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">HomeHome</a></li>
                  <li class="breadcrumb-item active">reparasi</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!--row -->
            <!-- /.card -->

            <div class="card ">
              <br>
              <h2 align="Center" class="m-0 text-dark">Laporan Penjualan Jasa</h2>
              <div class="card-header" align="right">
              </div>

              <!-- /.card-header -->
              <div class="card-body" style="width:80%;margin:0 auto;">

                <div class="container">
                  <div class="panel">
                    <div class="panel-heading">
                      <h4>Filter Laporan</h4>
                    </div>
                    <div class="panel-body">

                      <form action="laporan-jasa.php" method="get">
                        <table class="table table-bordered table-striped">
                          <tr>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th width="1%"></th>
                          </tr>
                          <tr>
                            <td>
                              <br />
                              <input type="date" name="tgl_dari" class="form-control">
                            </td>
                            <td>
                              <br />
                              <input type="date" name="tgl_sampai" class="form-control">
                              <br />
                            </td>
                            <td>
                              <br />
                              <input type="submit" class="btn btn-primary" value="Filter">
                            </td>
                          </tr>

                        </table>
                      </form>

                    </div>
                  </div>

                  <br />

                  <?php
                  if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {

                    $dari = $_GET['tgl_dari'];
                    $sampai = $_GET['tgl_sampai'];

                  ?>
                    <div class="panel">
                      <div class="panel-heading">
                        <h4>Data Laporan Penjualan Jasa dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
                      </div>
                      <div class="panel-body">

                        <a target="_blank" href="cetak_jasa.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>

                        <br />
                        <br />
                        <table class="table table-bordered table-striped">
                          <tr>
                            <th width="1%">No</th>
                            <th>id Transaksi</th>
                            <th>Nama Jasa</th>
                            <th>ID Servis</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total </th>


                          </tr>

                          <?php
                          // koneksi database
                          include '../koneksi.php';



                          // mengambil data pelanggan dari database
                          $data = mysqli_query($koneksi, "select * from t_trans_det_jasa inner join t_trans_head on t_trans_det_jasa.id_transaksi=t_trans_head.id_transaksi where 1 and date(tanggal_bayar) > '$dari' and date(tanggal_bayar) < '$sampai' ");
                          $no = 1;
                          // mengubah data ke array dan menampilkannya dengan perulangan while
                          while ($d = mysqli_fetch_array($data)) {
                          ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><a href="struk_transaksi.php?id_transaksi=<?php echo $d['id_transaksi']; ?>" target='_blank'><?php echo $d['id_transaksi']; ?></a></td>
                              <td><?php echo $d['nama_jasa']; ?></td>
                              <td><a href="struk_servis.php?id_servis=<?php echo $d['id_servis']; ?>"><?php echo $d['id_servis']; ?></a> </td>
                              <td><?php echo $d['harga']; ?></td>
                              <td><?php echo $d['qty']; ?></td>
                              <td><?php echo $d['sub_total']; ?></td>

                            </tr>
                          <?php
                          }
                          ?>
                        </table>
                        <?php
                        include "../koneksi.php";
                        $jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_jasa inner join t_trans_head on t_trans_det_jasa.id_transaksi=t_trans_head.id_transaksi where 1 and date(tanggal_bayar) > '$dari' and date(tanggal_bayar) < '$sampai' ");
                        $t = mysqli_fetch_array($jumlahkan);
                        ?>
                        <table style="width:30%;" align="right">
                          <tr style="font-size:30px;">
                            <td> Total : </td>
                            <td> <span style="color:red;text-decoration:underline">Rp.<?php echo number_format($t['total'])  ?> </span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  <?php } ?>

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