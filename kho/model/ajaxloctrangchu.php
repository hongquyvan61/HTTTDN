<?php
    
            require '../../connectdb/connect.php';
            $con = ketnoi();
            $brand = $_POST['nhanhang'];
            if(strcmp($brand, "All") == 0){
                $query ="select giay.ten, nha_cung_cap.ten_nha_cung_cap, giay.don_gia, giay.hinh1,chi_tiet_nhap_kho.size,chi_tiet_nhap_kho.so_luong_cua_size, nhap_kho.ngay_gio_nhap_kho
from nhap_kho 	
join chi_tiet_nhap_kho
on nhap_kho.ma_nhap_kho=chi_tiet_nhap_kho.ma_nhap_kho
join giay
on chi_tiet_nhap_kho.id_giay=giay.id_giay
join nha_cung_cap
on giay.ma_nha_cung_cap=nha_cung_cap.ma_nha_cung_cap";
                $locresult = mysqli_query($con, $query);
                $arrayObj = array();
                $biendem=0;
                while($row = mysqli_fetch_assoc($locresult)){
                    $arrayObj[$biendem] = (object)[];
                    $arrayObj[$biendem]->name = $row['ten'];
                    $arrayObj[$biendem]->image = $row['hinh1'];
                    $arrayObj[$biendem]->soluong = $row['so_luong_cua_size'];
                     $arrayObj[$biendem]->price = $row['don_gia'];
                      $arrayObj[$biendem]->brand = $row['ten_nha_cung_cap'];
                       $arrayObj[$biendem]->size = $row['size'];
                        $arrayObj[$biendem]->date = $row['ngay_gio_nhap_kho'];
                           
                    $biendem+=1;
                }
                 echo json_encode($arrayObj);
            }
            else{
                $query = "select giay.ten, nha_cung_cap.ten_nha_cung_cap, giay.don_gia, giay.hinh1,chi_tiet_nhap_kho.size,chi_tiet_nhap_kho.so_luong_cua_size, nhap_kho.ngay_gio_nhap_kho
from nhap_kho 	
join chi_tiet_nhap_kho
on nhap_kho.ma_nhap_kho=chi_tiet_nhap_kho.ma_nhap_kho
join giay
on chi_tiet_nhap_kho.id_giay=giay.id_giay
join nha_cung_cap
on giay.ma_nha_cung_cap=nha_cung_cap.ma_nha_cung_cap WHERE nha_cung_cap.ma_nha_cung_cap='$brand'";
                $locresult = mysqli_query($con, $query);
                $arrayObj = array();
                $biendem=0;
                while($row = mysqli_fetch_assoc($locresult)){
                      $arrayObj[$biendem] = (object)[];
                    $arrayObj[$biendem]->name = $row['ten'];
                    $arrayObj[$biendem]->image = $row['hinh1'];
                    $arrayObj[$biendem]->soluong = $row['so_luong_cua_size'];
                     $arrayObj[$biendem]->price = $row['don_gia'];
                      $arrayObj[$biendem]->brand = $row['ten_nha_cung_cap'];
                       $arrayObj[$biendem]->size = $row['size'];
                        $arrayObj[$biendem]->date = $row['ngay_gio_nhap_kho'];
                    $biendem+=1;
                }
                 echo json_encode($arrayObj);
            }
           
            //$query = "insert into(name,brand,size,category,price,quantity_left,image)
        //values (ajsad,adidas,49,kjdkas,1000000,5,img/".tenhang."/".tenhinh.");"
?>
