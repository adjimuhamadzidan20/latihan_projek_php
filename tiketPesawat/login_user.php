<?php  
	require 'config/koneksi_database.php';

	if (isset($_POST['login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username = '$user'";
		$hasil = mysqli_query($koneksi, $sql);

		// cek password
		if (mysqli_num_rows($hasil) === 1) {
			$data = mysqli_fetch_assoc($hasil);
			if (password_hash($pass, $row['password'])) {
							
				// masuk ke hal dashbord
				header('Location: tiketPesawat.php');
				exit;
			}

		} else {
			echo '<script>alert("Username dan password tidak sesuai!");</script>';
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tiket Pesawat</title>
	<link rel="stylesheet" href="asset/css/login.css">
	<link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<body>
	<div class="head mt-5 mb-3">
		<h1 class="text-center fs-2">Tiket Pesawat</h1>
	</div>
	<div class="container">
		<form method="post" class="ps-3 pe-3 pt-5 pb-5 mx-auto">
			<div class="title mb-4">
				<h2 class="text-center fs-3">Login</h2>
			</div>
			<div class="input">
				<div class="input-group-sm mb-3">
				  <label for="exampleFormControlInput1" class="form-label mb-0" id="inputGroup-sizing-sm">Username</label>
				  <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="Username" name="username" required>
				</div>
				<div class="input-group-sm mb-3">
				  <label for="exampleFormControlInput1" class="form-label mb-0">Password</label>
				  <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="Password" name="password" required>
				</div>
				<div class="input-group-sm mb-3 text-center">
					<a href="regist.php" class="text-white fs-6" title="Silahkan register jika belum memiliki akun">Belum memiliki akun?</a>
				</div>
				<div class="regis text-center input-group-sm">
					<input class="btn btn-light rounded-0" type="submit" value="Login" name="login">
				</div>	
			</div>
		</form>
	</div>

	<script type="text/javascript" src="bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

