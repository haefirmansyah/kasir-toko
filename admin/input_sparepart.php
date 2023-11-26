<?php
include "../koneksi.php";

$komputer=mysqli_query($koneksi,"INSERT INTO t_sparepart (id_sparepart,id_kategori,nama,harga) values ('$_POST[id_sparepart]','$_POST[id_kategori]','$_POST[nama_sparepart]','$_POST[harga]')");
if($komputer){
    echo "<script> alert ('Sparepart berhasil di Tambahkan');window.location='sparepart.php' </script>";
}else {
    echo "<p> Gagal Menyimpan </p>
    <a href='form_input_sparepart.php'> Coba Lagi </a>
    ";
}
?>