<?php
session_start();
if(empty($_SESSION['username']))
{
	header("location:login.php");
}
else
{	
error_reporting(0);
include"koneksi.php";
include"header.php";
include"menu.php";
$get_page=$_GET['page'];
if(empty($get_page))
{
	$get_page="home";
}
switch($get_page)
{
	case"home";
	include"home.php";
	break;
	
	case"input_user";
	include"input_user.php";
	break;
	
	case"input_kategori_gambar";
	include"input_kategori_gambar.php";
	break;
	
	case"input_gambar";
	include"input_gambar.php";
	break;
	
	case"input_kategori";
	include"input_kategori.php";
	break;
	
	case"input_barang";
	include"input_barang.php";
	break;
	
	case"input_ongkir";
	include"input_ongkir.php";
	break;
	
	case"input_bahan";
	include"input_bahan.php";
	break;
	
	case"tampil_user";
	include"tampil_user.php";
	break;
	
	case"tampil_kategori_gambar";
	include"tampil_kategori_gambar.php";
	break;
	
	case"tampil_gambar";
	include"tampil_gambar.php";
	break;
	
	case"tampil_kategori";
	include"tampil_kategori.php";
	break;
	
	case"tampil_barang";
	include"tampil_barang.php";
	break;
	
	case"tampil_ongkir";
	include"tampil_ongkir.php";
	break;
	
	case"tampil_bahan";
	include"tampil_bahan.php";
	break;
	
	case"tampil_customer";
	include"tampil_customer.php";
	break;
	
	case"transaksi_baru";
	include"kelola_transaksi.php";
	break;
	
	case"transaksi_selesai";
	include"transaksi_selesai.php";
	break;
	
	case"profile_admin";
	include"profile_admin.php";
	break;
	
	case"form_laporan";
	include"form_laporan.php";
	break;
	
	case"laporan";
	include"laporan.php";
	break;
	
	case"kritik";
	include"kritik.php";
	break;
	

}
}
include"footer.php";
function rupiah($harga)
{
	$harga=number_format($harga,2,',','.');
	return $harga;
}
?>
