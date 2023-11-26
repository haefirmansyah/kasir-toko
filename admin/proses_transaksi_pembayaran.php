<?php
include "../koneksi.php";

$todaydate = date("Y-m-d", time());
$sqlDate   = date('Y-m-d', strtotime($todaydate));
$id_transaksi = $_POST['id_transaksi'];
$id_servis = $_POST['id_servis'];

if ($_POST["kembalian"] < 0) {
    echo "<script> alert ('Biaya Pembayaran Kurang');window.location='transaksi_pembayaran.php?id_servis=$id_servis' </script>";
}else {

    $transaksi = mysqli_query($koneksi,"update t_trans_head set tanggal_bayar='$sqlDate',nama_pelanggan='$_POST[nama_pelanggan]',jumlah_total='$_POST[jumlah_total]',bayar='$_POST[bayar]',kembalian='$_POST[kembalian]',id_admin='$_POST[id_admin]',ket='lunas' where id_transaksi='$_POST[id_transaksi]'");


    if($transaksi){
        
        $ubahstatus = mysqli_query($koneksi," update t_servis_head set status='dibayar' where id_servis='$_POST[id_servis]' ");
        header("location:struk_transaksi.php?id_transaksi=$id_transaksi");
    }else {
        echo "<p> Gagal Menyimpan </p>
        <a href='transaksi-head.php'> Coba Lagi </a>
        ";
    }

}
?>