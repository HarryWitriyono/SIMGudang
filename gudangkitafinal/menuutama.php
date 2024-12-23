<?php if (!isset($_SESSION)) session_start();
if (empty($_SESSION['_kodelogin'])) header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Gudang V.2023 - Menu Utama</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="assets/js/web.webmanifest">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h2 class="text-center bg-warning text-primary">SIM Gudang V.2023</h2>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="menuutama.php"><img src="assets/images/logo.jpg" width="50px" height="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="menuutama.php">Beranda</a>
        </li>
        <?php if (!isset($_SESSION)) session_start();
        if (($_SESSION['level']=='Admin') or ($_SESSION['level']=='Operator')) { ?>
        <li class="nav-item">
          <a class="nav-link" href="transaksibarang.php" target="frmmenu">Transaksi</a>
        </li>
        <?php } if (!isset($_SESSION)) session_start();
        if (($_SESSION['level']=='Admin')) { ?>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Master</a>
         <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="barang.php" target="frmmenu">Barang</a></li>
          <li><a class="dropdown-item" href="gudang.php" target="frmmenu">Gudang</a></li>
         </ul>
        </li>	    
    <?php };
    if (($_SESSION['level']=='Admin') or ($_SESSION['level']=='Operator') or ($_SESSION['level'] =='Umum')) {
    ?>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Laporan</a>
         <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="daftarbarang.php" target="frmmenu">Daftar Barang</a></li>
          <li><a class="dropdown-item" href="daftargudang.php" target="frmmenu">Daftar Gudang</a></li>
		  <li><a class="dropdown-item" href="rekapbarang.php" target="frmmenu">Rekap Barang</a></li>
         </ul>
        </li>	<?php } ?>
      </ul>
      <a class="btn btn-success" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container-fluid mt-3">
<iframe src="beranda.php" name="frmmenu" width="100%" height="500px"></iframe>
</div>

</body>
</html>