
<?php
   include '../connectdb/connect.php';
   $con = ketnoi();
$id=$_GET['user_id'];
 // echo $id." ";

    $sql1 = "SELECT * FROM don_hang WHERE user_id= '" . $id . "'";
    $query1 = mysqli_query($con, $sql1);
       if (mysqli_num_rows($query1)!= 0) {
      while ($row = mysqli_fetch_assoc($query1)) {
          
           $ma_dh=$row['ma_don_hang'];     
        $sql3="DELETE FROM chi_tiet_don_hang WHERE ma_don_hang=$ma_dh";
        $query3= mysqli_query($con, $sql3);   
        
     $sql4="DELETE FROM don_hang WHERE user_id=$id";
    $query4= mysqli_query($con, $sql4);  
    echo $ma_dh." ";
                 }
      
        }
   //     echo $ma_dh." ";
    
      
   
    $sql2 = "SELECT * FROM gio_hang WHERE user_id= '" . $id . "'";
   
    $query2 = mysqli_query($con, $sql2);
        $row2= mysqli_fetch_assoc($query2);        
         if (mysqli_num_rows($query2)!= 0) {
              $ma_gh=$row2['id_gio_hang']; 
              
             $sql5="DELETE FROM chi_tiet_gio_hang WHERE id_gio_hang=$ma_gh";
            $query5= mysqli_query($con, $sql5);  

            $sql6="DELETE FROM gio_hang WHERE user_id=$id";
            $query6= mysqli_query($con, $sql6);   
             
     
    
        }
 //   echo $ma_gh." ";
     
     
$sql7="DELETE FROM user WHERE user_id=$id";
$query7= mysqli_query($con, $sql7);

//header('location:qlkh.php');
?>

