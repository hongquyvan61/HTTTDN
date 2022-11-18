<?php
require '../connectdb/connect.php';
require '../model/encrypt.php';
session_start();
$con = ketnoi();


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../img/lifestyleStore.png" />
        <title>Projectworlds Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../bootstrap/css/admin.css">
    </head>
    <body>
        <div>
<?php
require '../giaodien/header.php';
?>
            <br>
            <div class="container">

                <div class="aa">
                    <h2 class="a0">List of bill</h2>
                    <!--<div class="a00">
                        <p>Mã hóa đơn:</p>
                        <p>Email khách hàng:</p> 
                        <p>Số điện thoai:</p>
                    </div>-->
                    <table class="aa1"  > 
                        <tr class="aa2">
                            <th>#</th>
                            <th>Bill ID</th>
                            <th>Payment Date</th>
                            <th>Total</th> 
                            <th>Detail</th>
                        </tr>
                        <tbody>

<?php
$con = ketnoi();
//$encrypt = new encrypt();
$user_id = $_SESSION['id'];
$sql = "select * from don_hang where user_id=$user_id and (tinh_trang='Paid' or tinh_trang='Shipped')";
$query = mysqli_query($con, $sql);
$i = 1;
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                                <tr id="a1">     

                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['ma_don_hang']; ?></td>
                                    <td><?php echo $row['ngay_gio_thanh_toan']; ?></td>
                                    <td><?php echo $row['tong_tien']; ?></td>
                                    <td><a href="../giaodien/chitiethd.php?billid=<?php echo $row['ma_don_hang']; ?>">Detail</a></td>
                                    <!--<th><a href="../giaodien/in_pdf.php?ma_don_hang=<?php echo $row['ma_don_hang']; ?>">Print</a></th-->

                                </tr>
<?php } ?>

                        </tbody>  
                    </table>
                </div>

            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy Store. All Rights Reserved.</p>
                   <!--<p>This website is developed by Yugesh Verma</p>-->
               </center>
               </div>
           </footer>
        </div>
    </body>

</html>
