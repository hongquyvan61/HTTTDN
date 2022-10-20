<?php
   include '../connectdb/connect.php';
   $con = ketnoi();
$id=$_GET['id'];
$sql="DELETE FROM nha_cung_cap WHERE ma_nha_cung_cap=$id";
$query= mysqli_query($con, $sql);
//echo $id;
header('location:nha_cung_ung.php');
?>
