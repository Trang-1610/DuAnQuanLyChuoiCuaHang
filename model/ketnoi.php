<?php
    class clsKetNoi{
        public function moKetNoi(){
            return mysqli_connect("localhost","root","", "haoquangptud1");
        }
        public function dongKetNoi($con){
        $con->close();
        }
    }
    //Chuyển qua inclu_one;
    
?>