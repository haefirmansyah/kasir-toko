<?php

include "../koneksi.php";
$biaya = mysqli_query($koneksi,"SELECT * FROM t_sparepart WHERE id_sparepart='$_POST[harga_sparepart]'");
while($data=mysqli_fetch_array($biaya)){
echo "$data[harga]";
}
?>

