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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<h3 class="text-center">
				Sistem Informasi Gudang V.2023  Login Aplikasi
			</h3><center><img alt="Bootstrap Image Preview" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbyOlFOAZBCmm0sQTm6d8tm0xoaXSBhWsv2MYbfAB-Jq3r0wDD5r0vIAx7VopIco4F9MU&usqp=CAU" class="rounded-circle center" /></center>
      <?php 
      if (isset($_POST['bLogin'])) {
        $KodeLogin=filter_var($_POST['KodeLogin'],FILTER_SANITIZE_STRING);
        $Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
        include('koneksi.db.php');
        $sql="SELECT `KodeLogin`,`Password`,`NamaPengguna`,`level` FROM `pengguna` WHERE `KodeLogin`='".$KodeLogin."' and `Password`='".$Password."'";
        $q=mysqli_query($koneksi,$sql);
        $r=mysqli_fetch_array($q);
        if (empty($r)) {
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Gagal!</strong> Anda gagal login !.
        </div>';
        } else {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Success!</strong> Selamat datang anda berhasil login !.
        </div>';
          if (!isset($_SESSION)) session_start();
          $_SESSION['_kodelogin']=$r['KodeLogin'];
          $_SESSION['NamaPengguna']=$r['NamaPengguna'];
          $_SESSION['level']=$r['level'];
          header('location:menuutama.php');
        }
      }
      ?>
			<form role="form" method="post">
				<div class="form-group">
					 
					<label for="KodeLogin">
						Kode Login
					</label>
					<input type="text" class="form-control" id="KodeLogin" name="KodeLogin"/>
				</div>
				<div class="form-group">
					 
					<label for="Password">
						Password
					</label>
					<input type="password" class="form-control" id="Password" name="Password" />
				</div>
				<button type="submit" class="btn btn-primary" name="bLogin">
					Login
				</button>
			</form>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>

</body>
</html>
