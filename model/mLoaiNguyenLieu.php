<?php
include_once("ketnoi.php");
class mloainguyenlieu{
    public function selectallloainguyenlieu(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from loainguyenlieu ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function select1loainguyenlieu($Maloai){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from loainguyenlieu where MaLoaiNguyenLieu = $Maloai";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function deleteloainguyenlieu($idloai) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if($conn) {
            $sql = "SELECT COUNT(*) as product_count FROM product WHERE idloai = $idloai";
            $soluongproduct = $conn->query($sql);
            $row = $soluongproduct->fetch_assoc();
            if ($row['product_count'] == 0) {
                $str = "delete from loainguyenlieu where MaLoaiNguyenLieu  = '$idloai'";
                $result = $conn->query($str);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            }else {
                echo "<script>alert('Không thể xóa loại sản phẩm này vì vẫn còn sản phẩm thuộc loại này.')</script>";
            }
           
            $p->dongKetNoi($conn);
        }
    }


    public function inserttype($tenloai)
    { 
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "insert into loainguyenlieu(TenLoaiNguyenLieu) values ('$tenloai')";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }

    public function updateloai($Idloai, $Tenloai)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update loainguyenlieu set TenLoaiNguyenLieu = '$Tenloai' where MaLoaiNguyenLieu = '$Idloai'";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }


}


?>