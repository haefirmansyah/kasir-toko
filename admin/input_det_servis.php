<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_det_servis (id_servis,nama_brg,kerusakan,kelengkapan,qty) values ('$_POST[id_servis]','$_POST[nama_brg]','$_POST[kerusakan]','$_POST[kelengkapan]','$_POST[qty]')");
if($simpan){
     header("location:form_input_servis.php");
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='form_input_servis.php'> Coba Lagi </a>
    ";
}
?>