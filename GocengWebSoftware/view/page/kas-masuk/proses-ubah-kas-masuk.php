<?php

$id			= $conn->real_escape_string(trim($_POST['id']));
$tanggal    = $conn->real_escape_string(trim($_POST['tanggal']));
$jumlah     = $conn->real_escape_string(trim($_POST['jumlah']));
$kategori   = $conn->real_escape_string(trim($_POST['kategori']));
$keterangan   = $conn->real_escape_string(trim($_POST['keterangan']));


$ubah		= mysqli_query($conn,"UPDATE uangmasuk SET tanggal ='$tanggal', jumlah = '$jumlah', kategori = '$kategori', keterangan = '$keterangan' WHERE id = '$id' ") or die(mysqli_error($conn));
if ($ubah) {
	echo "<script>alert('Data Berhasil Diubah');window.location='?page=kas-masuk'</script>";
}

?>