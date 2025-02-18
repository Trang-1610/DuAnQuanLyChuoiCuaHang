<?php
include_once("model/mDon.php");
class ctaodon{
    
    public function themdon( $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $TinhTrang, $MaCuaHang,$mamonan, $soluong){
        
        $p = new mDon();
        
        $result=$p->them( $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $TinhTrang, $MaCuaHang);
        echo "<script>alert(1)</script>";
        if ($result!=-1) {
            if($p->taoChiTietDon($result, $mamonan, $soluong)){
                // return true;
                echo "<script>alert(1)</script>";
            }else {
                echo "<script>alert(2)</script>";

            }
        } else {
                echo "<script>alert(3)</script>";
            // return false;
        }
    }

    
   
}


?>
