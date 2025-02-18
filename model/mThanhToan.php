<?php
include_once("ketnoi.php");
class MThanhToan {
 
    // Phương thức thêm đơn hàng
   // Phương thức thêm đơn hàng
public function them($GioTaoDon, $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $TinhTrang, $MaCuaHang) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    if (!$con) {
        // Kiểm tra lỗi kết nối cơ sở dữ liệu
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Kiểm tra câu lệnh SQL
    $sql = "INSERT INTO donhang (GioTaoDon, TongTien, PhuongThucThanhToan, GhiChu, TenKhachHang, SoDienThoai, DiaChi, MaNhanVien, TinhTrang, MaCuaHang) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        // In ra lỗi khi chuẩn bị câu lệnh SQL
        die("Lỗi chuẩn bị câu lệnh SQL: " . $con->error);
    }

    // Gắn tham số cho câu lệnh SQL
    $stmt->bind_param("sissssiiis", $GioTaoDon, $TongTien, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $MaNhanVien, $TinhTrang, $MaCuaHang);

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

    public function xoa($sql) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            if ($con->query($sql) === TRUE) {
                $p->dongKetNoi($con);
                return true; // Thành công
            } else {
                $p->dongKetNoi($con);
                return false; // Thất bại
            }
        } else {
            return false;
        }
    }
}
?>
