<?php 
    class product_model{
        private $con;
        public function __construct() {
            $this->con = ketnoi();
        }
        public function getAllProducts(){
            $query = "select * from giay as g join nha_cung_cap as ncc on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getMotaProductbyid($id){
            $query = "select mo_ta
                    from giay
                    where id_giay=$id";
             $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getQtyProductbyid($id){
            $query = "select size, kc.so_luong_ton_kho_ban, kc.so_luong_ton_kho_tong
                    from giay as g join kich_co as kc
                    on g.id_giay = kc.id_giay
                    where g.id_giay = $id";
             $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getProductbyid($id){
           $query = "select ten,don_gia,hinh1,hinh2,hinh3
                    from giay
                    where id_giay=?";
           $stmt = mysqli_prepare($this->con, $query);
           mysqli_stmt_bind_param($stmt, "i", $id);
           mysqli_stmt_execute($stmt);
           return $stmt;
        }
        public function getProductsbybrand($brand){
            $query ="select *
                    from giay as g join nha_cung_cap as ncc
                    on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                    where ncc.ten_nha_cung_cap='$brand'";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getProductsbyKey($key){
            $keyword = mysqli_real_escape_string($this->con, $key);
            $query ="select *
                    from giay as g join nha_cung_cap as ncc
                    on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                    where (ten like '% $keyword') or (ncc.ten_nha_cung_cap='$keyword') or (ten like '$keyword') or (id_giay='$keyword')";
            $result = mysqli_query($this->con,$query);
            return $result;
        }
        function Them($name,$price,$brand,$size38,$size39,$size40,$size41,$file_name,$file_name2,$file_name3){
         $sql="INSERT INTO shoes (name,image,image2,image3,price, brand, qty38, qty39, qty40, qty41)
                   VALUES('$name','img/$brand/$file_name','img/$brand/$file_name2','img/$brand/$file_name3',$price,'$brand',$size38,$size39,$size40,$size41)";
            mysqli_query($this->con,$sql);
          
    }
     function Them_user($user_id,$email,$pass,$sdt){
         $sql="INSERT INTO user(user_id,pass,email,sdt)
                   VALUES($user_id,'$pass','$email','$sdt')";
            mysqli_query($this->con,$sql);
            
    }
      function Sua($name,$price,$brand,$size38,$size39,$size40,$size41,$id){

     $sql2="UPDATE shoes SET name='$name', price= '$price', brand= '$brand',qty38=$size38,qty39=$size39,qty40=$size40,qty41=$size41  WHERE shoe_id = '$id'";
            $query2=mysqli_query($this->con,$sql2);
            
      return $query2;
      }
      
     function Sua_user($email,$sdt,$id){
     $sql2="UPDATE user SET email='$email', sdt='$sdt' WHERE user_id =$id";
            $query=mysqli_query($this->con,$sql2);
            return $query;
    }
    function suahinh1($file_name,$brand,$id){
        $query = "update shoes set image='img/$brand/$file_name' where shoe_id=$id";
        mysqli_query($this->con, $query);
    }
    function suahinh2($file_name,$brand,$id){
        $query = "update shoes set image2='img/$brand/$file_name' where shoe_id=$id";
       mysqli_query($this->con, $query);
    }
    function suahinh3($file_name,$brand,$id){
        $query = "update shoes set image3='img/$brand/$file_name' where shoe_id=$id";
        mysqli_query($this->con, $query);
    }
    }
?>

