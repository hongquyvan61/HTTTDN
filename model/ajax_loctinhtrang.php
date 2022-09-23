<?php
    
            require '../connectdb/connect.php';
            $con = ketnoi();
            $status = $_POST['tinhtrang'];
            $userid = $_POST['userid'];
            if(strcmp($status, "All") == 0){
                $query = "select don.ma_don_hang,g.ten, ct.size, ct.so_luong, ct.don_gia, don.ngay_gio_thanh_toan, don.tinh_trang
                                                        from don_hang as don
                                                        join gio_hang as gio
                                                        on don.user_id = gio.user_id
                                                        join chi_tiet_don_hang as ct
                                                        on don.ma_don_hang = ct.ma_don_hang
                                                        join giay as g
                                                        on ct.id_giay = g.id_giay
                                                        where don.user_id=$userid and (tinh_trang='Paid' or tinh_trang='Shipped')";
                $locresult = mysqli_query($con, $query);
                $arrayObj = array();
                $biendem=0;
                while($row = mysqli_fetch_assoc($locresult)){
                    $arrayObj[$biendem] = (object)[];
                    $arrayObj[$biendem]->billid = $row['ma_don_hang'];
                    $arrayObj[$biendem]->name = $row['ten'];
                    $arrayObj[$biendem]->size = $row['size'];
                    $arrayObj[$biendem]->soluong = $row['so_luong'];
                    $arrayObj[$biendem]->ngaythanhtoan = $row['ngay_gio_thanh_toan'];
                    $arrayObj[$biendem]->tinhtrang = $row['tinh_trang'];
                    $biendem+=1;
                }
                 echo json_encode($arrayObj);
            }
            else{
                $query = "select don.ma_don_hang,g.ten, ct.size, ct.so_luong, ct.don_gia, don.ngay_gio_thanh_toan, don.tinh_trang
                                                        from don_hang as don
                                                        join gio_hang as gio
                                                        on don.user_id = gio.user_id
                                                        join chi_tiet_don_hang as ct
                                                        on don.ma_don_hang = ct.ma_don_hang
                                                        join giay as g
                                                        on ct.id_giay = g.id_giay
                                                        where (don.user_id=$userid) and (tinh_trang='$status')";
                $locresult = mysqli_query($con, $query);
                $arrayObj = array();
                $biendem=0;
                while($row = mysqli_fetch_assoc($locresult)){
                    $arrayObj[$biendem] = (object)[];
                    $arrayObj[$biendem]->billid = $row['ma_don_hang'];
                    $arrayObj[$biendem]->name = $row['ten'];
                    $arrayObj[$biendem]->size = $row['size'];
                    $arrayObj[$biendem]->soluong = $row['so_luong'];
                    $arrayObj[$biendem]->ngaythanhtoan = $row['ngay_gio_thanh_toan'];
                    $arrayObj[$biendem]->tinhtrang = $row['tinh_trang'];
                    $biendem+=1;
                }
                 echo json_encode($arrayObj);
            }
           
            //$query = "insert into(name,brand,size,category,price,quantity_left,image)
        //values (ajsad,adidas,49,kjdkas,1000000,5,img/".tenhang."/".tenhinh.");"
?>
