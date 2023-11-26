<?php

include "../koneksi.php";
$biaya = mysqli_query($koneksi,"SELECT * FROM t_jasa WHERE id_jasa='$_POST[harga_jasa]'");
while($data=mysqli_fetch_array($biaya)){
echo "$data[harga]";
}
?>

