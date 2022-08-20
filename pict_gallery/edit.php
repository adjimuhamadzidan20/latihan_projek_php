<?php 
	require 'fungsi.php';

	$id = $_GET['edit'];

	$isi = showGambar("SELECT * FROM data_gallery WHERE ID = $id")[0];

	if (isset($_POST['ubah'])) {
		if (update($_POST) > 0) {
			echo "
				<script>
					alert('Gambar berhasil di update');
					document.location.href = 'list_pict.php';
				</script>
			";
		}

		else {
			echo "
				<script>
					alert('Gambar gagal di update');
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
	<link rel="stylesheet" href="css/edit.css">
	<title>Pict Gallery</title>
</head>
<body>
	<header>
		<div class="title">
			<h1>Update Gallery</h1>
			<p>Edit Gambar</p>
		</div>
	</header>
	<main>
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
	</main>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>