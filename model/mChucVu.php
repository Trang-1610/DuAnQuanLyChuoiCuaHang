<?php
include_once("ketnoi.php");

class MChucVu {
    public function SelectAllChucVu() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM chucvu";
            $tblchucvu = $con->query($str);
            $p->dongKetNoi($con);
            return $tblchucvu;
        } else {
            return false; 
        }
    } 
    
   // Lấy một món ăn theo id
   public function SelectMaChucVu($id) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        $str = "SELECT * FROM chucvu WHERE MaChucVu = ?";
        $stmt = $con->prepare($str);
        $stmt->bind_param("i", $id); // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
        $stmt->execute();
        $result = $stmt->get_result();
        $p->dongKetNoi($con);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Trả về 1 dòng kết quả
        } else {
            return false; // Không tìm thấy món ăn với id đó
        }
    } else {
        return false; // Không thể kết nối đến CSDL
    }
}
    
    
}
?>
