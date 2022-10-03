

 
  <?php 
  require '../../connectdb/connect.php';
  $con= ketnoi();
                                        ?>
                                    
</select> 
<table id="tablehienthi" class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Hãng</th>
                                        <th>Size</th>
                                        <th>Ngày</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            
                                    if(isset($_POST['submit'])){
                                    
                                    $key = $_POST['keyword'];
                                    //$query = "select * from shoes where (name like '%".$key."') or (name like '".$key."') or (shoe_id=".$key.") or (brand like '".$key."')";
                                    $query = "select giay.ten, nha_cung_cap.ten_nha_cung_cap, giay.don_gia, giay.hinh1,chi_tiet_nhap_kho.size,chi_tiet_nhap_kho.so_luong_cua_size, nhap_kho.ngay_gio_nhap_kho from nhap_kho join chi_tiet_nhap_kho on nhap_kho.ma_nhap_kho=chi_tiet_nhap_kho.ma_nhap_kho join giay on chi_tiet_nhap_kho.id_giay=giay.id_giay join nha_cung_cap on giay.ma_nha_cung_cap=nha_cung_cap.ma_nha_cung_cap where (ten like '%".$key."%') or (ten_nha_cung_cap like '".$key."') or (giay.id_giay='".$key."')";
                                    $result = mysqli_query($con, $query);
                                    $j = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr id="a1">     

                                            <td><?php echo $j++; ?></td>
                                            
                                             <td style="font-size: medium"><?php echo $row['ten']; ?> <br><?php echo $row['don_gia']; ?></td>     
                                             <td style="width: 300px;"><img src="../<?php echo $row["hinh1"];  ?>" style="width: 100px; height: 85px" ></td>
                                            <td style="font-size: medium"><?php echo $row['so_luong_cua_size']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['ten_nha_cung_cap']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['size']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['ngay_gio_nhap_kho']; ?></td>
                                        </tr>
                                    <?php 
                                    }
                                    
                                    }else{
                                          
                                        $sql = "select giay.ten, nha_cung_cap.ten_nha_cung_cap, giay.don_gia, giay.hinh1,chi_tiet_nhap_kho.size,chi_tiet_nhap_kho.so_luong_cua_size, nhap_kho.ngay_gio_nhap_kho
from nhap_kho 	
join chi_tiet_nhap_kho
on nhap_kho.ma_nhap_kho=chi_tiet_nhap_kho.ma_nhap_kho
join giay
on chi_tiet_nhap_kho.id_giay=giay.id_giay
join nha_cung_cap
on giay.ma_nha_cung_cap=nha_cung_cap.ma_nha_cung_cap";
                                        $query = mysqli_query($con, $sql);
                                        //print_r($query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                          ?>
                                            <tr id="a1">     

                                                <td><?php echo $i++; ?></td>
                                                 <td style="font-size: medium"><?php echo $row['ten']; ?> <br><?php echo $row['don_gia']; ?></td>     
                                             <td style="width: 300px;"><img src="../<?php echo $row["hinh1"];  ?>" style="width: 100px; height: 85px" ></td>
                                            
                                                <td style="font-size: medium"><?php echo $row['so_luong_cua_size']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['ten_nha_cung_cap']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['size']; ?></td>
                                            <td style="font-size: medium"><?php echo $row['ngay_gio_nhap_kho']; ?></td>
                                               
                                            </tr>
                                        <?php 
                                            }
                                    }
                                       ?>
                                    
                                </tbody>
                            </table>

