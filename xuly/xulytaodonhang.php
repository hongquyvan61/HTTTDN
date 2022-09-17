<?php
    session_start();
    require '../connectdb/connect.php';
    require '../model/cart_model1.php';
    require '../model/bill_model.php';
    require '../model/detailbill_model.php';
    require '../model/tanggiamslsp.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $con = ketnoi();
        $user_id = $_SESSION['id'];
        
        $total = $_SESSION['total'];
        //$total=$encryptmodel->mahoathongke($total_tam);
       //  $tam = $encryptmodel->mahoathongke(1800);
      
        $bill = new bill_model();
        $result1 = $bill->insertbill($user_id, $total);
        $detailbill = new detailbill_model();
        $result2 = $detailbill->insertdetailbill($user_id);
        $result3 = $bill->getlatestbillbyUserID($user_id);
        $row = mysqli_fetch_assoc($result3);
        $madonhang = $row['latestbill'];
        $tanggiammodel = new tanggiamsl();
        $result4 = $tanggiammodel->giam($madonhang,$user_id);
        //var_dump($result4);
        if($result1 == 1 && $result2 == 1 && $result4 == 1){
            
    
?>
                
                     <script>alert("Đơn hàng của bạn đã được tạo!");
                      window.location='../giaodien/dsdonhang.php';
                     </script> 
                       
    <?php 
            $model = new cart_model1();
            $model->emptycart($user_id);
        }
        else{
          
    ?>
                      <script>alert("Đã xảy ra sự cố! Đơn hàng không thể tạo");
                      window.location='../giaodien/cart.php';
                      </script> 
    <?php }
    
        } ?>

