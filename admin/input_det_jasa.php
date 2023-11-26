<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_trans_det_jasa (id_transaksi,id_jasa,nama_jasa,id_servis,harga,qty,sub_total) values ('$_POST[id_transaksi]','$_POST[id_jasa]','$_POST[nama_jasa]','$_POST[id_servis]','$_POST[harga]','$_POST[qty]','$_POST[sub_total]')");
if($simpan){
     header("location:form_input_det_jasa.php?id_servis=$_POST[id_servis]");
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='transaksi-head.php'> Coba Lagi </a>
    ";
}
?>