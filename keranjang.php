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
        <li><a href="#">Kelola Data</a></li>
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
$sql=mysql_query("SELECT * FROM barang ORDER BY id_barang desc");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_barang]</td>
			<td><img src='images/$data[gambar]' width='100' height='130'/></td>
			<td>$data[berat]</td>
			<td>$data[harga]</td>
			<td>S $data[stok_s], &nbsp;M $data[stok_m], &nbsp;L $data[stok_l], &nbsp;XL $data[stok_xl]</td>
			<td><a href=index.php?page=tampil_barang&view=edit&id=$data[id_barang]><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_barang&view=hapus&id=$data[id_barang] onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
if(isset($_POST['save']))
{
	$id_bahan=$_POST['id_bahan'];
	$id_kategori=$_POST['id_kategori'];
	$nama_barang=$_POST['nama_barang'];
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
			$sql = mysql_query("UPDATE barang set id_bahan='$id_bahan', id_kategori='$id_kategori', nama_barang='$nama_barang', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat', gambar='$gambar' where id_barang='$id'");
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
		$sql = mysql_query("UPDATE barang set id_bahan='$id_bahan', id_kategori='$id_kategori', nama_barang='$nama_barang', deskripsi='$deskripsi', harga='$harga', stok_s='$stok_s', stok_m='$stok_m', stok_l='$stok_l', stok_xl='$stok_xl', berat='$berat', gambar='$gambar' where id_barang='$id'");
		if($sql)
				{
					{
						echo "<script language=javascript>
							alert('Edit Barang Berhasil')
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
