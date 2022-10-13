<html>
    <head>
        <link rel="stylesheet" href="../bootstrap/css/admin2.css"><!-- comment -->
         <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <div class="themsp" style="width: 1000px;">
            <div class="sp_left" style="float: left; width:42%;">
        <label >Tên sản phẩm</label><br>
        <input type="text" name="ipname"class="form-controll" value="<?php echo $row_up['ten']?>" style="width:200px"><br>
         <label >Ảnh sản phẩm</label><br>
         <label>Ảnh 1:</label>
         <input type="file" name="image"class="form-controll" >  <br>
           <label>Ảnh 2:</label>
         <input type="file" name="image2"class="form-controll" >  <br>
           <label>Ảnh 3:</label>
         <input type="file" name="image3"class="form-controll" >  <br>
              
            </div><!-- comment -->
            
            <div class="sp_right" style="float: left; width:50%;">
        
        <label >Thương hiệu sản phẩm</label><br>
       <select class="form-controll" name="ma_ncc">
            <?php
            while($row_brand=mysqli_fetch_assoc($query)){ ?>
            <option  <?php if($row_up['ma_nha_cung_cap']==$row_brand['ma_nha_cung_cap']) echo "selected=true" ?>  value="<?php echo $row_brand['ma_nha_cung_cap']; ?>"><?php echo $row_brand['ten_nha_cung_cap']?></option>
           <?php } ?>
        </select><br>
         <label >Thể loại</label><br>
        <select class="form-controll" name="the_loai">
            <option <?php if($row_up['phan_loai']=='Thể thao') echo "selected=true" ?> >Thể thao</option>
            <option <?php if($row_up['phan_loai']=='Bóng đá') echo "selected=true" ?>>Bóng đá</option>
            <option <?php if($row_up['phan_loai']=='Da') echo "selected=true" ?>>Da</option>
        </select><br>
        <label >Giá sản phẩm</label><br>
        <input type="number" name="ipprice" class="form-controll" min="0" value="<?php echo $row_up['don_gia']?>">  <br>
        <label >Mô tả</label><br><br>
       <textarea  name="mo_ta" rows="4" cols="40"  ><?php echo $row_up['mo_ta']?></textarea><br><br>
       <button type="submit" class="btn btn-primary" style="width:80px" name="sub">Sửa</button>
        </div>
         </div>
    </form>
           
</div>
        
        
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm size</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:400px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
   
           <form method="POST" enctype="multipart/form-data" action="../xuly/xulysua.php">
           <input type="text" name="id" class="id" class="form-controll" required value="<?php echo $row_up['id_giay']?>"><br> 
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
               
           <br><br><br><br><button type="submit" class="sub" name="sub3" >Thêm</button>
           </form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
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
