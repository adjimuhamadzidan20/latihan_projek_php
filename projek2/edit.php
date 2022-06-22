<?php 
	require 'fungsi.php';

	$id = $_GET['edit'];

	$isi = showGambar("SELECT * FROM data_gallery WHERE ID = $id")[0];

	if (isset($_POST['ubah'])) {

		if (update($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil di update');
					document.location.href = 'list_pict.php';
				</script>
			";
		}

		else {
			echo "
				<script>
					alert('data gagal di update');
					document.location.href = 'list_pict.php';
				</script>
			";
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
		<h1>Update Gallery</h1>
		<p>Edit Gambar</p>
	</div>
	<div class="container">
		<div class="inputan">
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $mhs['ID']; ?>">
				<input type="hidden" name="gambarLama" value="<?= $mhs['Gambar']; ?>">

				<div class="mb-3">
				  <center>
					  <label for="exampleFormControlInput1" class="form-label">Ganti Gambar</label><br>
					  <img src="gambar/<?= $isi['Gambar'];?>" alt="picture" width="125" class="rounded border p-1">  	
				  </center>
				</div>
				<input type="file" class="form-control mb-3 rounded-0" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="Gambar">
				<div class="mb-3">
				  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama gambar" name="Nama_Gambar" 
				  value="<?= $isi['Nama_Gambar'];?>">
				</div>
				<div class="mb-3">
				  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Caption" name="Caption" 
				  value="<?= $isi['Caption'];?>">
				</div>
				<div class="upload-button d-flex justify-content-center">
					<button class="btn btn-outline-secondary btn-sm rounded-0" type="submit" id="inputGroupFileAddon04" name="ubah">Update</button>	
				</div>
				<div class="upload-button d-flex justify-content-center mt-2">
					<a href="list_pict.php">
						<button class="btn btn-outline-secondary btn-sm rounded-0" type="button" id="inputGroupFileAddon04">Kembali</button>
					</a>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>