<?php
include"koneksi.php";

$nama_barang = $_POST['nama_barang'];
$id_bahan = $_POST['id_bahan'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok_s = $_POST['stok_s'];
$stok_m = $_POST['stok_m'];
$stok_l = $_POST['stok_l'];
$stok_xl = $_POST['stok_xl'];
$berat = $_POST['berat'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$fotobaru = $gambar;
$path = "images/".$fotobaru;
	
if(move_uploaded_file($tmp,$path))
{ 
	$sql = mysql_query("INSERT INTO barang VALUES('','$id_bahan', '$nama_barang', '$kategori', '$deskripsi', '$harga', '$stok_s', '$stok_m', '$stok_l', '$stok_xl', '$berat', '$gambar')"); // Eksekusi/ Jalankan query dari variabel $query
	if($sql)
	{
		echo '<script language="javascript" type="text/javascript">
        alert("Data Tersimpan !");</script>';
		echo "<script> document.location.href='index.php?page=tampil_barang';</script>";
	}
	else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<script> document.location.href='index.php?page=input_barang';</script>";
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