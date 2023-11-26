<?php
include "../koneksi.php";
$edit = mysqli_query($koneksi,"update t_admin set nama_admin='$_POST[nama_admin]',username='$_POST[username]',password='$_POST[password]',hak_akses='$_POST[hak_akses]' where id_admin='$_POST[id_admin]'");

if($edit){
	header("location:akun.php");
}else {
	echo"<p>Gagal Memperbaharui</p>
	<a href='akun.php'>Coba Lagi</a>";
}
?>