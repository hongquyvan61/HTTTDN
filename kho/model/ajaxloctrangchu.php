<?php
    
            require '../../connectdb/connect.php';
            $con = ketnoi();
            $brand = $_POST['nhanhang'];
            $search = $_POST['search'];
            $query = "";
            $checkbrand = strcmp($brand, "All") == 0 ? true:false;
            $checksearch = empty($search) ? true:false;
            if($checkbrand == true && $checksearch == false){
                $query ="select id_giay, ten, hinh1, ncc.ten_nha_cung_cap, don_gia
                        from giay as g join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap
                        where ten like '% $search %' or ten like '$search %' or ten like '% $search' or ten like '$search'";
                
            }
            if($checkbrand == true && $checksearch == true){
                $query = "select id_giay, ten, hinh1, ncc.ten_nha_cung_cap, don_gia
                        from giay as g join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap";
            }
            if($checkbrand == false && $checksearch == true){
                $query ="select id_giay, ten, hinh1, ncc.ten_nha_cung_cap, don_gia
                        from giay as g join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap
                        where ncc.ten_nha_cung_cap='$brand'";
            }
            if($checkbrand == false && $checksearch == false){
                 $query ="select id_giay, ten, hinh1, ncc.ten_nha_cung_cap, don_gia
                        from giay as g join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap
                        where (ncc.ten_nha_cung_cap='$brand' and (ten like '% $search %' or ten like '% $brand %' or ten like '$search %' or ten like '% $search' or or ten like '$search')) 
                        or ((ten like '% $search %' or ten like '$search %' or ten like '% $search' or ten like '$search') or ncc.ten_nha_cung_cap='$brand')";
            }
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
                    $biendem+=1;
                }
                 //echo '<h2>'.$checkbrand.' '.$checksearch.'</h2>';
                 echo json_encode($arrayObj);
           
?>
