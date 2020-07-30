<?php
	$Nomor	= $_GET['id'];
	$hapus	= mysqli_query($conn,"DELETE FROM uangmasuk WHERE id = '$Nomor' ");
	if ($hapus) {
		echo "<script>alert('Data Berhasil Dihapus');window.location='?page=kas-masuk'</script>";
	}
?>