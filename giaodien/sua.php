<html>
    <head>
        <link rel="stylesheet" href="../bootstrap/css/admin2.css"><!-- comment -->
    </head>
    <body>
        <style>
            .id{
                display: none;
            }
            
        </style>
        <?php require '../giaodien/admin_menu.php';?>
        <div class="title_them">
            <br>
        <h2>Sửa sản phẩm</h2>
        </div>
        <?php

       
       
        $con = ketnoi();
        $sql="SELECT * FROM `nha_cung_cap`";
        $query=mysqli_query($con,$sql);      

        $id=$_GET['id'];
        $sql_up="select * from giay where id_giay=$id";
        $query_up=mysqli_query($con,$sql_up);
        $row_up= mysqli_fetch_assoc($query_up);
        ?>
        
<div class="them">
    <form method="POST" enctype="multipart/form-data" action="../xuly/xulysua.php">
        <input type="text" name="id" class="id" class="form-controll" required value="<?php echo $row_up['id_giay']?>"><br> 
        <div class="themsp">
        <label >Tên sản phẩm</label><br>
        <input type="text" name="ipname"class="form-controll" required value="<?php echo $row_up['ten']?>"><br> 
          <label >Ảnh sản phẩm</label><br>
         <label>Ảnh 1:</label>
         <input type="file" name="image" class="form-controll" >  <br>
           <label>Ảnh 2:</label>
         <input type="file" name="image2" class="form-controll" >  <br>
           <label>Ảnh 3:</label>
         <input type="file" name="image3" class="form-controll" >  <br>
         <label >Giá sản phẩm</label><br>
        <input type="text" name="ipprice" class="form-controll"  value="<?php echo $row_up['don_gia']?>">  <br>
          <label >Thương hiệu sản phẩm</label><br>
        <select class="form-controll" name="ma_ncc">
            <?php
            while($row_brand=mysqli_fetch_assoc($query)){ ?>
            <option value="<?php echo $row_brand['ma_nha_cung_cap']; ?>"><?php echo $row_brand['ten_nha_cung_cap']?></option>
           <?php } ?>
        </select>
        <br>
    
         <button type="submit" class="sub" name="sub">Sửa</button>
 
         </div>
    </form>
</div>
    
</body>
<script type="text/javascript">

        function changebrand(){
        var arr = document.getElementsByClassName("brandselect");
        for(var i=0;i<arr.length;i++){
            if(arr[i].value == '<?php echo $spbrand;?>'){
                arr[i].selected='selected';
            }
        }
            //console.log(arr[1].value);
        }
        changebrand();
  
    
</script>
</html>
