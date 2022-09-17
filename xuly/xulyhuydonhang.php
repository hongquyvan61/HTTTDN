<?php
session_start();
require '../connectdb/connect.php';
require '../model/bill_model.php';
require '../model/tanggiamslsp.php';
    require '../model/detailbill_model.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
            $con = ketnoi();
            $user_id = $_SESSION['id'];
            $orderid = $_GET['orderid'];
            $tanggiammodel = new tanggiamsl();
            $tanggiamresult = $tanggiammodel->tang($orderid, $user_id);
            $detailbillmodel = new detailbill_model();
            $deldetailorder = $detailbillmodel->deletedetailbyID($orderid);
            $billmodel = new bill_model();
            $delorder = $billmodel->deleteorderbyID($orderid);
            if($delorder == 1 && $deldetailorder == 1 && $tanggiamresult == 1){
                ?>
                    <script>alert("Đơn hàng của bạn đã được huỷ!");
                        window.location='../giaodien/dsdonhang.php';
                     </script>
<?php
                   //header("location:../giaodien/dsdonhang.php");
            }
            else{
?>
                     <script>alert("Đã xảy ra sự cố! Không thể huỷ đơn hàng");
                         window.location='../giaodien/dsdonhang.php';
                      </script>
<?php 
                    //header("location:../giaodien/dsdonhang.php");
            }
    }
?>
