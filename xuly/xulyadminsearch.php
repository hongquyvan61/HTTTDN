
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Hãng</th>
                                        <th>Giá</th>
                                        <?php if(isset($_SESSION['role'])){
                                            if($_SESSION['role'] == 'admin'){?>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                            <?php }}?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                             $con = ketnoi();
                                    if(isset($_POST['submit'])){
                                    
                                    $key = $_POST['keyword'];
                                    //$query = "select * from shoes where (name like '%".$key."') or (name like '".$key."') or (shoe_id=".$key.") or (brand like '".$key."')";
                                    $query = "select *
                    from giay as g join nha_cung_cap as ncc
                    on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                    where (ten like '% $key') or (ncc.ten_nha_cung_cap='$key') or (ten like '$key') or (id_giay='$key')";
                                    $result = mysqli_query($con, $query);
                                    $j = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr id="a1">     

                                            <td><?php echo $j++; ?></td>
                                            <td><?php echo $row['ten']; ?></td>
                                            <td><img src="../<?php echo $row["hinh1"]; ?>" ></td>     
                                            <td><?php echo $row['ten_nha_cung_cap']; ?></td>
                                            <td><?php echo $row['don_gia']; ?></td>
                                            <?php if(isset($_SESSION['role'])){
                                                if($_SESSION['role'] == 'admin'){?>
                                            <td><a href="../giaodien/a.php?layout=sua&id=<?php echo $row['id_giay']; ?>">Sửa</a></td>
                                            <td><a onclick="return Del('<?php echo $row['ten']; ?>')" href="../giaodien/a.php?layout=xoa&id=<?php echo $row['id_giay']; ?>">Xóa</a></td>
                                                <?php }}?> 
                                        </tr>
                                    <?php 
                                    }
                                    
                                    }else{
                                          
                                        $sql = "select * from giay as g join nha_cung_cap as ncc on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap";
                                        $query = mysqli_query($con, $sql);
                                        //print_r($query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {
                                          ?>
                                            <tr id="a1">     

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['ten']; ?></td>
                                                <td><img src="../<?php echo $row["hinh1"]; ?>" ></td>     
                                                <td><?php echo $row['ten_nha_cung_cap']; ?></td>
                                                <td><?php echo $row['don_gia']; ?></td>
                                                <?php if(isset($_SESSION['role'])){
                                                if($_SESSION['role'] == 'admin'){?>
                                                <td><a href="../giaodien/a.php?layout=sua&id=<?php echo $row['id_giay']; ?>">Sửa</a></td>
                                                <td><a onclick="return Del('<?php echo $row['ten']; ?>')" href="../giaodien/a.php?layout=xoa&id=<?php echo $row['id_giay']; ?>">Xóa</a></td>
                                                <?php }}?>
                                            </tr>
                                        <?php 
                                            }
                                    }
                                       ?>
                                    
                                </tbody>
                            </table>
                                    

                             

