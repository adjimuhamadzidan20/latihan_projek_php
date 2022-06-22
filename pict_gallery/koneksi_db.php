<?php 
	// koneksi database
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'pict_gallery';

	$koneksi = mysqli_connect($host, $username, $password, $database);

	// jika koneksi error
	if ( !$koneksi ) {
		die('Koneksi error ' . mysqli_connect_error());
	}

?>