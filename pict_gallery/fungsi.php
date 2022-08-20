<?php 
	require 'koneksi_db.php';

	// menampilkan data / file gambar
	function showGambar($query) {
		global $koneksi;

		$sql = mysqli_query($koneksi, $query);
		$wadah = [];

		while ($data = mysqli_fetch_assoc($sql)) {
			$wadah [] = $data;
		}

		return $wadah;
	}

	// menambah / memasukan data
	function tambahData($data) {
		global $koneksi;

		$namaGambar = htmlspecialchars($data['Nama_Gambar']);
		$caption = htmlspecialchars($data['Caption']);
		$gambar = uploadGambar();

		// ketika gambar gagal diupload
		if ($gambar === false) {
			return false;
		}

		else {

			$query = "INSERT INTO data_gallery VALUES ('','$namaGambar', '$gambar', '$caption')";
			mysqli_query($koneksi, $query);

			echo "<script>alert('Gambar berhasil terupload!');</script>";
		}
	}

	// fungsi upload gambar
	function uploadGambar() {
		// mengambil data dari method $_FILES
		$nameFile = $_FILES['Gambar']['name'];
		$placeFile = $_FILES['Gambar']['tmp_name'];
		$sizeFile = $_FILES['Gambar']['size'];
		$errorFile = $_FILES['Gambar']['error'];

		// ketika gambar belum diklik upload
		if ($errorFile === 4) {
			echo "<script>alert('Gambar belum diupload!');</script>";
			return false;
		}

		$formatExt = pathinfo($nameFile, PATHINFO_EXTENSION);
		if ($formatExt == 'jpg' || $formatExt == 'jpeg' || $formatExt == 'png') {
			// ukuran file max 2 mb
			if ($sizeFile > 2000000) {
				echo "<script>alert('Ukuran file max 2MB!');</script>";
				return false;
			}

			// generate nama file gambar
			$namaFileGambar = uniqid();
			$namaFileGambar .= '.';
			$namaFileGambar .= $formatExt;

			// upload file gambar berfungsi 
			move_uploaded_file($placeFile, 'gambar/' . $namaFileGambar);
			return $namaFileGambar;
		} 

		else {
			echo "<script>alert('file yang diupload bukan gambar!');</script>";
			return false;
		}
	}

	// mengubah data
	function update($data) {
		global $koneksi;

		$idGambar = $_GET['edit'];
		$namaGambar = htmlspecialchars($data['Nama_Gambar']);
		$caption = htmlspecialchars($data['Caption']);
		$gambarLama = $data['gambarLama'];

		if ($_FILES['Gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}

		else {
			$gambar = uploadGambar();
		}

		$query = "UPDATE data_gallery SET Nama_Gambar = '$namaGambar', Caption = '$caption', Gambar = '$gambar' WHERE ID = $idGambar";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// menghapus data 
	function hapusData($data) {
		global $koneksi;

		$query = "DELETE FROM data_gallery WHERE ID = $data";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

?>