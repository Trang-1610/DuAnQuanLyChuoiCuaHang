<?php
    include_once("model/mNhanVien.php");
    class CNhanVien{
        public function getAllNV(){
            $p = new MNhanVien();
            $tblNV = $p->selectAllNV();
            if(!$tblNV){
                return -1;
            }else{
                if($tblNV->num_rows > 0){
                    return $tblNV;
                }else{
                    return 0; // không có dữ liệu trong bảng
                }
            }
        }

        // Lấy nhân viên theo mã
        public function getMaNV($id) {
            $p = new MNhanVien();
            $tblNV = $p->SelectMaNV($id);

            if ($tblNV) {
                return $tblNV;
            } else {
                return null; // Không có nv với id đó
            }
        }

        public function getNVwithChucVu($id) {
            $p = new MNhanVien();
            $tblNV = $p->SelectNVwithChucVu($id);

            if ($tblNV) {
                return $tblNV;
            } else {
                return null; // Không có nv với id đó
            }
        }

        public function getAllNVbyName($sp){
            $p = new MNhanVien();
            // Xử lý SQL injection tại đây
         
            $tblNV= $p->SelectAllNVbyName($sp);
            if(!$tblNV){
                return -1;
            }else{
                if($tblNV->num_rows>0){
                    return $tblNV;
                }else{
                    return 0;// không có dòng dữ liệu
                }
            }
        }

        public function getSua($sql){
            $p = new MNhanVien();
            // Xử lý SQL injection tại đây
         
            $result= $p->sua($sql);
            if (!$result) {
                return -1;  // Lỗi khi cập nhật
            } else {
                return 1;  // Thành công
            }
        }

        // Phương thức lấy mật khẩu của nhân viên từ bảng taikhoan
// public function getPasswordFromAccount($maNV) {
//      $sql = "SELECT MatKhau FROM taikhoan WHERE MaNV = ?";
//      $stmt = $this->conn->prepare($sql);
//      $stmt->bind_param("i", $maNV);
//      $stmt->execute();
//      $result = $stmt->get_result();
    
//     if ($result->num_rows > 0) {
//          $row = $result->fetch_assoc();
//          return $row['MatKhau']; // Trả về mật khẩu từ bảng taikhoan
//      } else {
//          return null; // Nếu không tìm thấy tài khoản
//     }
//  }

public function getPasswordFromAccount($maNV) {
    // Kết nối tới cơ sở dữ liệu
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    $con->set_charset('utf8');  // Đặt mã hóa ký tự

    // Kiểm tra kết nối cơ sở dữ liệu
    if ($con) {
        // Câu lệnh SQL để lấy mật khẩu cũ từ bảng taikhoan
        $sql = "SELECT MatKhau FROM taikhoan WHERE MaNV = ?";

        // Sử dụng prepared statement để tránh SQL Injection
        if ($stmt = $con->prepare($sql)) {
            // Gắn tham số vào prepared statement
            $stmt->bind_param("i", $maNV);  // 'i' là kiểu dữ liệu integer cho MaNV

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                // Lấy kết quả
                $stmt->bind_result($matKhauCu); // Biến $matKhauCu nhận giá trị mật khẩu
                $stmt->fetch(); // Lấy dữ liệu từ kết quả truy vấn

                $stmt->close(); // Đóng statement
                $p->dongKetNoi($con); // Đóng kết nối cơ sở dữ liệu

                return $matKhauCu; // Trả về mật khẩu cũ
            } else {
                $stmt->close();
                $p->dongKetNoi($con);
                return null; // Nếu có lỗi trong việc thực thi câu lệnh
            }
        } else {
            $p->dongKetNoi($con);
            return null; // Nếu không thể chuẩn bị câu lệnh SQL
        }
    } else {
        return null; // Nếu kết nối cơ sở dữ liệu thất bại
    }
}

public function updatePassword($maNV, $newPasswordHash) {
    // Kết nối tới cơ sở dữ liệu
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    $con->set_charset('utf8');  // Đặt mã hóa ký tự

    // Kiểm tra kết nối cơ sở dữ liệu
    if ($con) {
        // Câu lệnh SQL để cập nhật mật khẩu
        $sql = "UPDATE taikhoan SET MatKhau = ? WHERE MaNV = ?";
        
        // Sử dụng prepared statement để tránh SQL Injection
        if ($stmt = $con->prepare($sql)) {
            // Gắn tham số vào prepared statement
            $stmt->bind_param("si", $newPasswordHash, $maNV);
            
            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                $stmt->close(); // Đóng statement sau khi thực thi
                $p->dongKetNoi($con); // Đóng kết nối cơ sở dữ liệu
                return true; // Trả về true nếu thành công
            } else {
                $stmt->close();
                $p->dongKetNoi($con);
                return false; // Trả về false nếu có lỗi
            }
        } else {
            $p->dongKetNoi($con);
            return false; // Nếu không thể chuẩn bị câu lệnh SQL
        }
    } else {
        return false; // Nếu kết nối cơ sở dữ liệu thất bại
    }
}

    }
?>