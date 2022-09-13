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
                mysqli_query($this->con, $query);
                
            }
        }
     }
?>

