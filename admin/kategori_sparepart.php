<?php

include "../koneksi.php";
$tampil=mysqli_query($koneksi,"SELECT * FROM t_sparepart WHERE id_kategori='$_POST[nama_kategori]'");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
    echo"
     <option selected>- Pilih Sparepart -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value='$r[id_sparepart]'>[$r[id_sparepart]]&nbsp;$r[nama]</option>";
 
	
     }
}else{
    echo "
     <option selected>- Sparepart Kosong, Pilih Yang Lain -</option>";
}
?>

