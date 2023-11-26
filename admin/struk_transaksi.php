<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Jasa Reparasi </title>

	<link rel="stylesheet" type="text/css" href="plugins/bootstrap.css">
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<!-- cek apakah sudah login -->
	<?php
	session_start();
	if (empty($_SESSION['username']) and empty($_SESSION['password']) and empty($_SESSION['id_admin'])) {
		echo "<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
	} else {
	?>


		<?php
		// koneksi database
		include '../koneksi.php';
		?>
		<br>
		<div class="container">



			<div class="col-md-9 col-md-offset-1" style="background-color:none;border:1px dashed;">

				<table class="table" border="0">
					<tr>
						<td width="30%;">
							<p> <span style="font-size:32px;font-weight:bold;"> Bintang Utama Komputer </span> <span style="font-size:20px;font-weight:bold;font-style:italic;"> Comp </span> </p>
							<p> Jl. Ganesha Raya, Purwosari, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59316
								<br>TLP : 0895-0782-0957 </br>
							</p> 

						</td>
						<td>
							<?php
							// menangkap id yang dikirim melalui url
							$id = $_GET['id_transaksi'];

							// megambil data pelanggan yang ber id di atas dari tabel pelanggan
							$struk = mysqli_query($koneksi, "select * from t_trans_head where id_transaksi='$id' ");
							while ($s = mysqli_fetch_array($struk)) {
							?>

								<table class="table">
									<tr>

									</tr>
									<tr>
										<th width="10%">No.Transaksi </th>
										<th>:</th>
										<td><?php echo $id; ?></td>
									</tr>
									<tr>
										<th width="10%">Tgl.Bayar </th>
										<th>:</th>
										<td><?php echo $s['tanggal_bayar']; ?></td>
									</tr>
									<tr>
										<th>Pelanggan</th>
										<th>:</th>
										<td><?php echo $s['nama_pelanggan']; ?></td>
									</tr>
								</table>
							<?php } ?>


						</td>

					</tr>


				</table>



				<h4>Jasa : </h4>
				<br>
				<table class="table">
					<tr>
						<th>no</th>
						<th> Id </th>
						<th> Nama </th>
						<th> Harga </th>
						<th> qty </th>
						<th> sub total </th>
					</tr>

					<?php
					// menangkap id yang dikirim melalui url
					$id = $_GET['id_transaksi'];

					// megambil data pelanggan yang ber id di atas dari tabel pelanggan
					$no = 0;
					$detail = mysqli_query($koneksi, "select * from t_trans_det_jasa where id_transaksi='$id' ");
					while ($d = mysqli_fetch_array($detail)) {
						$no++
					?>
						<tr>
							<td><?php echo "$no"; ?> </td>
							<td> <?php echo "$d[id_jasa]"; ?> </td>
							<td> <?php echo "$d[nama_jasa]"; ?> </td>
							<td> <?php echo "$d[harga]"; ?> </td>
							<td> <?php echo "$d[qty]"; ?> </td>
							<td> <?php echo "$d[sub_total]"; ?> </td>

						</tr>

					<?php } ?>
				</table>
				<table width="30%" align="right">
					<?php
					include "../koneksi.php";
					$jumlahkan1 = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_jasa where id_transaksi='$_GET[id_transaksi]'");
					$u = mysqli_fetch_array($jumlahkan1);
					?>

					<tr>
						<th width="30%">Sub Total </th>
						<th> &nbsp;: &nbsp; </th>
						<td><?php echo "$u[total]"; ?></td>
					</tr>
				</table>
				</br>


				<h4>Sparepart : </h4>
				<br>
				<table class="table">

					<tr>
						<th>no</th>
						<th> Id </th>
						<th> Nama </th>
						<th> Harga </th>
						<th> qty </th>
						<th> sub total </th>
					</tr>
					<?php
					// menangkap id yang dikirim melalui url
					$id = $_GET['id_transaksi'];

					// megambil data pelanggan yang ber id di atas dari tabel pelanggan
					$no = 0;
					$detail_sparepart = mysqli_query($koneksi, "select * from t_trans_det_sparepart where id_transaksi='$id' ");
					while ($ds = mysqli_fetch_array($detail_sparepart)) {
						$no++
					?>



						<tr>
							<td><?php echo "$no"; ?> </td>
							<td> <?php echo "$ds[id_sparepart]"; ?> </td>
							<td> <?php echo "$ds[nama_sparepart]"; ?> </td>
							<td> <?php echo "$ds[harga]"; ?> </td>
							<td> <?php echo "$ds[qty]"; ?> </td>
							<td> <?php echo "$ds[sub_total]"; ?> </td>

						</tr>


					<?php } ?>

				</table>
				<table width="30%" align="right">

					<?php
					include "../koneksi.php";
					$jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_sparepart where id_transaksi='$_GET[id_transaksi]'");
					$t = mysqli_fetch_array($jumlahkan);
					?>

					<tr>
						<th width="30%">Sub Total </th>
						<th> &nbsp;: &nbsp; </th>
						<td><?php echo "$t[total]"; ?></td>
					</tr>
				</table>
				<br>


				<table border="0">
					<?php
					include "../koneksi.php";
					$id = $_GET['id_transaksi'];
					$total = mysqli_query($koneksi, " SELECT * from t_trans_head where id_transaksi='$_GET[id_transaksi]'");
					$v = mysqli_fetch_array($total);
					?>

					<tr>
						<th width="20%">Total &nbsp; </th>
						<th width="10%"> &nbsp;: &nbsp; </th>
						<td><b><?php echo "Rp.&nbsp;$v[jumlah_total]"; ?></td>
					</tr>
					<tr>
						<th width="20%">Bayar &nbsp; </th>
						<th width="10%"> &nbsp;: &nbsp; </th>
						<td><b><?php echo "Rp.&nbsp;$v[bayar]"; ?></td>
					</tr>
					<tr>
						<th width="20%">pengembalian &nbsp; </th>
						<th width="10%"> &nbsp;: &nbsp; </th>
						<td><b><?php echo "Rp.&nbsp;$v[kembalian]"; ?></td>
					</tr>
				</table>

				</br>
				<p>
					<center><i>" Terima kasih telah mempercayakan jasa reparasi pada kami ".</i></center>
				</p>

			<?php
		}
			?>
			<table border="0" width="100%">
				<tr>
					<td>
						<a type="submit" class="btn btn-primary" href="transaksi-head.php"></i> Kembali </a>
					</td>

					<td>
						<a href="struk_transaksi_cetak.php?id_transaksi=<?php echo "$_GET[id_transaksi]" ?>" target="_blank" class="btn btn-primary pull-right" align="right"><i class="fas fa-print"></i> CETAK</a>
					</td>
				</tr>

			</table>
			</br>
			</div>


		</div>




</body>

</html>