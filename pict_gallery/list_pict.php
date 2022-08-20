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
	<link rel="stylesheet" href="css/list_pict.css">
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
			<div class="gallery">
				<?php foreach ($gambar as $index) : ?>
					<div class="pict border p-2">
						<figure class="figure">
						  <img 
						  	src="gambar/<?= $index['Gambar']; ?>" 
						  	class="figure-img img-fluid rounded" 
						  	alt="picture">
						  <figcaption class="figure-caption text-center"><?= $index['Nama_Gambar']?></figcaption>
						  <center>
						  	<caption><?= $index['Caption']?></caption>
						  </center>
						</figure>
						<div class="button-opsi text-center">
							<a href="edit.php?edit=<?= $index['ID']; ?>"><input class="btn btn-primary btn-sm" type="button" value="Edit Pict"></a>
							<a href="hapus.php?hapus=<?= $index['ID']; ?>" onclick="return confirm('hapus gambar?');"><input class="btn btn-primary btn-sm" type="button" value="Hapus Pict"></a>			
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</main>	

	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>