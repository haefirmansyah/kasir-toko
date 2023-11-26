<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_trans_det_sparepart (id_transaksi,id_sparepart,id_servis,harga,qty,sub_total,nama_sparepart) values ('$_POST[id_transaksi]','$_POST[id_sparepart]','$_POST[id_servis]','$_POST[harga]','$_POST[qty]','$_POST[sub_total]','$_POST[nama]')");
if($simpan){
     header("location:form_input_det_sparepart.php?id_servis=$_POST[id_servis]");
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='transaksi-head.php'> Coba Lagi </a>
    ";
}
?>