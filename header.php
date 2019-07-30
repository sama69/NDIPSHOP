<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NdipShop</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
$sql=mysql_query("SELECT * FROM data_belanja where status='Proses'");
$notif_angka= mysql_num_rows($sql);
$data=mysql_fetch_array($sql);

$sqlx=mysql_query("SELECT * FROM kds where id_kds");
$notif_angkax= mysql_num_rows($sqlx);
$datax=mysql_fetch_array($sqlx);
?>
  <header class="main-header">
    <a href="#" class="logo">
     
      <span class="logo-lg">NdipShop</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope"></i>
              <span class="label label-warning"><?php echo $notif_angkax ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $notif_angkax ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
				  while ($notif= mysql_fetch_array($sql));
				  {
				  ?>
				  <li>
                    <a href="index.php?page=kritik">
                      <i class="fa fa-comments text-aqua"></i> Ada Kritik dan Saran <?php echo $datax['email'];?>
                    </a>
                  </li>
				  <?php
				  }
				  ?>
                </ul>
              </li>
              <li class="footer"><a href="index.php?page=transaksi_baru">View all</a></li>
            </ul>
          </li>
		  <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $notif_angka ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $notif_angka ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
				  while ($notif= mysql_fetch_array($sql));
				  {
				  ?>
				  <li>
                    <a href="index.php?page=transaksi_baru">
                      <i class="fa fa-gift text-aqua"></i> Ada Orderan Baru dari <?php echo $data['email'];?>
                    </a>
                  </li>
				  <?php
				  }
				  ?>
                </ul>
              </li>
              <li class="footer"><a href="index.php?page=transaksi_baru">View all</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-fw fa-user"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
				  <h1><font color="white" style="font-family:Times New Rowman">Welcome</font></h1>
                  <h3>
				  <font color="white" style="font-family:Times New Rowman">
				  <?php
				  echo $_SESSION['nama_lengkap'];
				  ?>
				  </font>
				  </h3>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?php
				  echo" <a href='index.php?page=profile_admin&id=$_SESSION[id]' class=\"btn btn-default btn-flat\">Profile</a>"
				  ?>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
