<?php
include"koneksi.php";
$id=$_GET['id'];
$sql=mysql_query("select * from admin where id_admin='$id'");
$data=mysql_fetch_array($sql);
$passlama=$data['password'];
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-pencil"></i> Profile
      </h1>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Profile</h3>
            </div>
            <div class="box-body">
			<form  action="" method="POST" enctype="multipart/form-data">
			   <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>E-Mail</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-envelope"></i>
                  </div>
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email'];?>">
                </div>
              </div>
			   <div class="form-group">
                <label>No Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-phone"></i>
                  </div>
                  <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?php echo $data['no_telp'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username'];?>">
                </div>
              </div>
			  <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                  </div>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
			  <div class="form-group">
                <label>Ketik Ulang Password</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                  </div>
                  <input type="password" name="repass" id="repass" class="form-control">
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
	$password = $_POST['password'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$email=$_POST['email'];
	$no_telp=$_POST['no_telp'];
	$repass=$_POST['repass'];
	if($password==NULL)
	{
		$password=$passlama;
	}
	else
	{
		if($password==$repass)
		{
			$password=md5($password);
		}
		else
		{
			echo "<script language=javascript>
						alert('Password yang anda masukkan salah')
						document.location='index.php?page=profile_admin&id=$_SESSION[id]';
						</script>";
		}
		
	}
	$sql = mysql_query("UPDATE admin set username='$username', password='$password', nama_lengkap='$nama_lengkap', email='$email', no_telp='$no_telp' where id_admin='$id'");
			if($sql)
			{
				echo "<script language=javascript>
				alert('Edit profile Berhasil')
				document.location='index.php?page=profile_admin&id=$_SESSION[id]';
				</script>";
			}
			else
			{
				echo "<script language=javascript>
				alert('Gagal, Silahkan ulangi inputan')
				document.location='index.php?page=profile_admin&id=$_SESSION[id]';
				</script>";
			}
}
?>