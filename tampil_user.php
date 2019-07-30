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
        <i class="fa fa-pencil"></i> Kelola Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Pengguna</li>
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
				<a href="index.php?page=input_user" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah User</a>
			  </div>
			  <br>
			  <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>E-Mail</th>
                  <th>No Telepon</th>
				  <th>Hak Akses</th>
				  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("SELECT * FROM admin ORDER BY username");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td>$no</td>
			<td>$data[username]</td>
			<td>$data[nama_lengkap]</td>
			<td>$data[email]</td>
			<td>$data[no_telp]</td>
			<td>$data[hak_akses]</td>
			<td><a href=index.php?page=tampil_user&view=edit&id=$data[id_admin]><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=tampil_user&view=hapus&id=$data[id_admin] onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
	$sql=mysql_query("select * from admin where id_admin='$id'");
	$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user"></i> Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Pengguna</h3>
            </div>
            <div class="box-body">
			<form  action="" method="POST">
			   <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama" value="<?php echo $data['nama_lengkap'];?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>E-Mail</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-envelope"></i>
                  </div>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan E-Mail" value="<?php echo $data['email'];?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>No Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-phone"></i>
                  </div>
                  <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No. Telepon" value="<?php echo $data['no_telp'];?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- IP mask -->
              <div class="form-group">
                <label>Username</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $data['username'];?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
			  
			  <div class="form-group">
                <label>Password</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                  </div>
                  <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
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
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$email=$_POST['email'];
	$no_telp=$_POST['no_telp'];
	$hak_akses=$_POST['hak_akses'];
	
	$sql = mysql_query("UPDATE admin set username='$username', password='$password', 
	nama_lengkap='$nama_lengkap', email='$email', no_telp='$no_telp' where id_admin='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Edit User Berhasil')
					document.location='index.php?page=tampil_user&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi inputan')
					document.location='index.php?page=tampil_user&view=edit';
					</script>";
	}
}
break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from admin where id_admin='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=tampil_user&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=tampil_user&view=edit';
					</script>";
	}

?>
<?php
break;
}
?>

