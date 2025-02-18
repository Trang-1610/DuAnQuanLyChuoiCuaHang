<?php
include_once("ketnoi.php");

class MHoaDon {
    public function SelectAllHoaDon() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT c.Mamonan, c.Madon, c.Soluong, m.TenMonAn, d.TenKhachHang, d.GioTaoDon, d.TongTien 
            FROM chitiethoadon c 
            JOIN donhang d ON c.Madon = d.Madon
            JOIN monan m ON c.Mamonan = m.Mamonan
            WHERE d.GioTaoDon >= NOW() - INTERVAL 1 DAY";   

            $tblHoaDon = $con->query($str);
            $p->dongKetNoi($con);
            return $tblHoaDon;
        } else {
            return false; 
        }
    } 
}
?>