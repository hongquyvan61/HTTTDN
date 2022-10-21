<?php
    
            require '../../connectdb/connect.php';
            $con = ketnoi();
            $month = $_POST['month'];
            $type = $_POST['type'];
            $query = "";
            if(strcmp($month, "--") != 0 && strcmp($type, "--") != 0){
                if(strcmp($type, "nhapkho") == 0){
                    $query = "select ten_nha_cung_cap, SUM(so_luong_hang_nhap) as tongslnhap, SUM(tong_tien_nhap_kho) as tongtiennhap
                            from nhap_kho as nk 
                            join nha_cung_cap as ncc
                            on nk.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                            join (select ma_nhap_kho, MONTH(CAST(ngay_gio_nhap_kho as date)) as datenhapkho
                                 from nhap_kho) as tam
                            on nk.ma_nhap_kho = tam.ma_nhap_kho
                            where datenhapkho=$month
                            group by nk.ma_nha_cung_cap
                            order by tongslnhap DESC";
                }
                else{
                    $query = "select ncc.ten_nha_cung_cap, tam2.tongtheosize as tongslxuat
                            from giay as g 
                            join 
                                (select ctxk.ma_xuat_kho, ctxk.id_giay, SUM(ctxk.so_luong_cua_size) as tongtheosize
                                from chi_tiet_xuat_kho as ctxk
                                join 
                                    (select ma_xuat_kho, so_luong_xuat_kho, MONTH(CAST(ngay_gio_xuat_kho as date)) as datexuatkho
                                    from xuat_kho) as tam
                                on ctxk.ma_xuat_kho = tam.ma_xuat_kho
                                where datexuatkho=$month
                                group by ctxk.id_giay) as tam2
                            on g.id_giay = tam2.id_giay
                            join nha_cung_cap as ncc
                            on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                            order by tam2.tongtheosize DESC";
                }
            }
            if(strcmp($month, "--") == 0 && strcmp($type, "--") == 0){
                $query = "select ten_nha_cung_cap, SUM(so_luong_hang_nhap) as tongslnhap, SUM(tong_tien_nhap_kho) as tongtiennhap
                            from nhap_kho as nk 
                            join nha_cung_cap as ncc
                            on nk.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                            join (select ma_nhap_kho, MONTH(CAST(ngay_gio_nhap_kho as date)) as datenhapkho
                                 from nhap_kho) as tam
                            on nk.ma_nhap_kho = tam.ma_nhap_kho
                            where datenhapkho=MONTH(CURDATE())
                            group by nk.ma_nha_cung_cap
                            order by tongslnhap DESC";
            }    
            $locresult = mysqli_query($con, $query);
            $arrayObj = array();
            $biendem = 0;
            if (strcmp($type, "nhapkho") == 0 || (strcmp($month, "--") == 0 && strcmp($type, "--") == 0)) {
                while ($row = mysqli_fetch_assoc($locresult)) {
                    $arrayObj[$biendem] = (object) [];
                    $arrayObj[$biendem]->tenncc = $row['ten_nha_cung_cap'];
                    $arrayObj[$biendem]->tongslnhap = $row['tongslnhap'];
                    $arrayObj[$biendem]->tongtiennhap = $row['tongtiennhap'];
                    $biendem += 1;
                }
            } 
            else {
                while ($row = mysqli_fetch_assoc($locresult)) {
                    $arrayObj[$biendem] = (object) [];
                    $arrayObj[$biendem]->tenncc = $row['ten_nha_cung_cap'];
                    $arrayObj[$biendem]->tongslxuat = $row['tongslxuat'];
                    $biendem += 1;
                }
            }

            echo json_encode($arrayObj);
?>
 
