<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-briefcase"></i> Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Barang</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <div class="box-body">
			<form action="aksi_input_barang.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Barang</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-briefcase"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama_barang">
                </div>
              </div>
			  <div class="form-group">
               <label>Kategori</label>
               <select class="form-control select" style="width: 100%;" name="kategori">
                 <option selected="selected">- Pilih Kategori -</option>
                 <?php
				  $sql = mysql_query("select * from kategori order by nama_kategori asc");
				  while($data1=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"kategori\" value=\"$data1[nama_kategori]\">".$data1['nama_kategori']." </option>";
				  }
				  ?>
               </select>
              </div>
			  <div class="form-group">
               <label>Kategori Bahan</label>
               <select class="form-control select" style="width: 100%;" name="id_bahan">
                 <option selected="selected">- Pilih Kategori Bahan -</option>
                 <?php
				  $sql = mysql_query("select * from bahan order by nama_bahan asc");
				  while($data2=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"nama\" value=\"$data2[nama_bahan]\">".$data2['nama_bahan']." </option>";
				  }
				  ?>
               </select>
              </div>
			  <div class="form-group">
                <label>Berat</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-balance-scale"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Berat" name="berat">
					<div class="input-group-addon">Kg</div>
					</div>
			  </div>
              <div class="form-group">
                <label>Harga</label>
					<div class="input-group">
						<div class="input-group-addon">Rp.</div>
						<input type="number" class="form-control" placeholder="Masukkan Harga" name="harga">
					<div class="input-group-addon">,00</div>
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok S</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="number" min="0" class="form-control" placeholder="Stok S" name="stok_s">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok M</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="number" min="0" class="form-control" placeholder="Stok M" name="stok_m">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok L</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="number" min="0" class="form-control" placeholder="Stok L" name="stok_l">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok XL</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="number" min="0" class="form-control" placeholder="Stok XL" name="stok_xl">
					</div>
			  </div>
			  <div class="form-group">
                <label>Deskripsi</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-pencil"></i>
						</div>
						<textarea class="form-control" rows="3" placeholder="Masukkan Deskripsi" name="deskripsi"></textarea>
					</div>
			  </div>
			  <div class="form-group">
                <label for="exampleInputFile">Upload File</label>
                <input type="file" id="gambar" name="gambar">
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan"></input>
			  </div>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>

















