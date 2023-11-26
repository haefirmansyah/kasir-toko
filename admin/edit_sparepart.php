<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_sparepart set nama='$_POST[nama]',harga='$_POST[harga]' where id_sparepart='$_POST[id_sparepart]'");

if($edit){
	header("location:sparepart.php");
}else {
	echo"<p>Gagal Memperbaharui</p>
	<a href='form_edit_sparepart.php'>Coba Lagi</a>";
}
?>