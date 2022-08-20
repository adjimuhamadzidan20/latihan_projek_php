<?php  
	require 'fungsi.php';

	// ketika button upload ditekan
	if (isset($_POST['upload'])) {

		if (tambahData($_POST) > 0) {
			echo "Gambar berhasil diupload";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	<title>Pict Gallery</title>
</head>
<body>
	<header>
		<div class="title">
			<h1>Pict Gallery</h1>
			<p>Upload & Post Gambar Apapun</p>
		</div>
		<div class="nav">
			<span class="input-pict">
				<a href="index.php"><button class="btn btn-outline-secondary btn-sm rounded-0" type="button" id="inputGroupFileAddon04" 
				name="input pict">Input Pict</button></a>
			</span>
			<span class="gallery-pict">
				<a href="list_pict.php"><button class="btn btn-outline-secondary btn-sm rounded-0" type="button" id="inputGroupFileAddon04" name="gallery pict">Gallery Pict</button></a>
			</span>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="inputan">
				<form method="post" enctype="multipart/form-data">
					<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Upload Gambar</label><br>
					  <input type="file" class="form-control mb-3 rounded-0" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="Gambar" title="*Ukuran gambar max 2MB">
					</div>
					<div class="mb-3">
					  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama gambar" name="Nama_Gambar">
					</div>
					<div class="mb-3">
					  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Caption" name="Caption"></textarea>
					</div>
					<div class="upload-button d-flex justify-content-center">
						<button class="btn btn-outline-secondary btn-sm rounded-0" type="submit" id="inputGroupFileAddon04" name="upload">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>