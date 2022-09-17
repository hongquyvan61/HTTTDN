<?php 
     class bill_model{
        private $con;
        public function __construct() {
            $this->con = ketnoi();
        }
//        public function insertbill($user,$date,$total){
//            $bill_query = "insert into bill(user,date,total)"
//                . "values(?,?,?)";
//            $stmt = mysqli_prepare($this->con,$bill_query);
//            mysqli_stmt_bind_param($stmt,"isi", $user,$date,$total);
//            mysqli_stmt_execute($stmt);
//        }
          function insertbill($user,$total){
                $sql="INSERT INTO don_hang(user_id,tong_tien,ngay_gio_thanh_toan,tinh_trang,ten_nguoinhan,sdt_nguoinhan,diachi_giaohang)
                          VALUES($user,$total,'','Processing','','','')";
               $result = mysqli_query($this->con,$sql);
               if(mysqli_affected_rows($this->con) != 0){
                    return 1;
                }
                return 0;
            }
        public function gettotalprice(){
            $query ="select SUM(tong_tien) as tong from don_hang";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getlatestbillbyUserID($userid){
            $query = "select MAX(ma_don_hang) as latestbill from don_hang where user_id=$userid";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getinfo($userid){
            $res = $this->getlatestbillbyUserID($userid);
            $row = mysqli_fetch_assoc($res);
            $latestbillID = $row['latestbill'];
            $query = "select don.ma_don_hang, ct.id_giay, ct.size, ct.so_luong, g.don_gia
                    from chi_tiet_gio_hang as ct 
                    join gio_hang as gio 
                    on ct.id_gio_hang = gio.id_gio_hang
                    join giay as g
                    on ct.id_giay = g.id_giay
                    join don_hang as don
                    on gio.user_id = don.user_id
                    where gio.user_id=$userid and don.ma_don_hang=$latestbillID";
            //$query ="select t.bill_id, t.shoe_id,t.quantity,s.price from (SELECT b.bill_id, c.shoe_id,c.quantity 
                    //FROM bill as b join cart as c
                    //on b.user=c.user_id and b.date=c.payment_time
                    //where status='Paid' and payment_time='$payment_time') as t join shoes as s
                    //on t.shoe_id=s.shoe_id";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function payorder($orderid,$paymentdate,$rcname,$rccontact,$rcadd){
            $query = "update don_hang set tinh_trang='Paid',ngay_gio_thanh_toan='$paymentdate',"
                    . " ten_nguoinhan='$rcname',sdt_nguoinhan='$rccontact',diachi_giaohang='$rcadd'"
                    . "where ma_don_hang=$orderid";
            $result = mysqli_query($this->con, $query);
        }
        public function deleteorderbyID($orderid){
            $query = "delete from don_hang where ma_don_hang=$orderid and tinh_trang='Processing'";
            $result = mysqli_query($this->con, $query);
            if(mysqli_affected_rows($this->con) != 0){
                return 1;
            }
            return 0;
        }
     }
?>

