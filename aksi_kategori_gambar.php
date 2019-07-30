<?php
include"koneksi.php";

$nama_kategori_gambar = $_POST['nama_kategori_gambar'];
	$sql = mysql_query("INSERT INTO kategori_gambar VALUES('','$nama_kategori_gambar')"); // Eksekusi/ Jalankan query dari variabel $query
	if($sql)
	{
		echo '<script language="javascript" type="text/javascript">
        alert("Data Tersimpan !");</script>';
		echo "<script> document.location.href='index.php?page=tampil_kategori_gambar';</script>"; 
	}
	else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<script> document.location.href='index.php?page=input_kategori_gambar';</script>";
	}
?>