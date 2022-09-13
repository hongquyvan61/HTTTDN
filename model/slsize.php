<?php
    
            require '../connectdb/connect.php';
            $con = ketnoi();
            $size = $_POST['size'];
            $shoe = (int)$_POST['shoe'];
            $qty = 0;
            $query = "select kc.so_luong_ton_kho_ban
                    from giay as g join kich_co as kc
                    on g.id_giay = kc.id_giay
                    where g.id_giay = $shoe and size=$size";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result)!=0){
                while($row = mysqli_fetch_assoc($result)){
                        $qty = (int)$row["so_luong_ton_kho_ban"];
                        break;
                }
            }
         
            echo $qty;
            //$query = "insert into(name,brand,size,category,price,quantity_left,image)
        //values (ajsad,adidas,49,kjdkas,1000000,5,img/".tenhang."/".tenhinh.");"
?>
