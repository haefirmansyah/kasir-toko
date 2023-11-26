<!DOCTYPE html>
<html>

<head>

	<title>Sistem Informasi Jasa Reparasi </title>

	<link rel="stylesheet" type="text/css" href="plugins/bootstrap.css">
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

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



			<div class="col-md-8 col-md-offset-1">

				<table class="table" border="0">
					<tr>
						<td width="30%;">
							<p> <span style="font-size:32px;font-weight:bold;"> Bintang Utama Komputer</span> <span style="font-size:20px;font-weight:bold;font-style:italic;"> Comp </span> </p>
							<p> Jl. Ganesha Raya, Purwosari, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59316
								<br>TLP : 0895-0782-0957</br>
							</p> 

						</td>
						<td>
							<?php
							// menangkap id yang dikirim melalui url
							$id = $_GET['id_servis'];

							// megambil data pelanggan yang ber id di atas dari tabel pelanggan
							$struk = mysqli_query($koneksi, "select * from t_servis_head inner join  t_pelanggan on t_servis_head.id_pelanggan = t_pelanggan.id_pelanggan where id_Servis='$id' ");
							while ($s = mysqli_fetch_array($struk)) {
							?>

								<table class="table">
									<tr>
										<th width="10%">ID Reparasi</th>
										<th>:</th>
										<td><?php echo $s['id_servis']; ?></td>
									</tr>
									<tr>
										<th width="10%">Tgl. Reparasi</th>
										<th>:</th>
										<td><?php echo $s['tanggal_servis']; ?></td>
									</tr>

									<tr>
										<th>Pelanggan</th>
										<th>:</th>
										<td><?php echo $s['nama_pelanggan']; ?></td>
									</tr>
									<tr>
										<th>Alamat</th>
										<th>:</th>
										<td><?php echo $s['alamat']; ?></td>
									</tr>
								</table>
							<?php } ?>


						</td>

					</tr>


				</table>


				<br />

				<h4>Detail Reparasi : </h4>
				<br>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th> Barang </th>
						<th> Kerusakan </th>
						<th> Kelengkapan </th>

						<th> Qty </th>
					</tr>
					<?php
					// menangkap id yang dikirim melalui url
					$id = $_GET['id_servis'];

					// megambil data pelanggan yang ber id di atas dari tabel pelanggan
					$no = 0;
					$detail = mysqli_query($koneksi, "select * from t_det_Servis where id_Servis='$id' ");
					while ($d = mysqli_fetch_array($detail)) {
						$no++
					?>


						<tr>
							<td><?php echo "$no"; ?> </td>
							<td> <?php echo "$d[nama_brg]"; ?> </td>
							<td> <?php echo "$d[kerusakan]"; ?> </td>
							<td> <?php echo "$d[kelengkapan]"; ?> </td>

							<td> <?php echo "$d[qty]"; ?> </td>

						</tr>

					<?php } ?>
				</table>

				<br />
				<p>
					<center><i>" Terima kasih telah mempercayakan Jasa Reparasi pada kami ".</i></center>
				</p>

			<?php
		}
			?>
			</br>
			<table border="0" width="100%">
				<tr>
					<td>
						<a type="submit" class="btn btn-primary" href="servis.php"></i> Kembali </a>
					</td>

					<td>
						<a href="struk_servis_cetak.php?id_servis=<?php echo "$_GET[id_servis]" ?>" target="_blank" class="btn btn-primary pull-right" align="right"><i class="fas fa-print"></i> CETAK</a>
					</td>

				</tr>
			</table>


			</div>


		</div>





</body>

</html>