<?php 
    class product_model{
        private $con;
        public function __construct() {
            $this->con = ketnoi();
        }
        public function giamslspbyUserID($userid){
            $bill = new bill_model();
            $result = $bill->getinfo($userid);
            
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
                        on g.ma_nha_cung_cap=ncc.ma_nha_cung_cap
                        where (ncc.ten_nha_cung_cap='$key' and (ten like '% $key %' or ten like '% $key %' or ten like '$key %' or ten like '% $key')) 
                        or (ten like '% $key %' or ten like '$key %' or ten like '% $key')";
            $result = mysqli_query($this->con,$query);
            return $result;
        }
        function Them($ten,$don_gia,$ma_ncc,$hinh1,$hinh2,$hinh3,$ten_nha_cung_cap,$the_loai,$mo_ta,$sl_size){
         $sql="INSERT INTO giay (ten,don_gia,ma_nha_cung_cap,hinh1,hinh2,hinh3,phan_loai,mo_ta,so_luong_ton_kho_tong,so_luong_ton_kho_ban)
                   VALUES('$ten','$don_gia','$ma_ncc','img/$ten_nha_cung_cap/$hinh1','img/$ten_nha_cung_cap/$hinh2','img/$ten_nha_cung_cap/$hinh3','$the_loai','$mo_ta','$sl_size','0')";
         
            mysqli_query($this->con,$sql);
          
    }
     function Them_size($id_giay,$size,$sl_size){    
      $sql="INSERT INTO kich_co(id_giay,size,so_luong_ton_kho_tong,so_luong_ton_kho_ban)
                   VALUES('$id_giay','$size','$sl_size','0')";
             mysqli_query($this->con,$sql);
          
    }
     function Them_user($email,$pass,$sdt,$role){
         $sql="INSERT INTO user(pass,email,sdt,role)
                   VALUES('$pass','$email','$sdt','$role')";
            mysqli_query($this->con,$sql);
            
    }
      function update_sl($id_giay,$sum_tongsl){
     $sql2="UPDATE giay SET so_luong_ton_kho_tong='$sum_tongsl' WHERE id_giay =$id_giay";
            $query=mysqli_query($this->con,$sql2);
            return $query;
    }
      function Sua($name,$price,$ma_ncc,$id,$the_loai,$mo_ta){

     $sql2="UPDATE giay SET ten='$name', don_gia= '$price', ma_nha_cung_cap= '$ma_ncc',phan_loai='$the_loai', mo_ta='$mo_ta' WHERE id_giay = '$id'";
            $query2=mysqli_query($this->con,$sql2);
            
      return $query2;
      }
      
     function Sua_user($email,$sdt,$id,$role){
     $sql2="UPDATE user SET email='$email', sdt='$sdt',role='$role' WHERE user_id =$id";
            $query=mysqli_query($this->con,$sql2);
            return $query;
    }
    function suahinh1($file_name,$ten_nha_cung_cap,$id){
     $query = "update giay set hinh1='img/$ten_nha_cung_cap/$file_name' where id_giay=$id";
        mysqli_query($this->con, $query);
    }
    function suahinh2($file_name,$ten_nha_cung_cap,$id){
        $query = "update giay set hinh2='img/$ten_nha_cung_cap/$file_name' where id_giay=$id";
       mysqli_query($this->con, $query);
    }
    function suahinh3($file_name,$ten_nha_cung_cap,$id){
        $query = "update giay set hinh3='img/$ten_nha_cung_cap/$file_name' where id_giay=$id";
        mysqli_query($this->con, $query);
    }
    }
?>

