<?php 
include_once('koneksi.db.php');
$sql="select * from gudang";
$q=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($q);$hasil=array();
if (!empty($r)) {
    do {
        array_push($hasil,$r);
    } while($r=mysqli_fetch_assoc($q));
    echo json_encode($hasil);
} else {
    echo "Rekord tabel kosong !";
}
?>