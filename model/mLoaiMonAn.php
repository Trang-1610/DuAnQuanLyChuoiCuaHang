<?php
include_once("ketnoi.php");

class MLoaiMonAn {
    public function SelectAllLoaiMonAn() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM loaimonan";
            $tblLoaiMonAN = $con->query($str);
            $p->dongKetNoi($con);
            return $tblLoaiMonAN;
        } else {
            return false; 
        }
    }   
    public function SelectAllLMA() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        if ($con) {
            $str = "SELECT * FROM loaimonan";
            $tblSP = $con->query($str);
            $p->dongKetNoi($con);
            return $tblSP;
        } else {
            return false; 
        }
    } 
    public function getLoaiMonAnById($maloai) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        if ($con) {
            $str = "SELECT * FROM loaimonan WHERE MaLoaiMonAn = ?";
            $stmt = $con->prepare($str);
            $stmt->bind_param("i", $maloai);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            $p->dongKetNoi($con);
            return $result;
        }
        return false;
    }

    public function updateLoaiMonAn($maloai, $tenLoai, $tinhTrang) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        if ($con) {
            $str = "UPDATE loaimonan SET TenLoaiMonAn = ?, TinhTrangMonAn = ? WHERE MaLoaiMonAn = ?";
            $stmt = $con->prepare($str);
            $stmt->bind_param("ssi", $tenLoai, $tinhTrang, $maloai);
            $result = $stmt->execute();
            $stmt->close();
            $p->dongKetNoi($con);
            return $result;
        }
        return false;
    }
    
    public function addLoaiMonAn($tenLoai, $tinhTrang) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            // Câu lệnh SQL để thêm dữ liệu vào bảng 'loaimonan'
            $str = "INSERT INTO loaimonan (TenLoaiMonAn, TinhTrangMonAn) VALUES ('$tenLoai', '$tinhTrang')";
            
            if ($con->query($str) === TRUE) {
                $p->dongKetNoi($con);
                return true; // Nếu thêm thành công
            } else {
                $p->dongKetNoi($con);
                return false; // Nếu có lỗi
            }
        } else {
            return false; // Không thể kết nối
        }
    }
    public function deleteLoaiMonAn($id) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            // Câu lệnh SQL để xóa loại món ăn
            $str = "DELETE FROM loaimonan WHERE MaLoaiMonAn = $id";
            
            if ($con->query($str) === TRUE) {
                $p->dongKetNoi($con);
                return true; // Xóa thành công
            } else {
                $p->dongKetNoi($con);
                return false; // Có lỗi
            }
        } else {
            return false; // Không thể kết nối
        }
    }

    public function searchLoaiMonAn($searchTerm) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $searchTerm = $con->real_escape_string($searchTerm);  // Bảo vệ khỏi SQL injection
            $str = "SELECT * FROM loaimonan WHERE TenLoaiMonAn LIKE '%$searchTerm%'";
            
            $result = $con->query($str);
            $p->dongKetNoi($con);
            return $result;
        } else {
            return false;
        }
    }
    

}
?>
