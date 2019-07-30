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
        <i class="fa fa-pencil"></i> Kelola Transaksi Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Transaksi Baru</li>
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
				  <th>Status</th>
                  <th>Proses</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from detail_pembelian,data_belanja where detail_pembelian.id_belanja=data_belanja.id_belanja and data_belanja.status='Proses'");
while ($data= mysql_fetch_array($sql))
{
	$rupiah = number_format($data['total_transfer'],2,',','.');
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[id_belanja]</td>
			<td><a href='bukti_tf/$data[gambar]' target='_blank'><img src='bukti_tf/$data[gambar]' width='100' height='130'/></a></td>
			<td>$data[tgl_bayar]</td>
			<td>Rp. $rupiah</td>
			<td>$data[bank_asal]</td>
			<td>$data[bank_tujuan]</td>
			<td>$data[status]</td>
			<td><a href=index.php?page=transaksi_baru&view=proses&id=$data[id_dp] class='btn btn-info'><i class=\"fa fa-share-square-o\"></i></a></td>
			<td><a href=index.php?page=transaksi_baru&view=hapus&id=$data[id_belanja] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
include "koneksi.php";
case"proses":
$id=$_GET['id'];
$sql=mysql_query("select * from detail_pembelian where id_dp='$id'");
$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Proses
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-home"></i> Kelola Transaksi</a></li>
        <li class="active">Proses</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
          <div class="box">
            <form method="POST" action="">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20%">Nomor Order</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['id_belanja']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Tanggal Bayar</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['tgl_bayar']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Total Transfer</th>
				  <th style="width: 10px">:</th>
				  <th> Rp. <?php echo rupiah($data['total_transfer'])?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Bank Asal</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['bank_asal']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Bank Tujuan</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['bank_tujuan']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Bukti Transfer</th>
				  <th style="width: 10px">:</th>
				  <th><img src='bukti_tf/<?php echo $data['gambar']; ?>' width='100' height='130'/></th>
                </tr>
				<tr>
				<div class="form-group">
               <th>Status Order</th>
               <th>:</th>
				<th>
				   <select class="form-control select" style="width: 30%;" name="status" id="status">
					<option selected>- Pilih Status -</option>
					<option value="baru">Baru</option>
					<option value="selesai">Selesai</option>
				   </select>
				</th>
              </div>
			  </tr>
              </table>
			  <br>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
			  </div>
            </div>
			</form>
      </div>
	  <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Barang yang di Beli</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
				  <th>Jumlah</th>
				  <th>Size</th>
                </tr>
                </thead>
                <tbody>
<?php
$id_belanja=$data['id_belanja'];
$sql=mysql_query("SELECT * FROM keranjang where id_belanja='$id_belanja'");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
		<td><img src='../$data[gambar]' width='100' height='130'/></td>
			<td>$data[nama_barang]</td>
			<td>$data[harga]</td>
			<td>$data[jumlah]</td>
			<td>$data[size]</td>
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
if(isset($_POST['save']))
{
	$status=$_POST['status'];
	
	$sql = mysql_query("UPDATE data_belanja set status='$status' where id_belanja='$id_belanja'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Proses Berhasil')
					document.location='index.php?page=transaksi_baru&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi lagi')
					document.location='index.php?page=transaksi_baru&view=proses';
					</script>";
	}
}
break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from data_belanja where id_belanja='$id'");
if($sql)
	{
		$sql1=mysql_query("delete from detail_pembelian where id_belanja='$id'");
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=transaksi_baru&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=transaksi_baru&view=default';
					</script>";
	}


break;
}
?>