<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_trans_det_jasa where id_jasa='$_GET[id_jasa]'  ");

if($hapus) {
    header("location:form_input_det_jasa.php?id_servis=$_GET[id_servis]");
}else {
    echo "<p> Hapus GAGAL </P>";
    echo "<a href='form_input_det_jasa.php?id_servis=$_GET[id_servis]>Coba Lagi</a>";
}

?>