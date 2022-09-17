<?php 
    class detailbill_model{
        private $con;
        public function __construct() {
            $this->con = ketnoi();
        }
        public function insertdetailbill($userid){
            $bill = new bill_model();
            //$encrypt = new encrypt();
            $result = $bill->getinfo($userid);
            while ($row = mysqli_fetch_assoc($result)) {
                $bill_id = $row['ma_don_hang'];
                $shoe_id = $row['id_giay'];
                $sizegiay = $row['size'];
                $quantity = $row['so_luong'];
                $price = $row['don_gia'];
                $query ="insert into chi_tiet_don_hang(ma_don_hang,id_giay,size,so_luong,don_gia)"
                        . "values($bill_id,$shoe_id,$sizegiay,$quantity,$price)";
                $result = mysqli_query($this->con, $query);
                if(mysqli_affected_rows($this->con) != 0){
                    return 1;
                }
                return 0;
            }
        }
        public function deletedetailbyID($orderid){
            $query2 = "delete from chi_tiet_don_hang where ma_don_hang=$orderid";
            $result2 = mysqli_query($this->con, $query2);
            if(mysqli_affected_rows($this->con) != 0){
                return 1;
            }
            return 0;
        }
     }
?>

