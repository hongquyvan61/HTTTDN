<?php
   include '../connectdb/connect.php';
   $con = ketnoi();
$id=$_GET['id'];
$sql1 = "select * "
        . "from nha_cung_cap, giay "
        . "where giay.ma_nha_cung_cap = nha_cung_cap.ma_nha_cung_cap and giay.ma_nha_cung_cap=$id";

$result = mysqli_query($con, $sql1);
if(mysqli_num_rows($result) == 0){
    $sql="DELETE FROM nha_cung_cap WHERE ma_nha_cung_cap=$id";
    $query= mysqli_query($con, $sql);
    header('location:nha_cung_ung.php');
}
else{
    ?>
    <script>alert("Có sản phẩm của nhà cung ứng này! Không thể xoá");
  window.location='../giaodien/nha_cung_ung.php';</script>
    <?php
}
//echo $id;

?>
