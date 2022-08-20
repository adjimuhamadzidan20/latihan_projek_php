<?php  
	require 'fungsi.php';

	$id = $_GET['hapus'];

	if (hapusData($id) > 0) {
		echo "
			<script>
				alert('Gambar berhasil di delete');
				document.location.href = 'list_pict.php';
			</script>
		";
	}

	else {
		echo "
			<script>
				alert('Gambar gagal di delete');
				document.location.href = 'list_pict.php';
			</script>
		";
	}


?>