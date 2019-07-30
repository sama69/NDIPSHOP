<?php 
include "koneksi.php";
//kondisi parameter
$view = $_GET['view'];
switch ($view){
default:
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Kelola Data Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Gambar</li>
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
			<a href="index.php?page=input_gambar" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Gambar</a>
			</div>
			<br>
			<br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama Gambar</th>
				  <th>Edit</th>
				   <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("SELECT * FROM gambar, kategori_gambar 
						WHERE gambar.id_kategori_gambar=kategori_gambar.id_kategori_gambar
						ORDER BY id_gambar desc");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[id_gambar]</td>
			<td>$data[nama_gambar]</td>
			<td><a href=index.php?page=tampil_gambar&view=edit&id=$data[id_gambar] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_gambar&view=hapus&id=$data[id_gambar] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
	$sql=mysql_query("select * from gambar where id_bahan='$id'");
	$data=mysql_fetch_array($sql);
?>  
  
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
              <h3 class="box-title">Edit Gambar</h3>
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
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
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

  
<?php
if(isset($_POST['save']))
{
	$nama_gambar=$_POST['nama_gambar'];
	$id_kategori_gambar=$_POST['id_kategori_gambar'];
	
	$sql = mysql_query("UPDATE gambar set nama_gambar='$nama_gambar', id_kategori_gambar='$id_kategori_gambar' where id_gambar='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Edit Berhasil')
					document.location='index.php?page=tampil_gambar&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi inputan')
					document.location='index.php?page=tampil_gambar&view=edit';
					</script>";
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from gambar where id_gambar='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_gambar&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_gambar&view=default';
					</script>";
	}


break;
}
?>
