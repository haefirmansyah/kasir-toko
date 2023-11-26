<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_jasa set nama_jasa='$_POST[nama_jasa]',harga='$_POST[harga]' where id_jasa='$_POST[id_jasa]'");

if($edit){
	header("location:jasa.php");
}else {
	echo"<p>Gagal Memperbaharui</p>
	<a href='form_edit_jasa_komputer.php'>Coba Lagi</a>";
}
?>

