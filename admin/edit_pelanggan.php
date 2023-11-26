<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_pelanggan set nama_pelanggan='$_POST[nama_pelanggan]',no_hp='$_POST[no_hp]',alamat='$_POST[alamat]' where id_pelanggan='$_POST[id_pelanggan]'");

if($edit){
	header("location:pelanggan.php");
}else {
	echo"<p>Gagal Memperbaharui</p>
	<a href='pelanggan.php'>Coba Lagi</a>";
}
?>