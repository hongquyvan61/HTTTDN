<?php
    class testdauvao{
        public function __construct() {
            
        }
        public function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
?>

