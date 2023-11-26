<?php

include "../koneksi.php";

$batal = mysqli_query($koneksi,"update t_servis_head set status='batal' where id_Servis='$_GET[id_servis]' ");

if($batal){
    header("location:transaksi-head.php");
}else{
    echo"<p>Gagal Memperbaharui</p>
	<a href='transaksi-head.php'>Coba Lagi</a>";

}

?>