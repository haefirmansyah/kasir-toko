<?php
include "../koneksi.php";
$hapus = mysqli_query($koneksi,"DELETE from t_sparepart where id_sparepart='$_GET[id_sparepart]'");

if($hapus) {
    header("location:sparepart.php");
}else {
    echo "<p> Input GAGAL </P>";
    echo "<a href='form_input_sparepart.php'>Coba Lagi</a>";
}

?>