<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_kategori where id_kategori='$_GET[id_kategori]'");

if($hapus) {
    header("location:kategori.php");
}else {
    echo "<p> Input GAGAL </P>";
    echo "<a href='kategori.php'>Coba Lagi</a>";
}

?>