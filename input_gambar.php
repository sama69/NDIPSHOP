<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-picture-o"></i> Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Gambar</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Gambar</h3>
            </div>
            <div class="box-body">
			<form action="aksi_gambar.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Kategori Gambar</label>
                <select class="form-control select2" style="width: 100%;" name="id_kategori_gambar" id="id_kategori_gambar">
                  <option selected="selected">- Pilih Kategori Gambar -</option>
				  <?php
				  $sql = mysql_query("select * from kategori_gambar order by nama_kategori_gambar asc");
				  while($data=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"nama\" value=\"$data[id_kategori_gambar]\">".$data['nama_kategori_gambar']." </option>";
				  }
				  ?>
                </select>
              </div>
			  <div class="form-group">
                <label for="exampleInputFile">Upload File</label>
                <input type="file" id="exampleInputFile" name="nama_gambar">
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan"></input>
			  </div>
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
