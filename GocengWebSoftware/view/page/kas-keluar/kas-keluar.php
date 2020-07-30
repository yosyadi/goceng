<?php
include_once("view/page/tglindo.php");
?>
<section class="content">
    <a href="?page=form-add-kas-keluar" class="btn btn-block btn-primary" style="width:80px;margin-bottom:5px">Tambah</a>
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Kas Pengeluaran</h3>
        </div>
        <form action="">
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="3%" bgcolor=#71DCFF><center>No</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Tanggal</center></th>
                  <th width="20%" bgcolor=#71DCFF><center>Uraian</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Jumlah</center></th>
                  <th width="15%" bgcolor=#71DCFF><center>Keterangan</center></th>
                  <th width="10%" bgcolor=#71DCFF><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>
                     <?php
                    $no = 0;
                    $modal = mysqli_query($conn,"SELECT * FROM uangkeluar");
                    while($row = mysqli_fetch_array($modal)){
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
                    <td><?=$row["keterangan"]?></td>
                    <td>
                      <center><a href="?page=form-edit-kas-keluar&id=<?=$row[0]?>" class="btn btn-flat btn-warning btn-xs" title="Edit"><i class="fa fa-edit "></i></a>
                      <a href="?page=proses-hapus-kas-keluar&id=<?=$row[0]?>" class="btn btn-flat btn-danger btn-xs" onclick="javascript: return confirm('Anda yakin hapus ?')" title="Lihat"><i class="fa fa-trash "></i></a></center>
                    </td>
                    
                  </tr>
                  <?php } ?> 

                   <tr>
                    <td></td>
                    <td colspan="2"><center><strong>JUMLAH KAS KELUAR</strong></center></td>
                    <?php
                      $totmasuk = mysqli_query($conn,"SELECT SUM(jumlah) AS total,tanggal FROM uangkeluar ");
                      $r = mysqli_fetch_array($totmasuk);
                    ?>
                    <td><b>Rp. <z class="pull-right"><?=number_format(($r['total']) , 0, ',', '.') . ",00"?></z></b></td>
                  
                  </tr>

                </tbody>
              </table>

                
            </div>
            <div class="box-footer">
             <!--  <a href="?page=print-tabel-guru" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a> -->
            </div>
          </div>
        </form>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
