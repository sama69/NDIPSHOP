<?php 
include "koneksi.php";
$view = $_GET['view'];
switch ($view){
default:
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Kelola Data Bahan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="uaswebservis/uaswebservis/www/json.php">Lihat JSON</a></li>
        <li class="active">Bahan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=input_bahan" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Bahan</a>
			  </div>
			  <br>
			  <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bahan</th>
				  <th>Gambar</th>
                  <th>Berat</th>
                  <th>Harga</th>
                  <th>Stok</th>
				  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("SELECT * FROM bahan ORDER BY nama_bahan");
while ($data= mysql_fetch_array($sql))
{
	$rupiah = number_format($data['harga'],2,',','.');
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_bahan]</td>
			<td><img src='images/$data[gambar]' width='100' height='130'/></td>
			<td>$data[berat]</td>
			<td>Rp. $rupiah</td>
			<td>S $data[stok_s], &nbsp;M $data[stok_m], &nbsp;L $data[stok_l], &nbsp;XL $data[stok_xl]</td>
			<td><a href=index.php?page=tampil_bahan&view=edit&id=$data[id_bahan] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_bahan&view=hapus&id=$data[id_bahan] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
		</tr>		
		";
		$no++;
}
?>
                </tbody>
              </table>
			<script>
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			</script>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
	break;
	case "edit":
	$id=$_GET['id'];
	$sql=mysql_query("select * from bahan where id_bahan='$id'");
	$data=mysql_fetch_array($sql);
?>

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
              <h3 class="box-title">Edit Bahan</h3>
            </div>
            <div class="box-body">
			<form  action="" method="POST" enctype="multipart/form-data">
			   <div class="form-group">
                <label>Nama Bahan</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-suitcase"></i>
                  </div>
                  <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" placeholder="Masukkan Nama Bahan" value="<?php echo $data['nama_bahan'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>Berat</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-balance-scale"></i>
                  </div>
                  <input type="text" name="berat" id="berat" class="form-control" placeholder="Masukkan Berat Bahan" value="<?php echo $data['berat'];?>">
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
                  <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga" value="<?php echo ($data['harga']);?>">
                </div>
              </div>
              <div class="form-group">
                <label>Stok S</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="text" name="stok_s" id="stok_s" class="form-control" placeholder="Masukkan Stok S" value="<?php echo $data['stok_s'];?>">
                </div>
              </div>
			  <div class="form-group">
                <label>Stok M</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="text" name="stok_m" id="stok_m" class="form-control" placeholder="Masukkan Stok M" value="<?php echo $data['stok_m'];?>">
                </div>
              </div>
			  <div class="form-group">
                <label>Stok L</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="text" name="stok_l" id="stok_l" class="form-control" placeholder="Masukkan Stok L" value="<?php echo $data['stok_l'];?>">
                </div>
              </div>
			  <div class="form-group">
                <label>Stok XL</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-gg"></i>
                  </div>
                  <input type="text" name="stok_xl" id="stok_xl" class="form-control" placeholder="Masukkan Stok XL" value="<?php echo $data['stok_xl'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-pencil"></i>
                  </div>
                  <textarea class="form-control" rows="3" placeholder="Masukkan Deskripsi" name="deskripsi" ><?php echo $data['deskripsi'];?></textarea>
                </div>
              </div>
			  <div class="form-group">
				<a class="example-image-link" href="images/"<?php echo $data['gambar'] ?> target="_blank">
				<img src="images/<?php echo $data['gambar']?>" width="10%"><br>
                <input type="checkbox" name="cek_gambar"><label>&nbsp; &nbsp; Ceklist jika ingin mengubah gambar</label>
                <input type="file" id="gambar" name="gambar">
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
			  </div>
			  </form>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>


<?php
if(isset($_POST['save']))
{
	$nama_bahan=$_POST['nama_bahan'];
	$deskripsi=$_POST['deskripsi'];
	$harga=$_POST['harga'];
	$stok_s=$_POST['stok_s'];
	$stok_m=$_POST['stok_m'];
	$stok_l=$_POST['stok_l'];
	$stok_xl=$_POST['stok_xl'];
	$berat=$_POST['berat'];
	$biaya_produksi=$_POST['biaya_produksi'];
	
	if(isset($_POST['cek_gambar']))
	{
		$gambar = $_FILES['gambar']['name'];
		$tmp = $_FILES['gambar']['tmp_name'];
		$fotobaru = $gambar;
		$path = "images/".$fotobaru;
		if(move_uploaded_file($tmp,$path))
		{
			$sql = mysql_query("UPDATE bahan set nama_bahan='$nama_bahan', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat', gambar='$gambar', biaya_produksi='$biaya_produksi' where id_bahan='$id'");
			if($sql)
				{
					{
						echo "<script language=javascript>
							alert('Edit Bahan Berhasil')
							document.location='index.php?page=tampil_bahan&view=default';
							</script>";
					}
				}	
			else

				{
				echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=tampil_bahan&view=edit';
							</script>";
				}
		}
		else
		{
						echo "<script language=javascript>
								alert('Gagal, Mengupload Foto')
								document.location='index.php?page=tampil_bahan&view=edit&id=$id';
								</script>";
		}
	}
	else
	{
		$sql = mysql_query("UPDATE bahan set nama_bahan='$nama_bahan', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat' where id_bahan='$id'");
		if($sql)
				{
					{
						echo "<script language=javascript>
							alert('Edit Bahan Berhasil')
							document.location='index.php?page=tampil_bahan&view=default';
							</script>";
					}
				}	
			else

				{
				echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=tampil_bahan&view=edit';
							</script>";
				}
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from bahan where id_bahan='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_bahan&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_bahan&view=default';
					</script>";
	}
break;
}
?>