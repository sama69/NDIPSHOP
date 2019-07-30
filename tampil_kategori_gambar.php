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
        <i class="fa fa-pencil"></i> Kelola Kategori Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Kategori Gambar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-3">
				<a href="index.php?page=input_kategori_gambar" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Kategori Gambar</a>
			</div>
			<br>
			<br>
            <!-- /.box-header -->
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
$sql=mysql_query("SELECT * FROM kategori_gambar ORDER BY id_kategori_gambar");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_kategori_gambar]</td>
			<td><a href=index.php?page=tampil_kategori_gambar&view=edit&id=$data[id_kategori_gambar]><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_kategori_gambar&view=hapus&id=$data[id_kategori_gambar] onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
	$sql=mysql_query("select * from kategori_gambar where id_kategori_gambar='$id'");
	$data=mysql_fetch_array($sql);
?>
  
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
  <section class="content">
	<div class="col-md-12">
          <div class="box box-danger">
		  <form action="" method="POST">
            <div class="box-header">
              <h3 class="box-title">Edit Kategori Gambar</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Kategori Gambar</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-picture-o"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Kategori Gambar" name="nama_kategori_gambar" id="nama_kategori_gambar" value="<?php echo $data['nama_kategori_gambar'];?>">
                </div>
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
			  </div>
            </div>
			</form>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>

<?php
if(isset($_POST['save']))
{
	$nama_kategori_gambar=$_POST['nama_kategori_gambar'];
	
	$sql = mysql_query("UPDATE kategori_gambar set nama_kategori_gambar='$nama_kategori_gambar' where id_kategori_gambar='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Edit Berhasil')
					document.location='index.php?page=tampil_kategori_gambar&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi inputan')
					document.location='index.php?page=tampil_kategori_gambar&view=edit';
					</script>";
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from kategori_gambar where id_kategori_gambar='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_kategori_gambar&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_kategori_gambar&view=default';
					</script>";
	}
?>
<?php
break;
}
?>
