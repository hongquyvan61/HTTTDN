<?php 
    class cart_model1{
        private $con;
        public function __construct() {
            $this->con = ketnoi();
        }
        public function getnumrowcart($user_id){
            $query = "select *
                    from chi_tiet_gio_hang as ct join gio_hang as gio
                    on ct.id_gio_hang = gio.id_gio_hang
                    where gio.user_id=".$user_id['userid'].";";
            $result = mysqli_query($this->con, $query);
            $num = mysqli_num_rows($result);
            return $num;
        }
        public function getallidgiaybyuser($user_id){
            $query = "select ct.id_giay,g.ten, ncc.ten_nha_cung_cap,ct.size,ct.so_luong,g.don_gia
                        from chi_tiet_gio_hang as ct 
                        join giay as g
                        on ct.id_giay = g.id_giay
                        join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                        join gio_hang as gio
                        on ct.id_gio_hang = gio.id_gio_hang
                        where gio.user_id =".$user_id['userid'].";";
            $result = mysqli_query($this->con, $query);
            $data = array();
            $dem=0;
            while($row = mysqli_fetch_assoc($result)){
                $data[$dem] = $row['id_giay'];
                $dem+=1;
            }
            return $data;
        }
        public function getallsizegiaybyuser($user_id){
            $query = "select ct.id_giay,g.ten, ncc.ten_nha_cung_cap,ct.size,ct.so_luong,g.don_gia
                        from chi_tiet_gio_hang as ct 
                        join giay as g
                        on ct.id_giay = g.id_giay
                        join nha_cung_cap as ncc
                        on g.ma_nha_cung_cap = ncc.ma_nha_cung_cap
                        join gio_hang as gio
                        on ct.id_gio_hang = gio.id_gio_hang
                        where gio.user_id =".$user_id['userid'].";";
            $result = mysqli_query($this->con, $query);
            //$counter = $this->getfirstidbyuser($user_id);
            $data = array();
            $dem=0;
            while($row = mysqli_fetch_assoc($result)){
                $data[$dem] = $row['size'];
                $dem+=1;
            }
            return $data;
        }
        public function getIDgiohangbyUserID($userid){
                $con = ketnoi();
                $query = "select id_gio_hang from gio_hang where user_id=$userid";
                $result = mysqli_query($con, $query);
                $num_row = mysqli_num_rows($result);
                if($num_row!= 0){
                    while($row = mysqli_fetch_assoc($result)){
                       $idgiohang = $row["id_gio_hang"];
                       return $idgiohang;
                    }
                }
                return 0;
        }
        public function emptycart($user_id){
            $idgiohang = $this->getIDgiohangbyUserID($user_id);
            $query = "delete from chi_tiet_gio_hang where id_gio_hang=?";
            $stmt = mysqli_prepare($this->con, $query);
            mysqli_stmt_bind_param($stmt, "i", $idgiohang);
            mysqli_stmt_execute($stmt);
            /*if(mysqli_stmt_affected_rows($stmt) != 0){
                return true;
            }
            else{
                return false;
            }*/
        }
    }
?>

