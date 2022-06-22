<?php 
	// koneksi ke DB 
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'tiketpesawat';

	$koneksi = mysqli_connect($host, $username, $password, $database);

	if (!$koneksi) {
		die("koneksi gagal " . mysqli_connect_error());
	}

?>