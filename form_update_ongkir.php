<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-truck"></i> Ongkos Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Ongkos Kirim</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Ongkos Kirim</h3>
            </div>
            <div class="box-body">
			<form action="update_ongkir.php" method="POST">
              <div class="form-group">
                <label>Nama Kota</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-home"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kota" name="nama_kota" value="<?php echo $row['nama_kota'];?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Ongkos Kirim</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Rp.
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Ongkos Kirim" name="ongkos_kirim" value="<?php echo $row['ongkos_kirim'];?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan"></input>
			  </div>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
     </div>

      <!-- /.box -->
   </section>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
