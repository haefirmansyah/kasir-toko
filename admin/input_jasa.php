<?php
include "../koneksi.php";

$komputer=mysqli_query($koneksi,"INSERT INTO t_jasa (id_jasa,id_kategori,nama_jasa,harga) values ('$_POST[id_jasa]','$_POST[id_kategori]','$_POST[nama_jasa]','$_POST[harga]')");
if($komputer){
    echo "<script> alert ('Jasa berhasil di Tambahkan');window.location='jasa.php' </script>";
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='form_input_jasa.php'> Coba Lagi </a>
    ";
}
?>