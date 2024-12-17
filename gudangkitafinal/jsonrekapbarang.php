<?php include('koneksi.db.php');
function enkripaes($plain,$algo,$kunci,$iv){
    $hasil=openssl_encrypt($plain, $algo, $kunci, $options=0, $iv, $tag);
    return $hasil;
}
function dekripaes($plain,$algo,$kunci,$iv){
    $hasil=openssl_decrypt($plain, $algo, $kunci, $options=0, $iv);
    return $hasil;
}
$sql = "select b.*,g.*,t.* from barang b inner join barangdigudang t on b.KodeBarang=t.KodeBarang inner join gudang g on t.KodeGudang=g.KodeGudang order by b.KodeBarang";
$q=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($q);
$arrahhasil=array();$h=array();
$algo='aes-256-ctr';
$kunci="UmB@Yes#Ok123";
$iv="1234567890112233";
do {
    $h['KodeBarang']=enkripaes($r['KodeBarang'],$algo,$kunci,$iv);
    $h['NamaBarang']=enkripaes($r['NamaBarang'],$algo,$kunci,$iv);
    $h['WaktuTransaksi']=enkripaes($r['WaktuTransaksi'],$algo,$kunci,$iv);
    $h['StatusTransaksi']=enkripaes($r['StatusTransaksi'],$algo,$kunci,$iv);
    $h['Jumlah']=enkripaes($r['Jumlah'],$algo,$kunci,$iv);
    $h['Alamat']=enkripaes($r['Alamat'],$algo,$kunci,$iv);
    array_push($arrahhasil,$h);
}while($r=mysqli_fetch_assoc($q));
echo json_encode($arrahhasil);
$arrahhasil=json_decode(json_encode($arrahhasil));
echo '<br>Hasil Array : <br>';
foreach($arrahhasil as $k) {
    echo 'Kode Barang : '.dekripaes($k->KodeBarang,$algo,$kunci,$iv) ."<br>";
    echo 'Nama Barang : '.dekripaes($k->NamaBarang,$algo,$kunci,$iv) ."<br>";
    echo 'Waktu Transaksi : '.dekripaes($k->WaktuTransaksi,$algo,$kunci,$iv) ."<br>";
    echo 'Status Transaksi : '.dekripaes($k->StatusTransaksi,$algo,$kunci,$iv) ."<br>";
    echo 'Jumlah : '.dekripaes($k->Jumlah,$algo,$kunci,$iv) ."<br>";
    echo 'Lokasi Gudang : '.dekripaes($k->Alamat,$algo,$kunci,$iv) ."<br>";
}