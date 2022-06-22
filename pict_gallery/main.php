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
	<title>Pict Gallery</title>

	<style>
		.title {
			text-align: center;
			margin-top: 30px;
		}

		.nav {
			/*background-color: lightgrey;*/
			display: flex;
			justify-content: space-evenly;
			width: 500px;
			margin: auto;
			margin-bottom: 12px;
		}

		.container .inputan {
			/*background-color: lightgrey;*/
			width: 500px;
			/*height: 200px;*/
			margin: auto;
			border: 1px solid lightgrey;
			padding: 21px 25px;
		}

		.inputan form .upload-button button {
			width: 150px;
		}

	</style>
</head>
<body>
	<div class="title">
		<h1>Pict Gallery</h1>
		<p>Upload & Post Gambar Apapun</p>
	</div>
	<div class="nav">
		<span class="input-pict">
			<a href="main.php">Input pict</a>
		</span>
		<span class="gallery-pict">
			<a href="list_pict.php">Gallery pict</a>
		</span>
	</div>
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

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>