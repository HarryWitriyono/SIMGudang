<?php 
if (isset($_POST['submit'])) {
    include_once('..\gudangkitafinal\koneksi.db.php'); //asumsinya file koneksi.db.php ada di folder \gudangkitafinal
    $KodeGudang = mysqli_real_escape_string($koneksi,$_POST['KodeGudang']);
    $StatusTransaksi= mysqli_real_escape_string($koneksi,$_POST['StatusTransaksi']);
    $Jumlah= mysqli_real_escape_string($koneksi,$_POST['Jumlah']);
    $Keterangan= mysqli_real_escape_string($koneksi,$_POST['Keterangan']);
    $KodeBarang = mysqli_real_escape_string($koneksi,$_POST['KodeBarang']);
    $sql="INSERT INTO `barangdigudang`(`WaktuTransaksi`, `StatusTransaksi`, `Jumlah`, `Keterangan`, `KodeGudang`, `KodeBarang`) VALUES (now(),'".$StatusTransaksi."','".$Jumlah."','".$Keterangan."','".$KodeGudang."','".$KodeBarang."')";
    $q=mysqli_query($koneksi,$sql);
    if ($q) {
        echo 'Rekord berhasil disimpan !';
    } else {
        echo 'Rekord gagal disimpan !';
    }
} else {
    echo 'Salah penggunaan API !';
}
?>