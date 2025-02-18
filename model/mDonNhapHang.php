<?php
include_once("ketnoi.php");
class mdonnhaphang{
    public function selectalldonnhaphang(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donnhaphang d where d.TinhTrang =2";
        // $str="select * from donnhaphang d ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectalldonnhaphang2(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donnhaphang d where d.TinhTrang =1";
        // $str="select * from donnhaphang d ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectalldonnhaphangtheoch($ch){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donnhaphang d  where d.TinhTrang =2 and d.MaCuaHang =$ch";
        // $str="select * from donnhaphang d ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectalldonnhaphang2theoch($ch){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donnhaphang d inner join cuahang c on d.MaCuaHang=c.MaCuaHang where d.TinhTrang =1 and d.MaCuaHang =$ch";
        // $str="select * from donnhaphang d ";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function select1donnhaphang($MaDNH){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from donnhaphang d inner join nhanvien n on d.MaNhanVien=n.MaNV where d.MaDonNhapHang = $MaDNH";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function selectchitietdonnhaphang($MaDNH){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from nguyenlieuuocluong ul inner join nguyenlieu n on ul.MaNguyenLieu=n.MaNguyenLieu inner join LoaiNguyenLieu l on n.MaLoaiNguyenLieu=l.MaLoaiNguyenLieu inner join DonViTinh d on d.MaDonViTinh=n.MaDonViTinh where ul.MaDonNhapHang = $MaDNH HAVING KhoiLuong != 0 ORDER BY ul.MaNguyenLieu";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function updatetinhtrang($MaDNH,$gianhap){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="update donnhaphang set TinhTrang=2 , GiaNhap=$gianhap where MaDonNhapHang = $MaDNH";

        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
   
    


}


?>