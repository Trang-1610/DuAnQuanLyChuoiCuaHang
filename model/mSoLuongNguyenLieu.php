<?php
include_once("ketnoi.php");

class MSoLuongNL {
    // Lấy tất cả số lượng nguyên liệu
    public function SelectALLSoLuongNL() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM soluongnguyenlieu";
            $tblSLNL = $con->query($str);
            $p->dongKetNoi($con);
            return $tblSLNL;
        } else {
            return false; 
        }
    }
    
    // Lấy thông tin theo mã món ăn
    public function SelectByMaMonAn($maMonAn) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM soluongnguyenlieu WHERE MaMonAn = ?";
            $stmt = $con->prepare($str);
            
            if ($stmt) {
                $stmt->bind_param("i", $maMonAn); // Gắn tham số
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close(); // Đóng statement
                $p->dongKetNoi($con);

                if ($result->num_rows > 0) {
                    return $result; // Trả về danh sách kết quả
                } else {
                    return null; // Không có dữ liệu
                }
            } else {
                $p->dongKetNoi($con);
                return false; // Lỗi khi chuẩn bị câu lệnh
            }
        } else {
            return false; // Không kết nối được đến CSDL
        }
    }
}
?>
