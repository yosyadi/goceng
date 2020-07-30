<?php
	$Nomor	= $_GET['id'];
	$hapus	= mysqli_query($conn,"DELETE FROM uangkeluar WHERE id = '$Nomor' ");
	if ($hapus) {
		echo "<script>alert('Data Berhasil Dihapus');window.location='?page=kas-keluar'</script>";
	}
?>