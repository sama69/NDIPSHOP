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
        <i class="fa fa-pencil"></i> Kelola Data Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="uaswebservis/uaswebservis/www/categoryjson.php">Lihat Data JSON</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=input_kategori" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Kategori</a>
			  </div>
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_kategori]</td>
			<td><a href=index.php?page=tampil_kategori&view=edit&id=$data[id_kategori] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_kategori&view=hapus&id=$data[id_kategori] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
	$sql=mysql_query("select * from kategori where id_kategori='$id'");
	$data=mysql_fetch_array($sql);
?>
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
  <section class="content">
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Kategori</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST">
              <div class="form-group">
                <label>Nama Kategori</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-th-list"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Kategori" name="nama_kategori" value="<?php echo $data['nama_kategori'];?>">
                </div>
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
	$nama_kategori=$_POST['nama_kategori'];
	
	$sql = mysql_query("UPDATE kategori set nama_kategori='$nama_kategori' where id_kategori='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Edit Berhasil')
					document.location='index.php?page=tampil_kategori&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi inputan')
					document.location='index.php?page=tampil_kategori&view=edit';
					</script>";
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from kategori where id_kategori='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_kategori&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_kategori&view=default';
					</script>";
	}


break;
}
?>
