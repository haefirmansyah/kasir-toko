<?php
session_start();
include "koneksi.php";
$tampil=mysqli_query($koneksi,"select * from t_admin where username='$_POST[username]' and password='$_POST[password]'");

$data=mysqli_fetch_array($tampil);

if (!empty($data['username'])) {
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];
    $_SESSION['id_admin']=$data['id_admin'];
    $_SESSION['hak_akses']=$data['hak_akses'];
  
    header('location:admin/index.php');
}else{
    header("location:index.php?pesan=gagal");
}
?>

