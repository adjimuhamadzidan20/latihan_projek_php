<?php 
	// koneksi
	require 'config/koneksi_database.php';

	// show all data
	function show_data($query) {
		global $koneksi;

		$dataPemesan = mysqli_query($koneksi, $query);
		$baris = [];
		while ($data = mysqli_fetch_assoc($dataPemesan)) {
			$baris [] = $data;
		}

		return $baris;
	}

	// mengambil semua data dari DB
	$result = show_data("SELECT * FROM data_pemesan");

	// update / edit data
	$sql = "SELECT * FROM data_pemesan WHERE ID_pemesan = $_GET[update]";
	$data = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_assoc($data);

	// button edit diklik
	if (isset($_POST['edit-data'])) {

		$id = $_GET['update'];
		$nama = htmlspecialchars($_POST['nama_pemesan']);
		$alamat = htmlspecialchars($_POST['alamat_pemesan']);
		$jenis = htmlspecialchars($_POST['jenis_penerbangan']);
		$berat = htmlspecialchars($_POST['berat_koper']);

		// jenis first class
		if ($jenis === "First class") {
			$hargatiket = 2000000;
			$total = $hargatiket * $berat * 0.05; 

			$query = "UPDATE data_pemesan SET Nama_pemesan = '$nama', Alamat_pemesan = '$alamat', 
			Jenis_penerbangan = '$jenis', Berat_koper = '$berat', Harga_penerbangan = '$hargatiket', 
			Total_bayar = '$total' WHERE ID_pemesan = '$id'";

			mysqli_query($koneksi, $query);

			echo "<meta http-equiv=refresh content=0.3>";
			echo "<script>alert('Data berhasil diupdate!');</script>";


		}

		// jenis bussines class
		else if ($jenis === "Bussines class") {
			$hargatiket = 1500000;
			$total = $hargatiket * $berat * 0.05; 

			$query = "UPDATE data_pemesan SET Nama_pemesan = '$nama', Alamat_pemesan = '$alamat', 
			Jenis_penerbangan = '$jenis', Berat_koper = '$berat', Harga_penerbangan = '$hargatiket', 
			Total_bayar = '$total' WHERE ID_pemesan = '$id'";

			mysqli_query($koneksi, $query);

			echo "<meta http-equiv=refresh content=0.3>";
			echo "<script>alert('Data berhasil diupdate!');</script>";

		}

		// jenis economy class
		else if ($jenis === "Economy class") {
			$hargatiket = 1000000;
			$total = $hargatiket * $berat * 0.05; 

			$query = "UPDATE data_pemesan SET Nama_pemesan = '$nama', Alamat_pemesan = '$alamat', 
			Jenis_penerbangan = '$jenis', Berat_koper = '$berat', Harga_penerbangan = '$hargatiket', 
			Total_bayar = '$total' WHERE ID_pemesan = '$id'";

			mysqli_query($koneksi, $query);

			echo "<meta http-equiv=refresh content=0.3>";
			echo "<script>alert('Data berhasil diupdate!');</script>";

		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="adjimuhamadzidan">
	<link rel="stylesheet" href="asset/css/editData.css">
	<title>Tiket Pesawat</title>
</head>
<body>
	<div class="container">
		<!-- form input data -->
		<div class="form-data">
			<h1>EDIT DATA</h1>
			<form method="post">
				<div class="id-pemesan">
					<label>ID Pemesan</label><br>
					<input type="text" name="id-pemesan" value="<?= $hasil['ID_pemesan']; ?>" disabled>
				</div>
				<div class="nama-pemesan">
					<label for="nama_pemesan">Nama Pemesan</label><br>
					<input type="text" name="nama_pemesan" id="nama_pemesan" value="<?= $hasil['Nama_pemesan']; ?>" autocomplete="off">
				</div>
				<div class="alamat">
					<label for="alamat">Alamat Pemesan</label><br>
					<input type="text" name="alamat_pemesan" id="alamat" value="<?= $hasil['Alamat_pemesan']; ?>" autocomplete="off">
				</div>
				<div class="jenis-penerbangan">
					<label for="jenis_penerbangan">Jenis Penerbangan</label><br>
					<select name="jenis_penerbangan" id="jenis_penerbangan" value="<?= $hasil['Jenis_penerbangan']; ?>">
						<option value="First class">First class</option>
						<option value="Bussines class">Bussines class</option>
						<option value="Economy class">Economy class</option>
					</select>
				</div>
				<div class="berat-koper">
					<label for="berat_koper">Berat Koper</label><br>
					<input type="text" name="berat_koper" id="berat_koper" value="<?= $hasil['Berat_koper']; ?>" autocomplete="off">
				</div>
				<div class="btn-opsi">
					<button type="submit" name="edit-data" onclick="return confirm('Edit data?');">Edit</button>
					<a href="tiketPesawat.php"><button type="button">Kembali</button></a>
				</div>
			</form>
		</div>
		<!-- bagian isi data -->
		<div class="tabel-data">
			<h2>Data Pemesanan Tiket Pesawat</h2>
			<div class="list-tabel">
				<table border="1" cellspacing="0"> 
					<tr>
						<th>ID Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Alamat Pemesan</th>
						<th>Jenis Penerbangan</th>
						<th>Berat Koper</th>
						<th>Harga Penerbangan</th>
						<th>Total Bayar</th>
					</tr>
					<tr>
						<td><?= $hasil['ID_pemesan']?></td>
						<td><?= $hasil['Nama_pemesan'];?></td>
						<td><?= $hasil['Alamat_pemesan'];?></td>
						<td><?= $hasil['Jenis_penerbangan'];?></td>
						<td><?= $hasil['Berat_koper'];?></td>
						<td><?= $hasil['Harga_penerbangan'];?></td>
						<td><?= $hasil['Total_bayar'];?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>