<table class="table table-bordered table-striped">
                        <tbody>
                           <?php 
                             require '../connectdb/connect.php';
                                $con = ketnoi();
                                if(!isset($_SESSION['email'])){
                                    header('location: login.php');
                                }
                                $user_id=$_SESSION['id'];
                                $user_products_query="select don.ma_don_hang,g.ten, ct.size, ct.so_luong, ct.don_gia, don.ngay_gio_thanh_toan, don.tinh_trang
                                                    from don_hang as don
                                                    join gio_hang as gio
                                                    on don.user_id = gio.user_id
                                                    join chi_tiet_don_hang as ct
                                                    on don.ma_don_hang = ct.ma_don_hang
                                                    join giay as g
                                                    on ct.id_giay = g.id_giay
                                                    where (don.user_id=$user_id) and (tinh_trang='Paid' or tinh_trang='Shipped')";
                            $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                            if(mysqli_num_rows($user_products_result)!=0){
                                ?>
                                <tr>
                                    <th>Bill_id</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Add Cart Date</th>
                                    <th>Status</th>
                                    <th>Print bill</th>

                                </tr>
                           <?php 
                                while($row=mysqli_fetch_assoc($user_products_result)){

                             ?>
                               
                            <tr>
                                <th><?php echo $row['ma_don_hang']?></th>
                                <th><?php echo $row['ten']?></th>
                                <th><?php echo $row['size']?></th>
                                <th><?php echo $row['so_luong']?></th>
                                <th><?php echo $row['don_gia']?></th>
                                <th><?php echo $row['ngay_gio_thanh_toan']?></th>
                                <th style="color:#92f200;"><?php echo $row['tinh_trang']?></th>
                                <th><a href="../giaodien/in_pdf.php?ma_don_hang=<?php echo $row['ma_don_hang']; ?>">Print</a></th
                            </tr>
                           <?php }
                            }
                            else{
                           ?>
                        <h3>There is no history at here!Go to <a href="../giaodien/products.php">shopping</a></h3>
                            <?php }?>
                        </tbody>
                    </table>
