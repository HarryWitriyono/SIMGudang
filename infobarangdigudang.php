<?php
header('Content-Type: application/json; charset=utf8');
include_once('koneksi.db.php');
$sqlgudang="select * from gudang";
$qgudang=mysqli_query($koneksi,$sqlgudang);
$rgudang=mysqli_fetch_assoc($qgudang);
$infobarangdigudang=array();
do {
    $rgudang['barang']=array();
    $sqlbarangdigudang="select bg.*,b.* from barangdigudang bg inner join barang b on bg.KodeBarang=b.KodeBarang where bg.KodeGudang='".$rgudang['KodeGudang']."'";
    $qbarangdigudang=mysqli_query($koneksi,$sqlbarangdigudang);
    $rbarangdigudang=mysqli_fetch_assoc($qbarangdigudang);
    do {
        array_push($rgudang['barang'],$rbarangdigudang);
    }while($rbarangdigudang=mysqli_fetch_assoc($qbarangdigudang));
    array_push($infobarangdigudang,$rgudang);
} while($rgudang=mysqli_fetch_assoc($qgudang));
echo json_encode($infobarangdigudang,true);
?>