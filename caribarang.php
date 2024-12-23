<?php
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'SmFuZ2FuTHVwYVNob2xhdA==') {
        include_once('koneksi.db.php');
        $KodeBarang=mysqli_real_escape_string($koneksi,$_POST['KodeBarang']);
        $sql="SELECT * FROM `barang` WHERE `KodeBarang` ='".$KodeBarang."'";
        $q=mysqli_query($koneksi,$sql);
        $r=mysqli_fetch_assoc($q);
        $hasilcari=array();
        do {
            array_push($hasilcari,$r);
        }while($r=mysqli_fetch_assoc($q));
        echo json_encode($hasilcari,true);
    } else {
        echo "Silahkan kontak Admin untuk kunci APInya !";
    }
} else {
    echo "Salah penggunaan API Web !";
}
?>