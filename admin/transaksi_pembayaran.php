<?php
include "../koneksi.php";
$query = "select max(id_transaksi) as maxKode from t_trans_head";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_transaksi = $data['maxKode'];

$no_urut = (int) substr($id_transaksi, 3, 3);
$id_servis = $_GET['id_servis'];


$no_urut++;
$char = "TR";
$id_transaksi = $char . $id_servis;


?>


<!DOCTYPE html>
<html>

<head>
	<title> Bintang Utama Komputer</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script src="plugins/jquery/jquery.min.js"></script>
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
		<div class="container">

			<div class="col-md-10 col-md-offset-1">
				<?php
				// menangkap id yang dikirim melalui url
				$id_servis = $_GET['id_servis'];

				// megambil data pelanggan yang ber id di atas dari tabel pelanggan
				include "../koneksi.php";
				$transaksi = mysqli_query($koneksi, "select * from t_servis_head inner join t_pelanggan on t_servis_head.id_pelanggan=t_pelanggan.id_pelanggan where id_servis='$id_servis' ");
				while ($t = mysqli_fetch_array($transaksi)) {
				?>
					<center>
						<h2> Jasa Reparasi | Bintang Utama Komputer</h2>
					</center>
					<h3></h3>

					<a href="transaksi-head.php" class="btn btn-primary pull-left"><i class="fas fa-undo"></i> Kembali</a>
					<br>

					<br />
					<br />

					<form method="POST" action="proses_transaksi_pembayaran.php">
						<table class="table">

							<?php
							include "../koneksi.php";
							$idtransaksi = mysqli_query($koneksi, "select * from t_trans_head where id_servis='$_GET[id_servis]' ");
							$it = mysqli_fetch_array($idtransaksi);
							?>

							<input type="hidden" class="form-control" value="<?php echo $it['id_transaksi']; ?>" name="id_transaksi" readonly="">


							<input type="hidden" readonly class="form-control-plaintext" style="font-size:18px;border:none;" value="<?php echo $_SESSION['id_admin']; ?>" name="id_admin">

							<tr>
								<th width="20%">Id Servis </th>
								<th>:</th>
								<td><input type="text" readonly class="form-control-plaintext" style="border:none;" value="<?php echo $t['id_servis']; ?>" name="id_servis"></td>
							</tr>
							<tr>
								<th width="20%">Tgl. Bayar</th>
								<th>:</th>
								<td><input type="text" class="form-control-plaintext" style="border:none;" value="<?php echo date('d F Y'); ?>" name="tanggal_bayar"></td>
							</tr>
							<tr>
								<th>Nama Pelanggan</th>
								<th>:</th>
								<td><input type="text" readonly class="form-control-plaintext" style="border:none;" value="<?php echo $t['nama_pelanggan']; ?>" name="nama_pelanggan"></td>
							</tr>

						</table>

						<br />

						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size:18px;"> Jumlah Total </label>
							<div class="col-sm-10">
								<label class=" col-form-label" style="font-size:18px;border:none;color:red">Rp. </label>
								<input type="text" readonly class="form-control-plaintext" style="font-size:18px;border:none;color:red;font-weight:bold;" id="total" name="jumlah_total">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size:18px;"> Bayar </label>
							<div class="col-sm-10">
								<input type="number" class="form-control-plaintext" style="font-size:18px;" autofocus="autofocus" id="bayar" onkeyup="sum();" required name="bayar">
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label" style="font-size:18px;" onkeyup="sum();"> Kembalian au </label>
							<div class="col-sm-10">
								<label class=" col-form-label" style="font-size:18px;border:none;">Rp. </label>
								<input type="text" readonly class="form-control-plaintext" style="font-size:18px;border:none;font-weight:bold;" id="kembalian" name="kembalian">

							</div>
						</div>
						<button class="btn btn-primary pull-left" style="font-size:18px;"> <i class="fas fa-money-bill-wave"></i>&nbsp; Proses </button>

					</form>
					<br>
					<br>
					<div align="center" style="font-size:20px;padding-top:20px;"> - - Detail Pembelian - - </div>

					<h5 class="text-left">Daftar Jasa : </h5>
					<br>
					<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Nama Jasa</th>
							<th>Qty </th>
							<th>Sub Total </th>
						</tr>

						<?php
						include "../koneksi.php";

						// menampilkan pakaian-pakaian dari transaksi yang ber id di atas
						$jasa = mysqli_query($koneksi, "select * from t_trans_det_jasa where id_servis='$_GET[id_servis]'");
						$no = 0;
						while ($j = mysqli_fetch_array($jasa)) {
							$no++
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $j['nama_jasa']; ?></td>
								<td><?php echo $j['qty']; ?></td>
								<td><?php echo $j['sub_total']; ?></td>
							</tr>
						<?php } ?>
					</table>
					<table align="right" style="font-size:15px;">
						<?php
						include "../koneksi.php";
						$jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_jasa where id_servis='$id_servis'");
						$t = mysqli_fetch_array($jumlahkan);
						?>
						<tr style="font-weight:bold;" align="right">
							<td width="90%"> Total : <span style="color:red;">(Rp.) &nbsp; </span> </td>
							<td width="10%"> <input type="text" style="border:none; text-decoration:underline;color:red;" value="<?php echo $t['total'] ?>" class="sub_total"> </td>
						</tr>
					</table>
					<br>
					<br>
					<h5 class="text-left">Daftar Sparepart: </h5>
					<br>
					<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Nama Sparepart</th>
							<th>Qty </th>
							<th>Sub Total </th>
						</tr>

						<?php
						include "../koneksi.php";

						// menampilkan pakaian-pakaian dari transaksi yang ber id di atas
						$sparepart = mysqli_query($koneksi, "select * from t_trans_det_sparepart where id_servis='$_GET[id_servis]'");
						$no = 0;
						while ($s = mysqli_fetch_array($sparepart)) {
							$no++
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $s['nama_sparepart']; ?></td>
								<td><?php echo $s['qty']; ?></td>
								<td><?php echo $s['sub_total']; ?></td>
							</tr>
						<?php } ?>
					</table>
					<table align="right" style="font-size:15px;">
						<?php
						include "../koneksi.php";
						$jumlahkan = mysqli_query($koneksi, " SELECT SUM(sub_total) as total from t_trans_det_sparepart where id_servis='$id_servis'");
						$t = mysqli_fetch_array($jumlahkan);
						?>
						<tr style="font-weight:bold;" align="right">
							<td width="90%"> Total : <span style="color:red;">(Rp.) &nbsp; </span></td>
							<td width="10%"> <input type="text" style="border:none; text-decoration:underline;color:red;" value="<?php echo $t['total'] ?>" class="sub_total"> </td>
						</tr>
					</table>
				<?php } ?>
				<br>
				<br>

				<br />
				<p>
					<center><i>" Terima kasih telah mempercayakan Jasa Reparasi pada kami ".</i></center>
				</p>


			</div>

		</div>


</body>

<script type="text/javascript">
	$(document).ready(calculate);
	$(document).on("keyup", calculate);

	function calculate() {
		var sum = 0;
		$(".sub_total").each(function() {
			sum += +$(this).val();
		});
		$("#total").val(sum);
	}
</script>

<script>
	function sum() {
		var bil1 = document.getElementById('total').value;
		var bil2 = document.getElementById('bayar').value;
		var result = parseInt(bil2) - parseInt(bil1);
		if (!isNaN(result)) {
			document.getElementById('kembalian').value = result;
		}

	}
</script>

</html>


<?php } ?>