<?php 
	require 'fungsi.php';

	// menampilkan isi data dari DB
	$gambar = showGambar("SELECT * FROM data_gallery");

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

		.container .gallery {
			/*background-color: lightgrey;*/
			border: 1px solid lightgrey;
			width: 85%;
			margin: auto;
		}

		.container .gallery .pict {
			width: 220px;
			margin: 5px;
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
		<div class="gallery d-flex justify-content-start flex-wrap p-1">
			<?php foreach ($gambar as $index) : ?>
				<div class="pict border p-2">
					<figure class="figure">
					  <img 
					  	src="gambar/<?= $index['Gambar']; ?>" 
					  	class="figure-img img-fluid rounded" 
					  	alt="..."
					  	width="220" 
					  	height="220">
					  <figcaption class="figure-caption text-center"><?= $index['Nama_Gambar']?></figcaption>
					  <center>
					  	<caption><?= $index['Caption']?></caption>
					  </center>
					</figure>
					<div class="button-opsi text-center">
						<a href="edit.php?edit=<?= $index['ID']; ?>"><input class="btn btn-primary btn-sm" type="button" value="Edit"></a>
						<a href="hapus.php?hapus=<?= $index['ID']; ?>" onclick="return confirm('hapus gambar?');"><input class="btn btn-primary btn-sm" type="button" value="Hapus"></a>			
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>