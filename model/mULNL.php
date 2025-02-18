<?php
include_once("ketnoi.php");
class mnlul{
    //lấy tất cả nguyen lieu
    public function selectallnlul(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from nguyenlieuuocluong";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }



    public function insertdnh($gianhap,$ch,$nv)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "insert into donnhaphang(NgayNhapHang,GiaNhap,TinhTrang,MaCuaHang,MaNhanVien) values (now(), $gianhap, 1,$ch,$nv)";
            $result = $conn->query($str);
            // $p->dongKetNoi($conn);
            if ($result) {
                return $conn->insert_id;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
public function insertnlul($MaNguyenLieu,$MaDonNhapHang,$KhoiLuong)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        $demm =0;
        foreach($MaNguyenLieu as $index => $manl){
            $kl=$KhoiLuong[$demm];
            // echo $manl;
            $str = "insert into nguyenlieuuocluong(MaNguyenLieu,MaDonNhapHang,KhoiLuong) values ('$manl', '$MaDonNhapHang', $kl)";
            
            $conn->query($str);
            $demm++;
        }
        if($demm >0 ) {
            return true;
        }else {
            return false;
        }

        
    }
    
    public function updatesoluongton($MaNguyenLieu,$KhoiLuong)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        $demm =0;
        foreach($MaNguyenLieu as $index => $manl){
            $kl=$KhoiLuong[$demm];
            // echo $manl;
            $str = "update nguyenlieu set SoLuong =  $KhoiLuong where MaNguyenLieu = $manl";
            
            $conn->query($str);
            $demm++;
        }
        if($demm >0 ) {
            return true;
        }else {
            return false;
        }

        
    }
    public function updatesoluongnguyenlieu($MaNguyenLieu,$KhoiLuong,$cuahang)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        $demm =0;
        foreach($MaNguyenLieu as $index => $manl){
            $kl=$KhoiLuong[$demm];
            // echo $manl;
            $str = "update soluongton set SoLuong =  SoLuong + $kl where MaNguyenLieu = $manl and MaCuaHang=$cuahang";
            
            $conn->query($str);
            $demm++;
        }
        if($demm >0 ) {
            return true;
        }else {
            return false;
        }

        
    }
    public function updatetinhtrangdon($madonnhaphang,$gianhap)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update donnhaphang set GiaNhap = '$gianhap',  TinhTrang = 2 where MaDonNhapHang = $madonnhaphang";
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