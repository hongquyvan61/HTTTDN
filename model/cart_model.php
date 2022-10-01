<?php
    
            require '../connectdb/connect.php';
            function getspdaco(){
                $con = ketnoi();
                $user = (int)$_POST['user'];
                $shoe = (int)$_POST['shoe'];
                $quantity = (int)$_POST['quantity'];
                $size = (int)$_POST['size'];
                $query2 = "select *
                            from gio_hang as gio join chi_tiet_gio_hang as ct
                            on gio.id_gio_hang = ct.id_gio_hang
                            where user_id=$user and ct.id_giay =$shoe and ct.size=$size";
                $result = mysqli_query($con, $query2);
                $num_row = mysqli_num_rows($result);
                
                if($num_row!= 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $qty = (int)$row["so_luong"];
                        break;
                    }
                    return $qty;
                }
                
                return 0;
            }
            function getIDgiohangbyUserID($userid){
                $con = ketnoi();
                $query = "select id_gio_hang from gio_hang where user_id=$userid";
                $result = mysqli_query($con, $query);
                $num_row = mysqli_num_rows($result);
                if($num_row!= 0){
                    while($row = mysqli_fetch_assoc($result)){
                       $idgiohang = $row["id_gio_hang"];
                       return $idgiohang;
                    }
                }
                return 0;
            }
            function updatecart(){
                $con = ketnoi();
                $user = (int)$_POST['user'];
                $idgiohang = getIDgiohangbyUserID($user);
                    $shoe = (int)$_POST['shoe'];
                    $quantity = (int)$_POST['quantity'];
                    $size = (int)$_POST['size'];
                    $newqty = getspdaco()+$quantity;
                    
                $query1 = "update chi_tiet_gio_hang set so_luong=? where id_gio_hang=? and id_giay=? and size=?";
                $stmt = mysqli_prepare($con, $query1);
                mysqli_stmt_bind_param($stmt,"iiii", $newqty,$idgiohang,$shoe,$size);
                mysqli_stmt_execute($stmt);
            }
            function getslbyshoeandsize(){
                $con = ketnoi();
                $shoe = (int)$_POST['shoe'];
                $size = (int)$_POST['size'];
                $query = "select so_luong_ton_kho_ban from kich_co where id_giay=$shoe and size=$size";
                $result = mysqli_query($con, $query);
                $sl = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sl = (int)$row['so_luong_ton_kho_ban'];
                    return $sl;
                }
                return 0;
            }
            $quantity = (int)$_POST['quantity'];
            $slspdangco = getslbyshoeandsize();
            $vuotquasl = 0;
            if($quantity <= $slspdangco){
                $newqty = 0;
                if(getspdaco() != 0){
                    $newqty = getspdaco()+$quantity;
                    if($newqty <= $slspdangco){
                        updatecart();
                    }
                    else{
                        $vuotquasl = 1;
                    }
                }
                if($newqty == 0){
                    $con = ketnoi();
                    $user = (int)$_POST['user'];
                    $idgiohang = getIDgiohangbyUserID($user);
                        $shoe = (int)$_POST['shoe'];
                        $quantity = (int)$_POST['quantity'];
                        $size = (int)$_POST['size'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = date("Y-m-d H:i:s");
                    $query = "insert into chi_tiet_gio_hang(id_gio_hang,id_giay,size,so_luong,ngay_gio_them_vao_gio)"
                            . "values($idgiohang,$shoe,$size,$quantity,'$date')";
                    mysqli_query($con, $query);
                    /*$stmt = mysqli_prepare($con, $query);
                    mysqli_stmt_bind_param($stmt, "iiiis", $user,$shoe,$quantity,$date);
                    mysqli_stmt_execute($stmt);*/
                }
            }
            else{
                $vuotquasl = 1;
            }
            if($vuotquasl == 0) {
                echo json_encode(1);
            }
            else {
                echo json_encode(0);
            } 
           //$query = "insert into(name,brand,size,category,price,quantity_left,image)
        //values (ajsad,adidas,49,kjdkas,1000000,5,img/".tenhang."/".tenhinh.");"
?>
