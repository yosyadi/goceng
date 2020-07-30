<?php
include_once("control/tgl.php");
?>
<section class="content">
<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php
                      $totmasuk = mysqli_query($conn,"SELECT SUM(jumlah) AS total,tanggal FROM uangmasuk ");
                      $r = mysqli_fetch_array($totmasuk);
                    ?>
                    <b>RP. <z class="pull-right"><?=number_format(($r['total']) , 0, ',', '.') . ""?></z></b>


              </h3>

              <p><b>KAS PEMASUKAN</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i> 
            </div>
            <a href="?page=kas-masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                
              <?php
                      $totmasuk1 = mysqli_query($conn,"SELECT SUM(jumlah) AS total,tanggal FROM uangkeluar ");
                      $r = mysqli_fetch_array($totmasuk1);
                    ?>
                   <b>RP.  <z class="pull-right"><?=number_format(($r['total']) , 0, ',', '.') . ""?></z></b> 


              </h3>

              <p><b>KAS PENGELUARAN</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="?page=kas-keluar" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                
              <?php
                      $totmasuk = mysqli_query($conn,"SELECT SUM(jumlah) AS total, tanggal FROM uangmasuk ");
                      $r = mysqli_fetch_array($totmasuk);
                      $totmasuk1 = mysqli_query($conn,"SELECT SUM(jumlah) AS total2, tanggal FROM uangkeluar ");
                      $r1 = mysqli_fetch_array($totmasuk1);
                    ?>
                    <b>Rp. <z class="pull-right"><?=number_format(($r['total'] - $r1['total2'] ) , 0, ',', '.') . ""?></z></b>


              </h3>

              <p><b>SALDO AKHIR</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?page=laporan-rekapitulasi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>


<!-- /.content -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
