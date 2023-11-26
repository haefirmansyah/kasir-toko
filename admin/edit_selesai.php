<?php
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password']) and empty($_SESSION['id_admin'])) {
    echo"<script> alert('anda harus login dulu ');window.location= '../index.php'</script>";
}else{
  ?>

<?php 
include "../koneksi.php";
$query = "select max(id_transaksi) as maxKode from t_trans_head";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$id_transaksi = $data['maxKode'];

$no_urut = (int) substr($id_transaksi, 3, 3);
$id_servis = $_GET['id_servis'];


$no_urut++;
$char = "TR";
$id_transaksi = $char .$id_servis;


?>

<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_servis_head set status='selesai' where id_servis='$_GET[id_servis]' ");

if($edit){

	$transaksi=mysqli_query($koneksi,"INSERT INTO t_trans_head (id_transaksi,id_servis,id_admin) values ('$id_transaksi','$_GET[id_servis]','$_SESSION[id_admin]')");

	header("location:servis.php");
}else {
	echo"<p>Gagal Selesai</p>
	<a href='servis.php'>Coba Lagi</a>";
}
?>

<?php } ?>
