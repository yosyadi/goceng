<?php
	$Nomor	= $_GET['id'];
	$edit 	= mysqli_query($conn,"SELECT * FROM uangmasuk WHERE id = '$Nomor' ");
	$row	= mysqli_fetch_array($edit); 	
?>
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Kas Pemasukan</h3>
	</div>
	<div class="box-body">
		<form action="?page=proses-ubah-kas-masuk" class="form-horizontal" method="post">
			
			<div class="form-group">
				<label for="" class="col-md-2 control-label">ID</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="id" id="id" value="<?=$row['id']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Tanggal</label>
				<div class="col-md-3">
					<input type="date" class="form-control" name="tanggal"  value="<?=$row['tanggal']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Kategori</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="kategori" value="<?=$row['kategori']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">Jumlah</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="jumlah" value="<?=$row['jumlah']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 control-label">keterangan</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="keterangan" value="<?=$row['keterangan']?>">
				</div>
			</div>
			<div class="box-footer ">
				<button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Anda yakin ubah ?')" >Ubah</button>
			<button type="reset" class="btn btn-danger">Batal</button>
			</div>
		</form>
	</div>
</div>