<?php
include('koneksi.php');
session_start();
// terima data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	// kalau username dan password kosong
	header('location:../login.php?error=1');
	break;
} else if (empty($username)) {
	// kalau username saja yang kosong
	header('location:../login.php?error=1');
	break;
} else if (empty($password)) {
	// kalau password saja yang kosong
	header('location:../login.php?error=1');
	break;
}
		$query = mysql_query("SELECT * FROM admin WHERE username='$username' and password='$password'");
		if(mysql_num_rows($query)==1)
		{
			//jika yg login admin akan bernilai 1
			$data = mysql_fetch_array($query);
			$_SESSION['username'] = $data['username'];			
			$_SESSION['id'] = $data['id_admin'];
			$_SESSION['nama_lengkap'] = $data['nama_lengkap'];			
			header("location:../admin/index.php?page=home");	
		}
		else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Username atau Password yang anda masukkan salah!");</script>';
		echo "<script> document.location.href='index.php?page=login';</script>";
	}	
		
?>