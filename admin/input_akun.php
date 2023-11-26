<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_admin (id_admin,nama_admin,username,password,hak_akses) values ('$_POST[id_admin]','$_POST[nama_admin]','$_POST[username]','$_POST[password]','$_POST[hak_akses]')");
if($simpan){
    echo "<script> alert ('berhasil diupload');window.location='akun.php' </script>";
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='akun.php'> Coba Lagi </a>
    ";
}
?>