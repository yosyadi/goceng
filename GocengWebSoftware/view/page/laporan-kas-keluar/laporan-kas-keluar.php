<?php
include_once("view/page/tglindo.php");
?>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Laporan Kas Pengeluaran</h3>
				</div>
				<div class="box-body">
					<form method="POST" action="view/cetak-kas-keluar.php" target="_blank" >      
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Awal</label>
							<div class="col-sm-3">
								<div class="col-sm-2">
									<input type="date" id="datepicker" name="from">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Akhir</label>
							<div class="col-sm-3">
								<div class="col-sm-2">
									<input type="date" id="datepicker" name="end">
								</div>
							</div>
						</div>
						<button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Cetak PDF
						</button>
						<form>
							<div class="box-header with-border">
							</div>
							<form action="">
								<div class="box-body">
									<div class="table-responsive">
										<br>
									</div>
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th width="3%" bgcolor=#71DCFF><center>No</center></th>
												<th width="15%" bgcolor=#71DCFF><center>Tanggal</center></th>
												<th width="25%" bgcolor=#71DCFF><center>Kategori</center></th>
												<th width="15%" bgcolor=#71DCFF><center>pengeluaran</center></th>
												<th width="15%" bgcolor=#71DCFF><center>Saldo</center></th>
											</tr>
										</thead>
										<tbody>
												<?php
											$no = 0;
											$saldo = 0;
											$modal1 = mysqli_query($conn,"SELECT * FROM uangkeluar order by tanggal asc");
											
											while($row = mysqli_fetch_array($modal1)){
											$saldo = $saldo + $row['jumlah'];

											$no++;
											?>
											<tr>
												<td><center><?=$no?></center></td>
												<td><center><?php echo TanggalIndo($row['tanggal']);?></center></td>
												<td><?=$row["kategori"]?></td>
												<?php
												if ($row['jumlah'] == 0) {echo "<td></td>";}
												else {
														echo "<td>Rp. <z class=\"pull-right\">".number_format(($row['jumlah']) , 0, ',', '.') . ",00"."</z></td>";
														}
													?> 
												<td>Rp. <z class="pull-right"><?php echo number_format(@$saldo); ?>,00</z></td>  

											</tr>
											<?php } ?> 

											<tr>
												<td></td>
												<td colspan="3"><center><strong>JUMLAH</strong></center></td>
												<?php
													$totmasuk1 = mysqli_query($conn,"SELECT SUM(jumlah) AS total2, tanggal FROM uangkeluar ");
													$r1 = mysqli_fetch_array($totmasuk1);
												?>
												<td><b>Rp. <z class="pull-right"><?=number_format(($r1['total2']) , 0, ',', '.') . ",00"?></z></b></td>
											</tr>	
										</tbody>
									</table>
								</div>
							</form>
						</form>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  $(function(){
     $('#from').datepicker({
      autoclose: true
    })
     $('#end').datepicker({
      autoclose: true
    })
  })
</script>
<script>

</script>