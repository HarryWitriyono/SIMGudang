<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekapitulasi Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Rekapitulasi Barang</h2>
  <p>Daftar Rekapitulasi Barang di Gudang</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Waktu Transaksi</th>
        <th>Status Transaksi</th>
        <th>Jumlah Stok</th>
        <th>Lokasi Gudang</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    include_once('koneksi.db.php');
    $sql="select b.*,g.*,t.* from barang b inner join barangdigudang t on b.KodeBarang=t.KodeBarang inner join gudang g on t.KodeGudang=g.KodeGudang order by b.KodeBarang";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    if (empty($r)) {
        echo '';
        exit();
    } 
    do {
    ?>
      <tr>
        <td><?php echo $r['KodeBarang'];?></td>
        <td><?php echo $r['NamaBarang'];?></td>
        <td><?php echo $r['WaktuTransaksi'];?></td>
        <td><?php echo $r['StatusTransaksi'];?></td>
        <td><?php echo $r['Jumlah'];?></td>
        <td><?php echo $r['Alamat'];?></td>
      </tr>
      <?php } while($r=mysqli_fetch_array($q));?>
    </tbody>
  </table>
</div>

</body>
</html>
