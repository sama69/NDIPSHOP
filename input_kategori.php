<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-th-list"></i> Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>
            <div class="box-body">
			<form action="aksi_kategori.php" method="POST">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Nama Kategori</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-th-list"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Kategori" name="nama_kategori">
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
