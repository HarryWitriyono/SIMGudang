<?php 
include_once('..\gudangkitafinal\koneksi.db.php');
$sql="select * from gudang";
$q=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($q);
$rekgudang=array();
do {
    array_push($rekgudang,$r);
} while($r=mysqli_fetch_assoc($q));
echo serialize($rekgudang);
?>