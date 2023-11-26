<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_pelanggan where id_pelanggan='$_GET[id_pelanggan]'");

if($hapus) {
    header("location:pelanggan.php");
}else {
    echo "<p> Hapus GAGAL </P>";
    echo "<a href='pelanggan.php'>Coba Lagi</a>";
}

?>