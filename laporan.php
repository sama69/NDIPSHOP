<?php
error_reporting(0);
session_start(); 
include "koneksi.php";
$tglsekarang=date('d-m-Y');
$tanggal = $_GET['periode'];
$pecah = explode(' - ',$tanggal);
$tgl1 = explode('/',$pecah[0]);
$tgl2 = explode('/',$pecah[1]);
$periode_awal = $tgl1[2]."-".$tgl1[0]."-".$tgl1[1] ; 
$periode_akhir = $tgl2[2]."-".$tgl2[0]."-".$tgl2[1] ; 
?>
<style>
@media print {
  body * {
    visibility: hidden;
	}
  nav * {
	 display :none;
	 visibility: hidden;
  }
  footer * {
	 display :none;
	 visibility: hidden;
  }
  #unprint, #alert {
	  display :none;
	  visibility: hidden;
  }
  #a{
	  display :none;
	  visibility: hidden;
  }
  #printarea, #printarea * {
    visibility: visible;
	}
  #printarea {
    position: auto;
    left: 0;
    top: 0;
	}
}
@page {
  size: A4 ;
  margin: 0.5cm;
  }
</style>

<body>
<div id="printarea">
<p align="center">Ndipshop</p>
<p align="center">Jl.Sumberejo Mranggen Demak</p>
<p align="center">LAPORAN PENJUALAN</p>
<p align="center">Periode <?php echo $periode_awal." Sampai ".$periode_akhir; ?></p>
<table width="100%" height="71" border="1" align="center">
  <tr bgcolor="#999999">
    <td width="30">No.</td>
    <td width="68">Id Order </td>
    <td width="107">Tanggal Bayar </td>
    <td width="135">Nama Konsumen </td>
    <td width="97">Nama Barang </td>
    <td width="51">Jumlah</td>
    <td width="102">Harga Barang </td>
    <td width="105">Ongkos Kirim </td>
    <td width="47">Total</td>
  </tr>
<?php
$no=1;
$subttl="";
$sql=mysql_query("SELECT * FROM customer, data_belanja,ongkoskirim, detail_pembelian,keranjang where detail_pembelian.id_belanja=data_belanja.id_belanja and data_belanja.email=customer.email and keranjang.id_belanja=data_belanja.id_belanja and data_belanja.kota_penerima=ongkoskirim.nama_kota and data_belanja.status='selesai' and detail_pembelian.tgl_bayar between '$periode_awal' and '$periode_akhir' group by keranjang.id_belanja");
if (mysql_num_rows($sql)==0)
{
	echo"Data Tidak Tersedia";
}
else
{
while ($data= mysql_fetch_array($sql))
{
	$harga = number_format($data['harga'],2,',','.');
	$ongkir = number_format($data['ongkos_kirim'],2,',','.');
	$total = number_format($data['total'],2,',','.');
	$subttl = $data['total'] + $subttl;
	$subttlrp = number_format($subttl,2,',','.');
	echo"
	  <tr>
		<td>$no</td>
		<td>$data[id_belanja]</td>
		<td>$data[tgl_bayar]</td>
		<td>$data[nama_user]</td>
		<td>";
		$sql1 = mysql_query("SELECT * FROM keranjang where id_belanja='$data[id_belanja]'");
		while ($d= mysql_fetch_array($sql1))
		{
			echo "$d[nama_barang]";
			if(mysql_num_rows($sql1)>1)
			{
				echo"<br>";
			}
		}
		echo"
		</td>
		<td>";
		$sql1 = mysql_query("SELECT * FROM keranjang where id_belanja='$data[id_belanja]'");
		while ($d= mysql_fetch_array($sql1))
		{
			echo "$d[jumlah]";
			if(mysql_num_rows($sql1)>1)
			{
				echo"<br>";
			}
		}
		echo"
		</td>
		<td>";
		$sql1 = mysql_query("SELECT * FROM keranjang where id_belanja='$data[id_belanja]'");
		while ($d= mysql_fetch_array($sql1))
		{
			$harga = number_format($d['harga'],2,',','.');
			echo "Rp. $harga";
			if(mysql_num_rows($sql1)>1)
			{
				echo"<br>";
			}
		}
		echo"
		</td>

		<td>Rp. $ongkir</td>
		<td>Rp. $total</td>
	  </tr>
	  ";
  $no++;
}
}
?>
  <tr>
    <td colspan="8">Total</td>
    <td><?php echo "Rp. ".$subttlrp ?></td>
  </tr>
</table>
<p align="right">Mranggen Demak, <?php echo"$tglsekarang" ?></p>
<p align="right">&nbsp;</p>
<p align="right"><?php echo $_SESSION['nama_lengkap']; ?></p>
</div>
</body>
<center><a href="javascript:window.print()"><input type="submit" class="btn btn-primary" value="Cetak"></input></a></center>