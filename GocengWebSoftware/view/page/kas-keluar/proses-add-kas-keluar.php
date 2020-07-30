<?php
	$tanggal  = mysqli_real_escape_string($conn,$_POST['tanggal']);
	$jumlah  = mysqli_real_escape_string($conn,$_POST['jumlah']);
	$kategori  = mysqli_real_escape_string($conn,$_POST['kategori']);
	$keterangan = mysqli_real_escape_string($conn,$_POST['keterangan']);


$q = mysqli_query($conn, "INSERT INTO uangkeluar (tanggal,jumlah,kategori,keterangan) VALUES ('$tanggal','$jumlah','$kategori','$keterangan')") or die (mysqli_error());
	if ($q) {
		echo "<script>alert('Data berhasil di simpan');window.location='?page=kas-keluar'</script>";
	}
?>
