<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
      </ol>
    </section>
  <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang</h3>
        </div>
        <div class="box-body">
          <?php
			echo $_SESSION['nama_lengkap'];
		  ?>
        </div>
        <div class="box-footer">
          Silahkan klik menu pilihan di sebelah kiri untuk mengelola konten sistem penjualan dan pemesanan NDIPSHOP.
        </div>
      </div>
    </section>
  <div class="control-sidebar-bg"></div>
</div>