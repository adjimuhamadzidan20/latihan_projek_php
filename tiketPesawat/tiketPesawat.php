<?php  
	// koneksi
	require 'koneksi_database.php';

	// jika button simpan diklik
	if (isset($_POST['submit'])) {
		global $koneksi;

		$nama = htmlspecialchars($_POST['nama_pemesan']);
		$alamat = htmlspecialchars($_POST['alamat_pemesan']);
		$jenis = htmlspecialchars($_POST['jenis_penerbangan']);
		$berat = htmlspecialchars($_POST['berat_koper']);

		// jika kolom input blm diisi
		if (empty($nama) || empty($alamat) || empty($jenis) || empty($berat)) {
			echo "<script>alert('Mohon input terlebih dahulu');</script>";
		}

		else {
			// jenis first class
			if ($jenis === "First class") {
				$hargatiket = 2000000;
				$total = $hargatiket * $berat * 0.05; 

				$query = "INSERT INTO data_pemesan VALUES ('', '$nama', '$alamat', '$jenis', '$berat', '$hargatiket', '$total')";
				mysqli_query($koneksi, $query);

				echo "<script>alert('Data berhasil disimpan!');</script>";

			}

			// jenis bussines class
			else if ($jenis === "Bussines class") {
				$hargatiket = 1500000;
				$total = $hargatiket * $berat * 0.05; 

				$query = "INSERT INTO data_pemesan VALUES ('', '$nama', '$alamat', '$jenis', '$berat', '$hargatiket', '$total')";
				mysqli_query($koneksi, $query);

				echo "<script>alert('Data berhasil disimpan!');</script>";

			}

			// jenis economy class
			else if ($jenis === "Economy class") {
				$hargatiket = 1000000;
				$total = $hargatiket * $berat * 0.05; 

				$query = "INSERT INTO data_pemesan VALUES ('', '$nama', '$alamat', '$jenis', '$berat', '$hargatiket', '$total')";
				mysqli_query($koneksi, $query);

				echo "<script>alert('Data berhasil disimpan!');</script>";

			}
		}
	}

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

	// delete data
	// button opsi hapus diklik
	if (isset($_GET['hapus'])) {
		$query = "DELETE FROM data_pemesan WHERE ID_pemesan = $_GET[hapus]";

		mysqli_query($koneksi, $query);

		echo "<meta http-equiv=refresh content=0.3;URL=tiketPesawat.php>";
		echo "<script>alert('Data berhasil dihapus!');</script>";
	}

	// mencari data
	if (isset($_POST['cari'])) {
		$sql = "SELECT * FROM data_pemesan WHERE Nama_pemesan LIKE '%$_POST[inputCari]%'";

		// menampilkan data yang dicari
		$result = show_data($sql);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="adjimuhamadzidan">
	<link rel="stylesheet" href="tiketPesawat.css">
	<title>Tiket Pesawat</title>
</head>
<body>
	<div class="container">
		<!-- form input data -->
		<div class="form-data">
			<h1>FORM BOOKING TIKET PESAWAT</h1>
			<form method="post">
				<div class="nama-pemesan">
					<label for="nama_pemesan">Nama Pemesan</label><br>
					<input type="text" name="nama_pemesan" placeholder="Masukkan Nama" id="nama_pemesan" autocomplete="off">
				</div>
				<div class="alamat">
					<label for="alamat">Alamat Pemesan</label><br>
					<input type="text" name="alamat_pemesan" placeholder="Masukkan Alamat" id="alamat" autocomplete="off">
				</div>
				<div class="jenis-penerbangan">
					<label for="jenis_penerbangan">Jenis Penerbangan</label><br>
					<select name="jenis_penerbangan" id="jenis_penerbangan">
						<option>Pilih Jenis Penerbangan</option>
						<option value="First class">First class</option>
						<option value="Bussines class">Bussines class</option>
						<option value="Economy class">Economy class</option>
					</select>
				</div>
				<div class="berat-koper">
					<label for="berat_koper">Berat Koper</label><br>
					<input type="text" name="berat_koper" placeholder="Berat Koper (Kg)" id="berat_koper" autocomplete="off">
				</div>
				<div class="btn-simpan">
					<button type="submit" name="submit">Simpan</button>
				</div>
			</form>
		</div>
		<!-- bagian isi data -->
		<div class="tabel-data">
			<div class="header">
				<h2>Data Pemesanan Tiket Pesawat</h2>
				<!-- mencari data -->
				<div class="search">
					<form method="post">
						<input type="search" name="inputCari" placeholder="Nama Pemesan" autocomplete="off">
						<button type="submit" name="cari">Cari</button>
					</form>
				</div>
			</div>
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
						<th colspan="2">Opsi</th>
					</tr>
					<?php foreach ($result as $data) { ?>
						<tr>
							<td><?= $data['ID_pemesan']?></td>
							<td><?= $data['Nama_pemesan'];?></td>
							<td><?= $data['Alamat_pemesan'];?></td>
							<td><?= $data['Jenis_penerbangan'];?></td>
							<td><?= $data['Berat_koper'];?></td>
							<td><?= $data['Harga_penerbangan'];?></td>
							<td><?= $data['Total_bayar'];?></td>
							<td>
								<a href="editData.php?update=<?= $data['ID_pemesan']; ?>"><button type="button">Edit</button></a>
							</td>
							<td>
								<a href="?hapus=<?= $data['ID_pemesan']; ?>"><button type="button" onclick="return confirm('Hapus data?');">Hapus</button></a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>