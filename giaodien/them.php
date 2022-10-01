<html>
    <head>
        <link rel="stylesheet" href="../bootstrap/css/admin2.css">
    </head>
    <body>
       <?php require '../giaodien/admin_menu.php';?>
        <div class="title_them">
        
            <br>
        <h2>Thêm sản phẩm</h2>
    </div>
        <?php
       
     
        $con = ketnoi();
        $sql="SELECT ma_nha_cung_cap, ten_nha_cung_cap FROM nha_cung_cap ";
        $query=mysqli_query($con,$sql);   
           
        ?>
<div class="them">
    <form method="POST" enctype="multipart/form-data" action="../xuly/xulythem.php">
        <div class="themsp">
        <label >Tên sản phẩm</label><br>
        <input type="text" name="ipname"class="form-controll" required="true"><br>
         <label >Ảnh sản phẩm</label><br>
         <label>Ảnh 1:</label>
         <input type="file" name="image"class="form-controll" >  <br>
           <label>Ảnh 2:</label>
         <input type="file" name="image2"class="form-controll" >  <br>
           <label>Ảnh 3:</label>
         <input type="file" name="image3"class="form-controll" >  <br>
         <label >Giá sản phẩm</label><br>
        <input type="number" name="ipprice" class="form-controll" min="0" required="true">  <br>
        <label >Thương hiệu sản phẩm</label><br>
        <select class="form-controll" name="ma_ncc">
            <?php
            while($row_brand=mysqli_fetch_assoc($query)){ ?>
            <option value="<?php echo $row_brand['ma_nha_cung_cap']; ?>"><?php echo $row_brand['ten_nha_cung_cap']?></option>
           <?php } ?>
        </select>
        
        <br><button type="submit" class="sub" name="sub">Thêm</button>
       
         </div>
    </form>
</div>
    
</body>
</html>
