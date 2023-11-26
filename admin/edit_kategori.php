<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_kategori set nama_kategori='$_POST[nama_kategori]' where id_kategori='$_POST[id_kategori]'");

if($edit){
	header("location:kategori.php");
}else {
	echo"<p>Gagal Memperbaharui</p>
	<a href='kategori.php'>Coba Lagi</a>";
}
?>