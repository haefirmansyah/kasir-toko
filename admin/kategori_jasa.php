<?php

include "../koneksi.php";
$tampil=mysqli_query($koneksi,"SELECT * FROM t_jasa WHERE id_kategori='$_POST[nama_kategori]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
    echo"
     <option selected>- Pilih Jasa -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value='$r[id_jasa]'>[$r[id_jasa]]&nbsp$r[nama_jasa]</option>";
	
     }
}else{
    echo "
     <option selected>- Jasa Kosong, Pilih Yang Lain -</option>";
}
?>

