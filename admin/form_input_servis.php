<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password']) and empty($_SESSION['id_admin']) and empty($_SESSION['hak_akses'])) {
  echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
} else {
?>


  <?php
  include "../koneksi.php";
  //TIMEZONE
  date_default_timezone_set("Asia/Jakarta");
  $date = date("Y-m-d");

  $query = "select max(id_servis) as maxKode from t_servis_head";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($hasil);
  $id_servis = $data['maxKode'];
  $no_urut = (int) substr($id_servis, 9, 3);


  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);



  $no_urut++;
  $char = "SV";
  $id_servis = $char . $tahun . $bulan . sprintf("%03s", $no_urut);


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
                <h1 class="m-0 text-dark">Data Reparasi Masuk</h1>

              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Input Reparasi</li>
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
            <!-- .card -->
            <div class="card ">
              <div class="card-header">
                <ul class="navbar-nav ml-auto">
                  <!-- Messages Dropdown Menu -->
                  <li class="nav-item">
                    <a href="servis.php" class="nav-link">

                      <p><button class="btn btn-warning"><i class="fas fa-undo"></i></i></i><b> Kembali </b></button></p>

                    </a>
                  </li>
              </div>


              <!-- /.card-header -->
              <div class="card-body" style="width:90%;margin:0 auto;">
                <!-- Form servis -->
                <h2 align="Center" class="m-0 text-dark">Input Data Reparasi </h2>
                <br>
                <br>

                <form method="POST" action="input_servis.php">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Id Reparasi</label>
                      <input type="text" class="form-control form-control-lg" value="<?php echo "$id_servis"; ?>" name="id_servis" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputPassword4">id_pelanggan</label>
                      <input type="text" class="form-control form-control-lg" id="id_pelanggan" name="id_pelanggan" readonly="" placeholder="id pelanggan" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label style="visibility:hidden;">id_pelanggan</label>
                      <a class="btn btn-primary " data-toggle="modal" href="#exampleModal2"><i class="fas fa-plus nav-icon"></i> Cari Pelanggan</a>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Tanggal Servis</label>
                      <input type="text" class="form-control form-control-lg" id="inputEmail4" name="tanggal_servis" value="<?php echo date("y/m/d"); ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Nama Pelanggan</label>
                      <input type="text" class="form-control form-control-lg" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
                    </div>
                    <div class="form-group col-md-6">

                      <input type="hidden" class="form-control form-control-lg" id="nama_pelanggan" name="id_admin" placeholder="Nama Pelanggan" readonly="" value="<?php echo $_SESSION['id_admin']; ?>">
                      <input type="hidden" class="form-control form-control-lg" name="status" placeholder="Nama Pelanggan" readonly="" value="Diproses">
                    </div>



                  </div>


                  <button type="submit" class="btn btn-info btn-lg"> Proses Reparasi</button>
                </form>



                <div class="form-group">
                  <br>

                  </br>
                  <!-- / Form Servis -->

                  <div class="card ">
                    <!-- Sub Card -->
                    <div class="card ">
                      <div class="card-header" align="right">
                        <div class="row">
                          <div class="col-sm">
                            <h3 align="left"> Detail Reparasi : </h3>
                          </div>
                          <div class="col-sm">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus nav-icon"></i> Tambah</button>
                          </div>

                        </div>
                      </div>
                      <!-- Modal Form Cari Pelanggan  -->
                      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="width:85%;margin:0 auto;">

                              <!-- Isi Modal -->

                              <div class="card-body">


                                <table id="lookup" class="table table-bordered table-striped">
                                  <thead>
                                    <tr align="center">
                                      <th>No</th>
                                      <th>ID Pelanggan</th>
                                      <th>Nama Pelanggan</th>
                                      <th>No HP</th>
                                      <th>Alamat</th>

                                    </tr>
                                  </thead>
                                  <tbody align="center">
                                    <?php include "../koneksi.php";
                                    $no = 0;
                                    $data = mysqli_query($koneksi, "select * from t_pelanggan");
                                    while ($d = mysqli_fetch_array($data)) {
                                      $no++;
                                    ?>
                                      <tr class="pilih" data-pelanggan="<?php echo $d['id_pelanggan']; ?> " nama-pelanggan="<?php echo $d['nama_pelanggan']; ?> ">
                                        <td><?php echo "$no"; ?> </td>
                                        <td><?php echo "$d[id_pelanggan]"; ?> </td>
                                        <td><?php echo "$d[nama_pelanggan]"; ?> </td>
                                        <td><?php echo "$d[no_hp]"; ?> </td>
                                        <td><?php echo "$d[alamat]"; ?> </td>

                                      </tr>
                                    <?php } ?>
                                  </tbody>

                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- / Sub Card -->
                            <!-- /isi Modal -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Modal -->

                    <!-- Modal Form Input -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Servis</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="width:85%;margin:0 auto;">
                            <!-- Isi Modal -->
                            <form method="POST" action="input_det_servis.php">
                              <div class="form-group">

                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">ID</div>
                                  </div>

                                  <input type="text" class="form-control form-control-lg" id="disabledInput" value="<?php echo $id_servis; ?>" name="id_servis" readonly>
                                </div>

                              </div>
                              <div class="form-group">

                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-tv"></i></i></div>
                                  </div>
                                  <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Nama Barang" name="nama_brg" required>
                                </div>

                              </div>
                              <div class="form-group">

                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-window-restore"></i></i></div>
                                  </div>
                                  <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="kerusakan" name="kerusakan" required>
                                </div>

                              </div>
                              <div class="form-group">

                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-cubes"></i></div>
                                  </div>
                                  <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="kelengkapan" name="kelengkapan" required>
                                </div>

                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></div>
                                  </div>
                                  <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="qty" name="qty" required>
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
                            <th>Id Reparasi</th>
                            <th>Nama Barang </th>
                            <th>Kerusakan</th>
                            <th>Kelengkapan</th>
                            <th> Qty </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          <?php include "../koneksi.php";
                          $no = 0;
                          $data = mysqli_query($koneksi, "select * from t_det_servis where id_servis='$id_servis' ");
                          while ($d = mysqli_fetch_array($data)) {
                            $no++;
                          ?>
                            <tr>
                              <td><?php echo "$no"; ?> </td>
                              <td><?php echo "$d[id_servis]"; ?> </td>
                              <td><?php echo "$d[nama_brg]"; ?> </td>
                              <td><?php echo "$d[kerusakan]"; ?> </td>
                              <td><?php echo "$d[kelengkapan]"; ?> </td>
                              <td><?php echo "$d[qty]"; ?> </td>
                              <td align="center">

                                <a class='btn btn-warning' data-toggle='modal' data-target='#konfirmasi_hapus' data-href="hapus_det_servis.php?nama=<?php echo "$d[nama_brg]"; ?>">Hapus</a>

                              </td>
                            </tr>
                          <?php } ?>
                        <tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- / Sub Card -->

                </div>


                <!-- /Form Edit -->
              </div>
              <!-- /.card-body -->
            </div>

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


    <script type="text/javascript">
      //jika dipilih, nim akan masuk ke input dan modal di tutup
      $(document).on('click', '.pilih', function(e) {
        document.getElementById("id_pelanggan").value = $(this).attr('data-pelanggan');
        document.getElementById("nama_pelanggan").value = $(this).attr('nama-pelanggan');

        $('#exampleModal2').modal('hide');
      });


      //            tabel lookup mahasiswa
      $(function() {
        $("#lookup").dataTable();
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