<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_admin where id_admin='$_GET[id_admin]'");

if($hapus) {
    header("location:akun.php");
}else {
    echo "<p> Hapus GAGAL </P>";
    echo "<a href='akun.php'>Coba Lagi</a>";
}

?>