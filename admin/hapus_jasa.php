<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_jasa where id_jasa='$_GET[id_jasa]'");

if($hapus) {
    header("location:jasa.php");
}else {
    echo "<p> Input GAGAL </P>";
    echo "<a href='jasa-komputer.php'>Coba Lagi</a>";
}

?>