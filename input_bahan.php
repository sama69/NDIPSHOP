<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-suitcase"></i> Bahan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Bahan</li>
      </ol>
    </section>
  <section class="content">
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Bahan</h3>
            </div>
            <div class="box-body">
			<form  action="aksi_bahan.php" method="POST" enctype="multipart/form-data">
			   <div class="form-group">
                <label>Nama Bahan</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-suitcase"></i>
                  </div>
                  <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" placeholder="Masukkan Nama Bahan" required>
                </div>
              </div>
              <div class="form-group">
                <label>Berat</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-balance-scale"></i>
                  </div>
                  <input type="text" name="berat" id="berat" class="form-control" placeholder="Masukkan Berat Bahan" required>
				  <div class="input-group-addon">
                    Kg
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <label>Harga</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    Rp.
                  </div>
                  <input type="number" min="0" name="harga" id="berat" class="form-control" placeholder="Masukkan Harga" required>
                </div>
              </div>
              <div class="form-group">
                <label>Stok S</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="number" min="0" name="stok_s" id="stok_s" class="form-control" placeholder="Masukkan Stok S" required>
                </div>
              </div>
			  <div class="form-group">
                <label>Stok M</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="number" min="0" name="stok_m" id="stok_m" class="form-control" placeholder="Masukkan Stok M" required>
                </div>
              </div>
			  <div class="form-group">
                <label>Stok L</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="number" min="0" name="stok_l" id="stok_l" class="form-control" placeholder="Masukkan Stok L" required>
                </div>
              </div>
			  <div class="form-group">
                <label>Stok XL</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="number" min="0" name="stok_xl" id="stok_xl" class="form-control" placeholder="Masukkan Stok XL" required>
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
			  </form>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>
