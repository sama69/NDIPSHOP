<?php 
include "koneksi.php";
//kondisi parameter
$view = $_GET['view'];
switch ($view){
default:
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Kelola Data Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="uaswebservis/uaswebservis/www/barangjson.php">Lihat Data JSON</a></li>
        <li class="active">Barang</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=input_barang" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Barang</a>
			  </div>
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
				  <th>Kategori</th>
				  <th>Gambar</th>
                  <th>Berat(kg)</th>
                  <th>Harga</th>
				  <th>Stok</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from barang ORDER BY barang.id_barang desc");
while ($data= mysql_fetch_array($sql))
{
	$rupiah = number_format($data['harga'],2,',','.');
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_barang]</td>
			<td>$data[kategori]</td>
			<td><img src='images/$data[gambar]' width='100' height='130'/></td>
			<td>$data[berat]</td>
			<td>Rp. $rupiah</td>
			<td>S $data[stok_s], &nbsp;M $data[stok_m], &nbsp;L $data[stok_l], &nbsp;XL $data[stok_xl]</td>
			<td><a href=index.php?page=tampil_barang&view=edit&id=$data[id_barang] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_barang&view=hapus&id=$data[id_barang] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
	$sql=mysql_query("select * from barang where id_barang='$id'");
	$data=mysql_fetch_array($sql);
?>
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
              <h3 class="box-title">Edit Barang</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Barang</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-briefcase"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama_barang" value="<?php echo $data['nama_barang'];?>">
                </div>
                <!-- /.input group -->
              </div>
			  
			  <div class="form-group">
               <label>Kategori</label>
               <select class="form-control select" style="width: 100%;" name="kategori">
                 <option selected="selected">- Pilih Kategori -</option>
                 <?php
				  $sql = mysql_query("select * from kategori order by nama_kategori asc");
				  while($data1=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"kategori\""; if($data1['nama_kategori']==$data['kategori']){echo" selected ";} echo" value=\"$data1[nama_kategori]\">".$data1['nama_kategori']." </option>";
				  }
				  ?>
               </select>
              </div>
			  <div class="form-group">
               <label>Kategori Bahan</label>
               <select class="form-control select" style="width: 100%;" name="id_bahan">
                 <option selected="selected">- Pilih Kategori Bahan -</option>
                 <?php
				  $sqlx = mysql_query("select * from bahan order by nama_bahan asc");
				  while($data2=mysql_fetch_array($sqlx))
				  {
				  echo"<option id=\"id_bahan\""; if($data2['nama_bahan']==$data['id_bahan']){echo" selected ";} echo"value=\"$data2[nama_bahan]\">".$data2['nama_bahan']." </option>";
				  }
				  ?>
               </select>
              </div>
			  <div class="form-group">
                <label>Berat</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-briefcase"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="berat" value="<?php echo $data['berat'];?>">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Harga</label>
					<div class="input-group">
						<div class="input-group-addon">Rp.</div>
						<input type="text" class="form-control" placeholder="Masukkan Harga" name="harga" value="<?php echo ($data['harga']);?>">
					<div class="input-group-addon">,00</div>
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok S</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="text" class="form-control" placeholder="Stok S" name="stok_s" value="<?php echo $data['stok_s'];?>">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok M</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="text" class="form-control" placeholder="Stok M" name="stok_m" value="<?php echo $data['stok_m'];?>">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok L</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="text" class="form-control" placeholder="Stok L" name="stok_l" value="<?php echo $data['stok_l'];?>">
					</div>
			  </div>
			  <div class="form-group">
                <label>Stok XL</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-gg"></i>
						</div>
						<input type="text" class="form-control" placeholder="Stok XL" name="stok_xl" value="<?php echo $data['stok_xl'];?>">
					</div>
			  </div>
			  <div class="form-group">
                <label>Deskripsi</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-pencil"></i>
						</div>
						<textarea class="form-control" rows="3" placeholder="Masukkan Deskripsi" name="deskripsi"><?php echo $data['deskripsi'];?></textarea>
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
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>  
<?php
if(isset($_POST['save']))
{
	$id_bahan=$_POST['id_bahan'];
	$nama_barang=$_POST['nama_barang'];
	$kategori=$_POST['kategori'];
	$deskripsi=$_POST['deskripsi'];
	$harga=$_POST['harga'];
	$stok_s=$_POST['stok_s'];
	$stok_m=$_POST['stok_m'];
	$stok_l=$_POST['stok_l'];
	$stok_xl=$_POST['stok_xl'];
	$berat=$_POST['berat'];
	$gambar = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$fotobaru = $gambar;
	$path = "images/".$fotobaru;
	
	if(isset($_POST['cek_gambar']))
		{
			$gambar = $_FILES['gambar']['name'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$fotobaru = $gambar;
			$path = "images/".$fotobaru;
			if(move_uploaded_file($tmp,$path))
			$sql = mysql_query("UPDATE barang set id_bahan='$id_bahan', nama_barang='$nama_barang', kategori='$kategori', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat', gambar='$gambar' where id_barang='$id'");
			if($sql)
			{
				{
						echo "<script language=javascript>
							alert('Edit Barang Berhasil')
							document.location='index.php?page=tampil_barang&view=default';
							</script>";
				}
			}	
		else
			{
				echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=tampil_barang&view=edit&id=$id';
							</script>";
			}
		}
		else
		{
		$sql = mysql_query("UPDATE barang set id_bahan='$id_bahan', nama_barang='$nama_barang', kategori='$kategori', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat' where id_barang='$id'");
		if($sql)
				{
					{
						echo "<script language=javascript>
							alert('Edit Barang Berhasil')
							document.location='index.php?page=tampil_barang&view=default';
							</script>";
					}
				}	
			else

				{
				echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=tampil_barang&view=edit&id=$id';
							</script>";
				}
		}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from barang where id_barang='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_barang&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_barang&view=default';
					</script>";
	}


break;
}
?>  
