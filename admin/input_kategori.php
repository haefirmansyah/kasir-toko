<?php
include "../koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO t_kategori (id_kategori,nama_kategori) values ('$_POST[id_kategori]','$_POST[nama_kategori]')");
if($simpan){
    echo "<script> alert ('berhasil diupload');window.location='kategori.php' </script>";
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='kategori.php'> Coba Lagi </a>
    ";
}
?>