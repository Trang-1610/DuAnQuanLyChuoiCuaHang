<?php
    include_once("ketnoi.php");
    class MNhanVien{
        public function SelectAllNV(){
            $p = new clsKetNoi();  
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "SELECT nhanvien.*, cuahang.TenCuaHang, chucvu.TenChucVu
                        FROM nhanvien 
                        LEFT JOIN cuahang ON nhanvien.MaCuaHang = cuahang.MaCuaHang
                        LEFT JOIN chucvu ON nhanvien.MaChucVu = chucvu.MaChucVu";
                $tblNV = $con->query($str);
                $p->dongketnoi($con);
                return $tblNV;
            }else{
                return false; //không thể kết nối csdl
            }
        }

        // Lấy một Nv theo id
        public function SelectMaNV($id) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');
            if ($con) {
                $str = "SELECT * FROM nhanvien WHERE MaNV = ?";
                $stmt = $con->prepare($str);
                $stmt->bind_param("i", $id); // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
                $stmt->execute();
                $result = $stmt->get_result();
                $p->dongKetNoi($con);

                if ($result->num_rows > 0) {
                    return $result->fetch_assoc(); // Trả về 1 dòng kết quả
                } else {
                    return false; // Không tìm thấy nv với id đó
                }
            } else {
                return false; // Không thể kết nối đến CSDL
            }
        }

        //Tim kiem nhan vien theo ten
        public function SelectAllNVbyName($nhanvien){
            $p= new clsKetNoi();
            $con= $p->moKetNoi();
            if($con){
                $str = "SELECT nhanvien.*, cuahang.TenCuaHang, chucvu.TenChucVu
                        FROM nhanvien 
                        LEFT JOIN cuahang ON nhanvien.MaCuaHang = cuahang.MaCuaHang
                        LEFT JOIN chucvu ON nhanvien.MaChucVu = chucvu.MaChucVu
                        WHERE HoTen like N'%$nhanvien%'";
                $tblNV= $con->query($str);
                $p->dongKetNoi($con);
                return $tblNV;
            }
            else{
                return false; // không thể kết nối đến csdl
            }
        }

        public function SelectNVwithChucVu($id) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            if ($con) {
                $str = "SELECT NhanVien.*, ChucVu.TenChucVu, CuaHang.TenCuaHang
        FROM NhanVien 
        JOIN ChucVu ON NhanVien.MaChucVu = ChucVu.MaChucVu 
        JOIN CuaHang ON NhanVien.MaCuaHang = CuaHang.MaCuaHang
        WHERE NhanVien.MaNV = ?";

                
                // Chuẩn bị truy vấn
                $stmt = $con->prepare($str);
                if ($stmt) {
                    // Gán giá trị cho dấu `?`
                    $stmt->bind_param('i', $id); // 'i' cho kiểu số nguyên
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $tblNV = $result->fetch_assoc(); // Lấy một dòng dữ liệu
                    $stmt->close(); // Đóng statement
                } else {
                    return false; // Lỗi khi chuẩn bị truy vấn
                }
                $p->dongKetNoi($con); // Đóng kết nối
                return $tblNV;
            } else {
                return false; // Không thể kết nối đến CSDL
            }
        }        

        // Kiểm tra số điện thoại đã tồn tại
        public function checkPhoneExists($phone) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if ($con) {
                $query = "SELECT * FROM nhanvien WHERE SDT = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param("s", $phone);
                $stmt->execute();
                $result = $stmt->get_result();
                $exists = $result->num_rows > 0; // Kiểm tra nếu tồn tại dòng nào
                $stmt->close();
                $p->dongketnoi($con);
                return $exists;
            } else {
                return false;
            }
        }

        // Kiểm tra email đã tồn tại
        public function checkEmailExists($email) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if ($con) {
                $query = "SELECT * FROM nhanvien WHERE email = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $exists = $result->num_rows > 0; // Kiểm tra nếu tồn tại dòng nào
                $stmt->close();
                $p->dongketnoi($con);
                return $exists;
            } else {
                return false;
            }
        }

        public function getLastInsertId() {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $insertId = $con->insert_id;
            $p->dongketnoi($con);
            return $insertId;
        }
        public function checkExist($sql) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $result = $con->query($sql); // Thực hiện câu truy vấn
            $p->dongketnoi($con);
            return $result->num_rows > 0; // Trả về true nếu có kết quả
        }

        // UPDATE Nhan vien
        public function suaNV($sql) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');
            if ($con) {
                if ($con->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
                $p->dongKetNoi($con);
            } else {
                return false;
            }
        }

        public function getAllNVWithCuaHang() {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');     
            if ($con) {
                $sql = "SELECT nhanvien.*, cuahang.TenCuaHang 
                        FROM nhanvien 
                        LEFT JOIN cuahang ON nhanvien.MaCuaHang = cuahang.MaCuaHang";  
                $result = $con->query($sql);
                $p->dongKetNoi($con);        
                if ($result->num_rows > 0) {
                    return $result;  // Trả về kết quả với dữ liệu nhân viên và tên cửa hàng
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
        
        public function addNV($name, $gender, $machucvu, $address, $phone, $email, $trangthai, $macuahang) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if ($con) {
                $sql = "INSERT INTO nhanvien (HoTen, GioiTinh, MaChucVu, DiaChi, SDT, Email, TrangThai, MaCuaHang) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sissssii", $name, $gender, $machucvu, $address, $phone, $email, $trangthai, $macuahang);
                if ($stmt->execute()) {
                    $insertId = $stmt->insert_id; // Lấy ID vừa thêm
                    $stmt->close();
                    $p->dongketnoi($con);
                    return $insertId; // Trả về ID
                } else {
                    error_log("Lỗi: " . $stmt->error); // Ghi log lỗi
                    $stmt->close();
                    $p->dongketnoi($con);
                    return false;
                }
            } else {
                error_log("Không thể kết nối tới cơ sở dữ liệu");
                return false;
            }
        }
    
        public function addTaiKhoan($manv, $password, $machucvu) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if ($con) {
                $sql = "INSERT INTO taikhoan (MaNV, MatKhau, MaChucVu) VALUES (?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("isi", $manv, $password, $machucvu);
                if ($stmt->execute()) {
                    $stmt->close();
                    $p->dongketnoi($con);
                    return true;
                } else {
                    error_log("Lỗi: " . $stmt->error); // Ghi log lỗi
                    $stmt->close();
                    $p->dongketnoi($con);
                    return false;
                }
            } else {
                error_log("Không thể kết nối tới cơ sở dữ liệu");
                return false;
            }
        }

        // Hàm cập nhật mật khẩu trong bảng tài khoản (taikhoan) qua MaNV
    // Phương thức cập nhật mật khẩu trong bảng taikhoan





    }
?>