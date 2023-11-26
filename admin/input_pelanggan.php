<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_pelanggan (id_pelanggan,nama_pelanggan,no_hp,alamat) values ('$_POST[id_pelanggan]','$_POST[nama_pelanggan]','$_POST[no_hp]','$_POST[alamat]')");
if($simpan){
    echo "<script> alert ('berhasil di tambahkan');window.location='pelanggan.php' </script>";
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='pelanggan.php'> Coba Lagi </a>
    ";
}
?>