<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_det_servis where nama_brg='$_GET[nama]'");

if($hapus) {
    header("location:service.php");
}else {
    echo "<p> Input GAGAL </P>";
    echo "<a href='service.php'>Coba Lagi</a>";
}

?>