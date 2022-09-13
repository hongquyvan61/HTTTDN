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
          function insertbill($user,$date,$total,$username,$contact,$add){
                $sql="INSERT INTO don_hang(user_id,tong_tien,ngay_gio_thanh_toan,tinh_trang,ten_nguoinhan,sdt_nguoinhan,diachi_giaohang)
                          VALUES($user,$total,'$date','Paid','$username','$contact','$add')";
               mysqli_query($this->con,$sql);
            }
        public function gettotalprice(){
            $query ="select total from bill";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
        public function getinfo($userid){
            $query = "select don.ma_don_hang, ct.id_giay, ct.size, ct.so_luong, g.don_gia
                    from chi_tiet_gio_hang as ct 
                    join gio_hang as gio 
                    on ct.id_gio_hang = gio.id_gio_hang
                    join giay as g
                    on ct.id_giay = g.id_giay
                    join don_hang as don
                    on gio.user_id = don.user_id
                    where gio.user_id=$userid";
            //$query ="select t.bill_id, t.shoe_id,t.quantity,s.price from (SELECT b.bill_id, c.shoe_id,c.quantity 
                    //FROM bill as b join cart as c
                    //on b.user=c.user_id and b.date=c.payment_time
                    //where status='Paid' and payment_time='$payment_time') as t join shoes as s
                    //on t.shoe_id=s.shoe_id";
            $result = mysqli_query($this->con, $query);
            return $result;
        }
     }
?>

