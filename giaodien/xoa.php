
<?php

   $con = ketnoi();
$id=$_GET['id'];
$sql="DELETE FROM kich_co WHERE id_giay=$id";
$sql2="DELETE FROM giay WHERE id_giay=$id";
$query= mysqli_query($con, $sql);
$query2= mysqli_query($con, $sql2);
//echo $id;
header('location:admin.php');
?>
