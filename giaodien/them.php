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
        <div class="themsp" style="width: 1000px;">
            <div class="sp_left" style="float: left; width:42%;">
        <label >Tên sản phẩm</label><br>
        <input type="text" name="ipname"class="form-controll" required="true" style="width:200px"><br>
         <label >Ảnh sản phẩm</label><br>
         <label>Ảnh 1:</label>
         <input type="file" name="image"class="form-controll" >  <br>
           <label>Ảnh 2:</label>
         <input type="file" name="image2"class="form-controll" >  <br>
           <label>Ảnh 3:</label>
         <input type="file" name="image3"class="form-controll" >  <br>
         <div class="size">
            <div style="float:left; width: 20%;">
        <label >Size</label><br>
        <input type="number" name="size" class="form-controll" min="0" required="true" style="width:60px">  <br>
            </div><!-- comment -->
            <div style="float:left;"><!-- comment -->
            <label >Số lượng</label><br>
        <input type="number" name="sl_size" class="form-controll" min="0" required="true" style="width:60px">  <br>
            </div>
        </div>
         
            </div><!-- comment -->
            
            <div class="sp_right" style="float: left; width:50%;">
        
        <label >Thương hiệu sản phẩm</label><br>
        <select class="form-controll" name="ma_ncc">
            <?php
            while($row_brand=mysqli_fetch_assoc($query)){ ?>
            <option value="<?php echo $row_brand['ma_nha_cung_cap']; ?>"><?php echo $row_brand['ten_nha_cung_cap']?></option>
           <?php } ?>
        </select><br>
         <label >Thể loại</label><br>
        <select class="form-controll" name="the_loai">
            <option>Thể thao</option>
            <option>Bóng đá</option>
            <option>Da</option>
        </select><br>
        <label >Giá sản phẩm</label><br>
        <input type="number" name="ipprice" class="form-controll" min="0" required="true">  <br>
        <label >Mô tả</label><br><br>
       <textarea  name="mo_ta" rows="4" cols="40"></textarea><br><br>
          <br><button type="submit" class="sub" name="sub">Thêm</button>
        </div>
         </div>
    </form>
</div>
          
    
</body>
</html>
