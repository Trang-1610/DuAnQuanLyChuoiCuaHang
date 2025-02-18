<?php
include_once("ketnoi.php");
class mdonvitinh{
    public function selectalldvt(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donvitinh ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function select1donvitinh($MaDonViTinh){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donvitinh where MaDonViTinh = $MaDonViTinh";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

   
   


}


?>