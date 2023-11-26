<!DOCTYPE html>
<html>

<head>
  <title>Bintang Utama Komputer</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>

</head>

<body>
  <!-- cek apakah sudah login -->
  <?php
  session_start();
  if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
  } else {
    ?>


    <?php
    // koneksi database
    include '../koneksi.php';
    ?>
    <div class="container">

      <center>
        <h2>Laporan Penjualan Sparepart</h2>
      </center>
      <br />
      <br />
      <?php
      if (isset($_GET['dari']) && isset($_GET['sampai'])) {

        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
        ?>
        <h4>Data Laporan Penjualan Sparepart dari <b>
            <?php echo $dari; ?>
          </b> sampai <b>
            <?php echo $sampai; ?>
          </b></h4>
      </div>
      <div class="panel-body">

        <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>"
          class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>

        <br />
        <br />
        <table class="table table-bordered table-striped">
          <tr>
            <th width="1%">No</th>
            <th>id Transaksi</th>
            <th>Nama Sparepart</th>
            <th>ID Servis</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total </th>


          </tr>

          <?php
          // koneksi database
          include '../koneksi.php';



          // mengambil data pelanggan dari database
          $data = mysqli_query($koneksi, "select * from t_trans_det_sparepart inner join t_trans_head on t_trans_det_sparepart.id_transaksi=t_trans_head.id_transaksi where 1 and date(tanggal_bayar) > '$dari' and date(tanggal_bayar) < '$sampai' ");
          $no = 1;
          // mengubah data ke array dan menampilkannya dengan perulangan while
          while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
              <td>
                <?php echo $no++; ?>
              </td>
              <td>
                <?php echo $d['id_transaksi']; ?>
              </td>
              <td>
                <?php echo $d['nama_sparepart']; ?>
              </td>
              <td><a href="struk_servis.php?id_servis=<?php echo $d['id_servis']; ?>">
                  <?php echo $d['id_servis']; ?>
                </a> </td>
              <td>
                <?php echo $d['harga']; ?>
              </td>
              <td>
                <?php echo $d['qty']; ?>
              </td>
              <td>
                <?php echo $d['sub_total']; ?>
              </td>

            </tr>
            <?php
          }
          ?>
        </table>
        <?php
        include "../koneksi.php";
        $jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_sparepart inner join t_trans_head on t_trans_det_sparepart.id_transaksi=t_trans_head.id_transaksi where 1 and date(tanggal_bayar) > '$dari' and date(tanggal_bayar) < '$sampai' ");
        $t = mysqli_fetch_array($jumlahkan);
        ?>
        <table style="width:30%;" align="right">
          <tr style="font-size:30px;">
            <td> Total : </td>
            <td> <span style="color:red;text-decoration:underline">Rp.
                <?php echo number_format($t['total']) ?>
              </span></td>
          </tr>
        </table>
      <?php } ?>

    </div>

    <script type="text/javascript">
      window.print();
    </script>

  </body>

  </html>
<?php } ?>