<?php 
include "koneksi.php";
//kondisi parameter
$view = $_GET['view'];
switch ($view){
default:
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Kelola Transaksi Selesai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Transaksi Selesai</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Nomor Order</th>
				  <th>Bukti Transfer</th>
				  <th>Tanggal Bayar</th>
                  <th>Total Transfer</th>
                  <th>Bank Asal</th>
				  <th>Bank Tujuan</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from detail_pembelian,data_belanja where detail_pembelian.id_belanja=data_belanja.id_belanja and data_belanja.status='selesai'");
while ($data= mysql_fetch_array($sql))
{
	$rupiah = number_format($data['total_transfer'],2,',','.');
	{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[id_belanja]</td>
			<td><img src='bukti_tf/$data[gambar]' width='100' height='130'/></td>
			<td>$data[tgl_bayar]</td>
			<td>Rp. $rupiah</td>
			<td>$data[bank_asal]</td>
			<td>$data[bank_tujuan]</td>
			<td><a href=index.php?page=transaksi_selesai&view=hapus&id=$data[id_dp] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
		</tr>		
		";
		$no++;
	}
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
include"koneksi.php";
break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from detail_pembelian where id_dp='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=transaksi_selesai&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=transaksi_selesai&view=default';
					</script>";
	}


break;
}
?>  
