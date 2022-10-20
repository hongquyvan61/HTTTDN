<?php
    
            require '../../connectdb/connect.php';
            $con = ketnoi();
            $query = "select id_giay, ten, hinh1, ncc.ten_nha_cung_cap, don_gia, so_luong_ton_kho_ban
                        from giay as g 
                        join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap";
            $locresult = mysqli_query($con, $query);
                $arrayObj = array();
                $biendem=0;
                while($row = mysqli_fetch_assoc($locresult)){
                    $arrayObj[$biendem] = (object)[];
                    $arrayObj[$biendem]->name = $row['ten'];
                    $arrayObj[$biendem]->image = $row['hinh1'];
                    $arrayObj[$biendem]->brand = $row['ten_nha_cung_cap'];
                    $arrayObj[$biendem]->price = $row['don_gia'];
                    $arrayObj[$biendem]->idgiay = $row['id_giay'];
                    $arrayObj[$biendem]->slkhoban = $row['so_luong_ton_kho_ban'];
                    $biendem+=1;
                }
                 //echo '<h2>'.$checkbrand.' '.$checksearch.'</h2>';
                 echo json_encode($arrayObj);
           
?>

