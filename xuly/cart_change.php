<?php
    require '../connectdb/connect.php';
    require '../model/cart_model1.php';
    session_start();
    $con = ketnoi();
    $user_id = array();
    $user_id['userid']=$_SESSION['id'];
    $model = new cart_model1();
    $num = $model->getnumrowcart($user_id);
    $arridgiay = $model->getallidgiaybyuser($user_id);
    $arrsizegiay = $model->getallsizegiaybyuser($user_id);
    //var_dump($arridgiay); echo '<br>';
    //var_dump($arrsizegiay);echo '<br>';
    //$arrtemp = array();
    //$dem=0;
    //while($num != 0){
        //$dem2=$dem+1;
        //$arrtemp[$dem] = $_POST['qty-'.$dem2];
        //$dem+=1;
        //$num--;
    //}
    //var_dump($arrtemp);
    $dem = 1;
    while($num !=0){
       
        $qty = $_POST['qty-'.$dem];
        $query = "update chi_tiet_gio_hang set so_luong=? where id_giay=? and size=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "iii", $qty,$arridgiay[$dem-1],$arrsizegiay[$dem-1]);
        mysqli_stmt_execute($stmt);
        $num--;
        $dem+=1;
        /*$temp = $arrid;
        echo "<h2>$temp</h2>";
        $num--;*/
    }
    header('location:../giaodien/cart.php');
    
    /**/
?>

