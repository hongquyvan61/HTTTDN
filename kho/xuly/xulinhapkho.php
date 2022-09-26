
 <select id="slboxsort" name="brand" class="s" style="position: absolute;
   top: 79px;
    left: 200px;
     height: 30px;
     width: 100px;
     margin-left: 100px;
      border-radius: 4px;" placeholder="Thương hiệu" > 
     <option value="All" selected="true">All</option>
 
  <?php 
  require '../../connectdb/connect.php';
  $con= ketnoi();
  $query="select * from nha_cung_cap";
    $result = mysqli_query($con, $query);
                                   
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
    <option value="<?php echo $row['ma_nha_cung_cap']; ?>"><?php echo $row['ten_nha_cung_cap']; ?></option>
                                        <?php 
                                    } 
                                        ?>
                                    
</select> 

       
<table id="tablelichsu" class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng tồn kho</th>
                                        
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>