
<?php 
    session_start();
?>
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
        <div class="title_them">
            <br>
        <h2>Sửa thông tin tài khoản</h2>
    </div>
        <?php

       
        include '../connectdb/connect.php';
        include '../model/encrypt.php';
                        $con = ketnoi();
                        $model = new encrypt();
        $con = ketnoi();
        $user_id=$_GET['user_id'];
        $sql_up="select * from user where user_id=$user_id";
        $query_up=mysqli_query($con,$sql_up);
        $row_up= mysqli_fetch_assoc($query_up);
     
        ?>
        
<div class="them">
    <form method="POST" enctype="multipart/form-data" action="../xuly/xulysua.php">
        <input type="text" name="id" class="id" class="form-controll" required value="<?php echo $row_up['user_id']?>"><br>
        <div class="themsp">
        <!--<label >User_id</label><br>
        <input type="text" name="user_id"class="form-controll" required value=""><br>-->
        <p>User ID: <?php echo $row_up['user_id']?> </p>
          <label >Email</label><br>
          <?php
           $tiento = explode("@", $row_up['email']);
           $decryptemail = $model->apphin_giaima($tiento[0])."@".$tiento[1];
                  
          ?>
           <input type="text" name="email" id="abc" class="form-controll"  value="<?php echo $decryptemail?>">  <br>
         <!--<label >Password</label><br>
        <input type="text" name="pass" class="form-controll"  value="">  <br>-->
         <label >SDT</label><br>
         <?php
           $decryptsdt = $model->apphin_giaima($row_up['sdt']);
         ?>
         <input type="text" name="sdt" class="form-controll"  value="<?php echo $decryptsdt?>"> <br><br>
         <div class="phan_bac">
   
    <?php if ($row_up['role']!='guest')
        echo "<label >Role</label><br>  
   <select name='role' class='form-controll'>
       <option>admin</option> 
       <option>kho</option>
        </select>"        
           ?>
          
   </div>
   <br> <button type="submit" class="sub" name="sub2">Sửa</button>
         </div>
    </form>
</div>
    
</body>
</html>
