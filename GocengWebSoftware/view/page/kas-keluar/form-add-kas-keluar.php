<div class="col-md-12">
       <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Kas Keluar</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
      $modal = mysqli_query ($conn,"SELECT * FROM uangkeluar");
      $row = mysqli_fetch_array($modal);
    ?>
    <form action="?page=proses-add-kas-keluar" method="post" class="form-horizontal">
      <div class="box-body">
        <div class="col-md-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Tanggal</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" name="tanggal" required>
          </div>
        </div>
       <div class="form-group">
              <label class="col-sm-4 control-label">kategori</label>
              <div class="col-sm-8">
            <textarea class="form-control"name="kategori" cols="20" rows="5"></textarea>
            </div>
            </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Jumlah</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="jumlah" required>
          </div>
        </div>
         <div class="form-group">
              <label class="col-sm-4 control-label">keterangan</label>
              <div class="col-sm-8">
            <textarea class="form-control"name="keterangan" cols="20" rows="5"></textarea>
            </div>
            </div>
                </div>
                </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
    </form>

      <!-- /.box-body -->
      <!-- /.box-footer -->
  </div>             
</div>
<script type="text/javascript">
  $(function(){
     $('#tgl').datepicker({
      autoclose: true
    })
     $('').datepicker({
      autoclose: true
    })
  })
</script>
<script>

</script>
