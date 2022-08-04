<?php  
	require 'koneksi_database.php';

	// fungsi register / sign up
	function register($data) {
		global $koneksi;

		$username = strtolower(stripcslashes($data['username']));

		// jika nama username sudah ada
		$sql = "SELECT * FROM users WHERE Username = '$username'";
		$users = mysqli_query($koneksi, $sql);
		
		if (mysqli_fetch_assoc($users)) {
			echo "Username sudah ada";

			return false;
		}
		
		$password = mysqli_escape_string($koneksi, $data['password']);
		$confirm = mysqli_escape_string($koneksi, $data['confirm']);

		// mengecek kesesuaian password
		if ($password !== $confirm) {
			echo "Password not valid!";

			return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// memasukan user & pass ke database
		$query = "INSERT INTO users VALUES ('','$username', '$password')";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

?>