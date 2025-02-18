<?php 
include_once("ketnoi.php");
class mDon{
    public function sellectAllDon(){
        $p = new clsKetNoi();
        $con = $p -> moKetNoi();
        if($con){
            $sql = "SELECT * FROM donhang d 
            JOIN nhanvien n ON n.MANV = d.MaNhanVien 
            JOIN pttt p ON d.PhuongThucThanhToan = p.MaPhuongThuc 
            JOIN chitiethoadon c ON c.Madon = d.Madon
            ORDER BY d.Madon ASC";
            $kq = mysqli_query($con,$sql);
            $p -> dongKetNoi($con);
            return $kq;
        } else { 
            return false; 
        }
    }
    public function SelectMaDon($id) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM donhang WHERE MaDon = ?";
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
    public function selectAllDonByPTTT($PhuongThucThanhToan){
        $p = new clsKetNoi();
        $con = $p -> moKetNoi();
        $truyvan = "select * from donhang d join pttt p on d.PhuongThucThanhToan = p.MaPhuongThuc where d.PhuongThucThanh='$PhuongThucThanhToan'";
        $tbl = mysqli_query($con,$truyvan);
        $p -> dongKetNoi($con);
        return $tbl;
    }
    
        // public function taoDon($manv, $tongtien) {
        //     $p = new clsKetNoi();
        //     $conn = $p->moKetNoi();
        //     if ($conn) {
        //         $str = "INSERT INTO donhang (MaNhanVien,GioTaoDon,PhuongThucThanhToan, TongTien) VALUES ('$manv',now(),1,'$tongtien')";
        //         $result = $conn->query($str);
        //         // $p->dongKetNoi($conn);
        //         if ($result) {
        //             return $conn->insert_id;
        //         } else {
        //             return 0;
        //         }
        //     } else {
        //         return false;
        //     }
        // }
        public function them($GioTaoDon, $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $MaCuaHang , $TrangThai) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
        
            if (!$con) {
                // Kiểm tra lỗi kết nối cơ sở dữ liệu
                die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
            }
        
            // Kiểm tra câu lệnh SQL
            $sql = "INSERT INTO donhang (GioTaoDon, TongTien, PhuongThucThanhToan, GhiChu, TenKhachHang, SoDienThoai, DiaChi, MaNhanVien, MaCuaHang, TinhTrang) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $con->prepare($sql);
        
            if ($stmt === false) {
                // In ra lỗi khi chuẩn bị câu lệnh SQL
                die("Lỗi chuẩn bị câu lệnh SQL: " . $con->error);
            }
        
            // Gắn tham số cho câu lệnh SQL
            $stmt->bind_param("sissssiiii", $GioTaoDon, $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $MaCuaHang, $TrangThai);
        
            if ($stmt->execute()) {
                $insertId = $stmt->insert_id; // Lấy ID tự động tăng
                $stmt->close();
                $p->dongKetNoi($con);
                return $insertId; // Trả về mã đơn hàng vừa thêm
            } else {
                // Lỗi khi thực thi câu lệnh SQL
                die("Lỗi thực thi câu lệnh SQL: " . $stmt->error);
            }
        }
        
            
        
        // Phương thức thêm chi tiết hóa đơn
        public function themChiTiet($mamonan, $madon, $soluong) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
        
            if ($con) {
                $sql = "INSERT INTO chitiethoadon (Mamonan, Madon, Soluong) VALUES (?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("iii", $mamonan, $madon, $soluong);
        
                if ($stmt->execute()) {
                    $stmt->close();
                    $p->dongKetNoi($con);
                    return true;
                } else {
                    error_log("Lỗi: " . $stmt->error); // Ghi log lỗi
                    $stmt->close();
                    $p->dongKetNoi($con);
                    return false;
                }
            } else {
                return false;
            }
        }
    
        public function getAllDonHang() {
            $p = new clsKetNoi();
            $conn = $p->moKetNoi();
            $sql = "SELECT * FROM donhang d 
                    JOIN nhanvien n ON d.MaNhanVien = n.MaNV 
                    JOIN pttt p ON d.PhuongThucThanhToan = p.MaPhuongThuc";
            $result = mysqli_query($conn, $sql);
            $p->dongKetNoi($conn);
            return $result;
        }
    
        public function getChiTietDon($madon) {
            $p = new clsKetNoi();
            $conn = $p->moKetNoi();
            $sql = "SELECT m.TenMonAn, h.SoLuong 
                    FROM hoadon h 
                    JOIN monan m ON h.MaMonAn = m.MaMonAn 
                    WHERE h.MaDon = '$madon'";
            $result = mysqli_query($conn, $sql);
            $p->dongKetNoi($conn);
            return $result;
        }
    }
    
?>