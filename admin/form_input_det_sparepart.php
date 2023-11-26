<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password']) and empty($_SESSION['id_admin'])) {
  echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
} else {
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
                <h1 class="m-0 text-dark">Input Sparepart (Det)</h1>

              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">HomeHome</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <a href="transaksi-head.php" class="nav-link">

                      <p><button class="btn btn-warning"><i class="fas fa-undo"></i></i></i><b> Kembali </b></button></p>

                    </a>
                  </li>
              </div>


              <!-- /.card-header -->
              <div class="card-body" style="width:90%;margin:0 auto;">
                <!-- Form servis -->
                <h2 align="Center" class="m-0 text-dark">Sparepart Yang Di Beli </h2>
                <br>
                <br>
                <?php include "../koneksi.php";

                $data = mysqli_query($koneksi, "select * from t_servis_head inner join t_pelanggan on t_servis_head.id_pelanggan=t_pelanggan.id_pelanggan where id_servis='$_GET[id_servis]'");
                $d = mysqli_fetch_array($data);
                ?>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">id Servis :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" value="<?php echo $d['id_servis']; ?>" name="id_servis" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Servis</label>
                  <div class="col-sm-3">
                    <input type="text" readonly="" class="form-control" name="tanggal_servis" value="<?php echo $d['tanggal_servis']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pelanggan </label>
                  <div class="col-sm-3">
                    <input type="text" readonly="" class="form-control" name="tanggal_servis" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan']; ?>">
                  </div>
                </div>
                <br>

                <!-- / Form Servis -->

                <div class="card ">
                  <!-- Sub Card -->
                  <div class="card " style="border:none;">
                    <div class="card-header">

                      <h4><b> Input Sparepart </h4>
                      <br>

                      <form method="POST" action="input_det_sparepart.php">
                        <?php
                        include "../koneksi.php";
                        $idtransaksi = mysqli_query($koneksi, "select * from t_trans_head where id_servis='$_GET[id_servis]' ");
                        $it = mysqli_fetch_array($idtransaksi);
                        ?>

                        <input type="hidden" class="form-control" value="<?php echo $it['id_transaksi'] ?>" name="id_transaksi" readonly="">

                        <input type="hidden" class="form-control" value="<?php echo $d['id_servis']; ?>" name="id_servis" readonly="">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label"> Jenis Sparepart </label>
                          <div class="col-sm-3">
                            <select class="form-control" id="kategori" name="kategori">
                              <option selected>- Pilih Kategori -</option>
                              <?php
                              include "../koneksi.php";
                              $tampil = mysqli_query($koneksi, "SELECT * FROM t_kategori ");
                              while ($d = mysqli_fetch_array($tampil)) {
                                echo "<option value='$d[id_kategori]'> $d[nama_kategori] </option>";
                              }
                              ?>
                            </select>

                          </div>


                        </div>
                        <div class="sparepart">


                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Sparepart</label>
                            <div class="col-sm-3">
                              <select class="form-control" id="sparepart" name="id_sparepart">
                                <option selected>- Pilih Sparepart -</option>


                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" required id="nama" name="nama" onkeyup="sum();" required>
                            </div>

                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" required id="harga" name="harga" onkeyup="sum();">
                            </div>

                          </div>
                        </div>









                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">QTY</label>
                          <div class="col-sm-3">
                            <input type="number" class="form-control" required id="qty" name="qty" onkeyup="sum();">
                          </div>

                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Sub Total </label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" required id="sub_total" name="sub_total">
                          </div>

                        </div>

                        <div class="form-group row">

                          <div class="col-sm-3">
                            <button class="btn btn-outline-success"> Pilih Sparepart </button>
                          </div>

                        </div>


                      </form>


                    </div>



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


                      <table class="table" id="tabel_jasa">
                        <thead>
                          <tr align="center">
                            <th>No</th>
                            <th>Nama Sparepart </th>
                            <th>QTY</th>
                            <th> Sub Total</th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          <?php include "../koneksi.php";
                          $no = 0;
                          $data = mysqli_query($koneksi, "select * from t_trans_det_sparepart where id_servis='$_GET[id_servis]' ");
                          while ($d = mysqli_fetch_array($data)) {
                            $no++;
                          ?>
                            <tr>
                              <td><?php echo "$no"; ?> </td>
                              <td><?php echo "$d[nama_sparepart]"; ?> </td>
                              <td><?php echo "$d[qty]"; ?> </td>
                              <td><?php echo "$d[sub_total]"; ?> </td>
                              <td align="center">

                                <a class='btn btn-warning' data-toggle='modal' data-target='#konfirmasi_hapus' data-href="hapus_det_sparepart.php?id_sparepart=<?php echo "$d[id_sparepart]"; ?>&id_servis=<?php echo "$d[id_servis]"; ?>">Hapus</a>

                              </td>
                            </tr>
                          <?php } ?>
                        <tbody>
                      </table>
                      <br>

                      <?php
                      include "../koneksi.php";
                      $jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_sparepart where id_servis='$_GET[id_servis]'");
                      $t = mysqli_fetch_array($jumlahkan);
                      ?>
                      <table style="width:30%;" align="right">
                        <tr style="font-size:30px;">
                          <td> Total : </td>
                          <td> <span style="color:red;text-decoration:underline">Rp.<?php echo number_format($t['total'])  ?> </span></td>
                        </tr>
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
      //script ajax sparepart
      $(document).ready(function() {
        $('#kategori').change(function() {
          var kategori = $(this).val();
          $.ajax({
            type: 'POST',
            url: 'kategori_sparepart.php',
            data: 'nama_kategori=' + kategori,
            success: function(response) {
              $('#sparepart').html(response);
            }

          });
        });
      });

      $(document).ready(function() {
        $('#sparepart').change(function() {
          var sparepart = $(this).val();
          $.ajax({
            type: 'POST',
            url: 'harga_sparepart.php',
            data: 'harga_sparepart=' + sparepart,
            success: function(response) {
              $('#harga').val(response);
              $('#qty').val("");
              $('#sub_total').val("");

            }

          });


        });

      });

      $(document).ready(function() {
        $('#sparepart').change(function() {
          var sparepart = $(this).val();
          $.ajax({
            type: 'POST',
            url: 'nama_sparepart.php',
            data: 'nama_sparepart=' + sparepart,
            success: function(response) {
              $('#nama').val(response);
              $('#qty').val("");
              $('#sub_total').val("");

            }

          });


        });

      });

      $(document).ready(function() {
        $('.tambahan').hide();
        $('#custom').click(function() {
          $('.tambahan').show();


        });



      });
    </script>
    <script>
      function sum() {
        var bil1 = document.getElementById('harga').value;
        var bil2 = document.getElementById('qty').value;
        var result = parseInt(bil1) * parseInt(bil2);
        if (!isNaN(result)) {
          document.getElementById('sub_total').value = result;
        }

      }
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