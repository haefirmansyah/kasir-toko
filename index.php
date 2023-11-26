<!DOCTYPE html>
<html>

<head>
	<title>kasir| Bintang Utama Komputer</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<style>
		.panel{
			box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
			margin-top: 70px;
		}
		.btn-primary{
			width: 100%;		
		}
	</style>

</head>

<body style="background: #f0f0f0">
	<br />
	<br />




	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<?php
			if (isset($_GET['pesan'])) {
				if ($_GET['pesan'] == "gagal") {
					echo "<script>alert('Login gagal! username dan password salah!');</script>";
				} else if ($_GET['pesan'] == "logout") {
					echo "<script>alert('Anda telah berhasil logout');</script>";
				} else if ($_GET['pesan'] == "belum_login") {
					echo "<script>alert('Anda harus login terlebih dahulu!');</script>";
				}
			}
			?>

			<form action="login.php" method="post">
				<div class="panel">
					<center>
						<h3> Bintang Utama Komputer </h3>
					</center>
					<br />
					<div class="panel-body">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" placeholder="Masukkan username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Masukkan password">
						</div>

						<input type="submit" class="btn btn-primary" value="Log In">
					</div>
					<br />
				</div>
			</form>

		</div>
	</div>
</body>

</html>