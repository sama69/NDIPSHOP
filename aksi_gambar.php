<?php
include"koneksi.php";

$id_kategori_gambar = $_POST['id_kategori_gambar'];
$nama_gambar = $_FILES['nama_gambar']['name'];
$tmp = $_FILES['nama_gambar']['tmp_name'];
$fotobaru = date('Y-m-d').$nama_gambar;
$path = "images/".$fotobaru;
	
if(move_uploaded_file($tmp,$path))
{ 
	$sql = mysql_query("INSERT INTO gambar VALUES('', '$nama_gambar', '$id_kategori_gambar')"); // Eksekusi/ Jalankan query dari variabel $query
	if($sql)
	{
		echo '<script language="javascript" type="text/javascript">
        alert("Data Tersimpan !");</script>';
		echo "<script> document.location.href='index.php?page=tampil_gambar';</script>";
	}
	else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<script> document.location.href='index.php?page=input_gambar';</script>";
	}
}
	else
{
	// Jika gambar gagal diupload, Lakukan :
	echo '<script language="javascript" type="text/javascript">
        alert("Gambar gagal untuk diupload !");</script>';
	echo "<script> document.location.href='index.php?page=input_gambar';</script>";
}
?>