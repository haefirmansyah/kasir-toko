<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_servis_head (id_servis,tanggal_servis,id_pelanggan,id_admin,status) values ('$_POST[id_servis]','$_POST[tanggal_servis]','$_POST[id_pelanggan]','$_POST[id_admin]','$_POST[status]')");
if($simpan){

    $id_servis = $_POST['id_servis'];
     header("location:struk_servis.php?id_servis=$id_servis");

}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='form_input_servis.php'> Coba Lagi </a>
    ";
}
?>