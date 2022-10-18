<?php
require '../connectdb/connect.php';
            $con = ketnoi();
            $id = $_POST['id'];
            $query = "select * from nha_cung_cap where ma_nha_cung_cap=$id";
           $result = mysqli_query($con, $query);
        $arrayObj = array();
                    $biendem=0;
                    while($row = mysqli_fetch_assoc($result)){
     
                        $arrayObj[$biendem] = (object)[];
                        $arrayObj[$biendem]->id = $row['ma_nha_cung_cap'];
                        $arrayObj[$biendem]->name = $row['ten_nha_cung_cap'];
                         $arrayObj[$biendem]->address = $row['dia_chi'];
                        $arrayObj[$biendem]->sdt = $row['sdt'];
                        $biendem+=1;
                    }
                     echo json_encode($arrayObj);     
?>

