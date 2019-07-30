<?php
include"koneksi.php";

$nama_kota = $_POST['nama_kota'];
$ongkos_kirim = $_POST['ongkos_kirim'];

	$sql = mysql_query("INSERT INTO ongkoskirim VALUES('','$nama_kota', '$ongkos_kirim')"); // Eksekusi/ Jalankan query dari variabel $query
	if($sql)
	{
		echo '<script language="javascript" type="text/javascript">
        alert("Data Tersimpan !");</script>';
		echo "<script> document.location.href='index.php?page=tampil_ongkir';</script>";
	}
	else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<script> document.location.href='index.php?page=input_ongkir';</script>";
	}
?>