<html>
    <?php
    require '../../connectdb/connect.php';
 require 'header.php';
 $con = ketnoi();
 ?>
<div class="container">
<div class="col-md-12">
    <table id="tablenhapkho" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã nhập kho</th>
                <th>ID giày </th>
                <th>Size</th>
                <th>Số lượng của size</th>
                <th>Đơn giá</th>
                
            </tr>
       </thead>
       <tbody>
          <?php

$id = $_GET['id'];
$get = $_GET['loai'];
    if(strcmp($get, "nhapkho") == 0){
    $sql = "select * from chi_tiet_nhap_kho where ma_nhap_kho=$id"; 
$query = mysqli_query($con, $sql);
$i = 1;
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                                <tr id="a1">     

                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['ma_nhap_kho']; ?></td>
                                    <td><?php echo $row['id_giay']; ?></td>
                                    <td><?php echo $row['size']; ?></td>
                                    <td><?php echo $row['so_luong_cua_size']; ?></td>
                                    <td><?php echo $row['don_gia']; ?></td>

                                </tr>
<?php }
}
 else {
     $sql = "select * from chi_tiet_xuat_kho where ma_xuat_kho=$id"; 
$query = mysqli_query($con, $sql);
$i = 1;
while ($row = mysqli_fetch_assoc($query)) {
 ?>
                                <tr>     

                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['ma_xuat_kho']; ?></td>
                                    <td><?php echo $row['id_giay']; ?></td>
                                    <td><?php echo $row['size']; ?></td>
                                    <td><?php echo $row['so_luong_cua_size']; ?></td>

                                </tr>
                                <?php
}
 }
?>
       </tbody>
    </table>
    <div class="row">
        <div class="col text-center">
          <a class="btn btn-dark" style="font-size: 15px;" id="getdatatable">In phiếu</a>
        </div>
    </div>
</div>
    </div>
</html>