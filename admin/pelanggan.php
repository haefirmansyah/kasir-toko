<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
  echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
} else {
?>
  <?php
  include "../koneksi.php";
  date_default_timezone_set("Asia/Jakarta");
  $date = date("Y-m-d");


  $query = "select max(id_pelanggan) as maxKode from t_pelanggan";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($hasil);
  $idpelanggan = $data['maxKode'];
  $tahun = substr($date, 0, 4);
  $no_urut = (int) substr($idpelanggan, 9, 3);

  $no_urut++;
  $char = "PLG";
  $idpelanggan = $char . $tahun . sprintf("%04s", $no_urut);


  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Bintang Utama Komputer| Pelanggan </title>
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
                <h1 class="m-0 text-dark">Daftar Pelanggan</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Pelanggan</li>
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
              <div class="card-header" align="right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus nav-icon"></i> Tambah</button>
              </div>
              <!-- Modal Form Input -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="width:85%;margin:0 auto;">
                      <!-- Isi Modal -->
                      <form method="POST" action="input_pelanggan.php">
                        <div class="form-group">

                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">ID</div>
                            </div>

                            <input type="text" class="form-control form-control-lg" id="disabledInput" value="<?php echo $idpelanggan; ?>" name="id_pelanggan" readonly>
                          </div>

                        </div>
                        <div class="form-group">

                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="far fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Nama Pelanggan" name="nama_pelanggan" required>
                          </div>

                        </div>
                        <div class="form-group">

                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="number" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="NO Handphone" name="no_hp" required>
                          </div>

                        </div>
                        <div class="form-group">

                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Alamat" name="alamat" required>
                          </div>

                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> Tambah</button>
                        <button type="reset" class="btn btn-danger"><i class="far fa-trash-alt"></i> Bersihkan</button>
                      </form>

                      <!-- /isi Modal -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>
              <!-- /Modal -->




              <!-- Modal - Validasi -->
              <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      Anda yakin ingin menghapus data ini ?<br><br>
                      <a class="btn btn-warning btn-ok"> Hapus</a>
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
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
                      <th>ID Pelanggan</th>
                      <th>Nama Pelanggan</th>
                      <th>No HP</th>
                      <th>Alamat</th>
                      <th> Aksi </th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php include "../koneksi.php";
                    $no = 0;
                    $data = mysqli_query($koneksi, "select * from t_pelanggan");
                    while ($d = mysqli_fetch_array($data)) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo "$no"; ?> </td>
                        <td><?php echo "$d[id_pelanggan]"; ?> </td>
                        <td><?php echo "$d[nama_pelanggan]"; ?> </td>
                        <td><?php echo "$d[no_hp]"; ?> </td>
                        <td><?php echo "$d[alamat]"; ?> </td>
                        <td align="center">
                          <a href='form_edit_pelanggan.php?id_pelanggan=<?php echo "$d[id_pelanggan]"; ?>' class='btn btn-info'> Edit </a>
                          <a class='btn btn-warning' data-toggle='modal' data-target='#konfirmasi_hapus' data-href="hapus_pelanggan.php?id_pelanggan=<?php echo "$d[id_pelanggan]"; ?>">Hapus</a>

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