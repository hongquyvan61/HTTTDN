
<?php
       
        include '../connectdb/connect.php';
       include '../model/encrypt.php';
        ?>
 <script>
     
    function abc(){
        
            if(confirm("Bấm vào nút OK để tiếp tục") == true){
            
    window.location='../giaodien/themuser.php';
            }else{
              alert("<?php echo " Mắc cười wá đi nha ^^ " ?>");
            }
        }

 function def(){
        
        alert("Email này đã tồn tại");
            
    window.location='../giaodien/qlkh.php';
           
        }
         function ncc(){
        
        alert("Nhà cung ứng này đã tồn tại");
            
    window.location='../giaodien/nha_cung_ung.php';
           
        }
        function xyz(){
        
        alert("Tên sản phẩm này đã tồn tại");
            
    window.location='../giaodien/a.php?layout=them';
           
        }
        function jqka(){
         alert("Nhập lại password không khớp với password!");
         window.location = '../giaodien/qlkh.php';
    }
 </script>
<?php

include "../model/product_model.php";
$b = new product_model();
$con = ketnoi();
if (isset($_POST['sub'])) {

    $name = $_POST['ipname'];
    $price = $_POST['ipprice'];
    $ma_ncc = $_POST['ma_ncc'];
    $size = $_POST['size'];
    $sl_size = $_POST['sl_size'];
    $the_loai = $_POST['the_loai'];
    $mo_ta = $_POST['mo_ta'];
    $file = $_FILES['image'];
    $file_name = $file['name'];
    $file2 = $_FILES['image2'];
    $file_name2 = $file2['name'];
    $file3 = $_FILES['image3'];
    $file_name3 = $file3['name'];
    
    $arrayhinh = array($file_name,$file_name2,$file_name3);
    $countarrayhinh = count($arrayhinh);
    $dem = 0;
    $check = 0;
    $thieuhinhmess = "";
    foreach($arrayhinh as $value){
        if($value == ""){
            $dem++;
            $check = 1;
            if($dem == $countarrayhinh){
                $thieuhinhmess = $thieuhinhmess."ảnh ".$dem;
            }
            else{
                 $thieuhinhmess = $thieuhinhmess."ảnh ".$dem.",";
            }
        }
    }
    if($thieuhinhmess != ""){
        ?>
        <script>
            alert("<?php echo $thieuhinhmess;?> trống, xin hãy bổ sung đầy đủ ảnh!");
         window.location='../giaodien/a.php?layout=them';        
         </script>
        <?php
    }
    else{
         $sql1 = "SELECT ten_nha_cung_cap from nha_cung_cap WHERE ma_nha_cung_cap= '" . $ma_ncc . "'";
    $query1 = mysqli_query($con, $sql1);
        $row= mysqli_fetch_assoc($query1);
      $ten_nha_cung_cap=$row['ten_nha_cung_cap'];    
                move_uploaded_file($file['tmp_name'], '../img/' . $ten_nha_cung_cap . '/' . $file_name);
                move_uploaded_file($file2['tmp_name'], '../img/' . $ten_nha_cung_cap . '/' . $file_name2);
                move_uploaded_file($file3['tmp_name'], '../img/' . $ten_nha_cung_cap . '/' . $file_name3);
                
    }
    
    
    
     $where = "SELECT * from giay WHERE ten= '" . $name . "'";
    $product = mysqli_query($con, $where);
    $num = mysqli_num_rows($product);
    if (mysqli_num_rows($product)== 0 && (empty($thieuhinhmess))) {
        header('location:../giaodien/admin.php');
       $b->Them($name, $price, $ma_ncc,$file_name,$file_name2,$file_name3,$ten_nha_cung_cap,$the_loai,$mo_ta,$sl_size);
       
       $sql="SELECT id_giay FROM giay WHERE id_giay=(SELECT MAX(id_giay) FROM giay)";
           $query = mysqli_query($con, $sql);
        $row= mysqli_fetch_assoc($query);
        $id_giay=$row['id_giay'];    
   
       $b->Them_size($id_giay,$size,$sl_size);
    } else{
      echo '<script type="text/javascript">',
     'xyz();',
     '</script>'
;
    }
  
}


if (isset($_POST['sub2'])) {

    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $sdt = $_POST['sdt'];
     $role=$_POST['role'];
    if($pass != $pass2){
        echo '<script type="text/javascript">','jqka();','</script>';
    }
    else{
     $tiento = explode("@", $email);
     $model = new encrypt();
   $mahoatiento = $model->apphin_mahoa($tiento[0]);
   $encryptemail = $mahoatiento."@".$tiento[1];
   $encryptsdt = $model->apphin_mahoa($sdt); 
    $encryptpass = $model->apphin_mahoa($pass); 

      $where = "SELECT * from user WHERE email='".$encryptemail."'";
    $product = mysqli_query($con, $where);  
    if (mysqli_num_rows($product)== 0) {      
        $b->Them_user( $encryptemail, $encryptpass, $encryptsdt,$role);
        header('location:../giaodien/qlkh.php');
    } else{
      echo '<script type="text/javascript">','def();','</script>';
    }
    }
     
   //echo "<h2>$num</h2>";
}
// them nha cung ung
if (isset($_POST['sub3'])) {

    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $sdt = $_POST['sdt'];
     $where = "SELECT * from nha_cung_cap WHERE name='".$name."'";
    $product = mysqli_query($con, $where);  
    if (mysqli_num_rows($product)== 0) {      
        $b->Them_ncc( $name, $address, $sdt);
        header('location:../giaodien/nha_cung_ung.php');
    } else{
      echo '<script type="text/javascript">','ncc();','</script>';
    }
}
    
?>

