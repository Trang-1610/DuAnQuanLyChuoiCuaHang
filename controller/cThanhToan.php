<?php
include_once("model/mThanhToan.php");
class CThanhToan{

    // public function getThem(){
    //     $p = new MThanhToan();
    //     // Xử lý SQL injection tại đây
     
    //     $result= $p->them();
    //     if (!$result) {
    //         return -1;  // Lỗi khi cập nhật
    //     } else {
    //         return 1;  // Thành công
    //     }
    // }

    public function getXoa($maDonHang, $tinhTrang) {
        $p = new MThanhToan();

        // Xử lý SQL injection nếu cần
        $sql = "DELETE FROM donhang WHERE MaDon = '$maDonHang' AND TinhTrang = '$tinhTrang'";

        $result = $p->xoa($sql);
        
        if (!$result) {
            return -1;  // Lỗi khi xóa đơn hàng
        } else {
            return 1;  // Thành công
        }
    }
    
}
?>
