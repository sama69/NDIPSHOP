<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-picture-o"></i> Kategori Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Kategori Gambar</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
		  <form action="aksi_kategori_gambar.php" method="POST">
            <div class="box-header">
              <h3 class="box-title">Tambah Kategori Gambar</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Kategori Gambar</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-picture-o"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Kategori Gambar" name="nama_kategori_gambar" id="nama_kategori_gambar" required>
                </div>
                <!-- /.input group -->
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan"></input>
			  </div>
            </div>
			</form>
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
