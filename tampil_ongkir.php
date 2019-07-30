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
        <i class="fa fa-pencil"></i> Kelola Data Ongkos Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="uaswebservis/uaswebservis/www/ongkoskirimjson.php">LIHAT JSON</a></li>
        <li class="active">Ongkos Kirim</li>
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
				<a href="index.php?page=input_ongkir" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Ongkir</a>
			</div>
			<br>
			<br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kota</th>
                  <th>Ongkos Kirim</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("SELECT * FROM ongkoskirim ORDER BY id_ongkoskirim");
while ($data= mysql_fetch_array($sql))
{
	$rupiah = number_format($data['ongkos_kirim'],2,',','.');
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nama_kota]</td>
			<td>Rp. $rupiah</td>
			<td><a href=index.php?page=tampil_ongkir&view=edit&id=$data[id_ongkoskirim] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_ongkir&view=hapus&id=$data[id_ongkoskirim] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
$sql=mysql_query("select * from ongkoskirim where id_ongkoskirim='$id'");
$data=mysql_fetch_array($sql);
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-truck"></i> Ongkos Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Ongkos Kirim</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Ongkos Kirim</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST">
              <div class="form-group">
                <label>Nama Kota</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-home"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kota" name="nama_kota" value="<?php echo $data['nama_kota'];?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Ongkos Kirim</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    Rp.
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Ongkos Kirim" name="ongkos_kirim" value="<?php echo $data['ongkos_kirim'];?>">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
			  </div>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>
<?php
if(isset($_POST['save']))
{
	$nama_kota=$_POST['nama_kota'];
	$ongkos_kirim=$_POST['ongkos_kirim'];
	
	$sql = mysql_query("UPDATE ongkoskirim set nama_kota='$nama_kota', ongkos_kirim='$ongkos_kirim' where id_ongkoskirim='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Edit Ongkir Berhasil')
					document.location='index.php?page=tampil_ongkir&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi inputan')
					document.location='index.php?page=tampil_ongkir&view=edit';
					</script>";
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from ongkoskirim where id_ongkoskirim='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_ongkir&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_ongkir&view=default';
					</script>";
	}


break;
}
?>
