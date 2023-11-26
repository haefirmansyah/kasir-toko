<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE a.*, b.* from t_servis_head a, t_det_servis b where a.id_servis='$_GET[id_servis]' AND b.id_servis='$_GET[id_servis]'");


if($hapus) {
    header("location:servis.php");
}else {
    echo "<p> Input GAGAL </P>";
    echo "<a href='servis.php'>Coba Lagi</a>";
}

?>