<?php
include "koneksi.php";
$data=array();
$q=mysqli_query($con,"select * from `bahan`");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>