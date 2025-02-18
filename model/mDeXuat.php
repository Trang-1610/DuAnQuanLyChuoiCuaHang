<?php
    include_once("ketnoi.php");
    class MDeXuat{
        public function SelectAllDX(){
            $p = new clsKetNoi();  
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "select * from monandexuat";
                $tblDX = $con->query($str);
                $p->dongketnoi($con);
                return $tblDX;
            }else{
                return false; //không thể kết nối csdl
            }
        }

        // Lấy một DX theo id
        public function SelectMaDX($id) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');
            if ($con) {
                $str = "SELECT * FROM monandexuat WHERE MaDeXuat = ?";
                $stmt = $con->prepare($str);
                $stmt->bind_param("i", $id); // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
                $stmt->execute();
                $result = $stmt->get_result();
                $p->dongKetNoi($con);

                if ($result->num_rows > 0) {
                    return $result->fetch_assoc(); // Trả về 1 dòng kết quả
                } else {
                    return false; // Không tìm thấy DX với id đó
                }
            } else {
                return false; // Không thể kết nối đến CSDL
            }
        }

        public function SelectChiTietDX($chitiet) {
            $p = new clsKetNoi(); 
            $con = $p->moketnoi(); 
            $con->set_charset('utf8'); 
            if ($con) {
                $str = "SELECT M.*, L.TenLoaiMonAn, N.HoTen AS NguoiDeXuat 
                FROM monandexuat M
                JOIN loaimonan L ON M.MaLoaiMonAn = L.MaLoaiMonAn
                JOIN nhanvien N ON M.MaNV = N.MaNV
                WHERE MaDeXuat = '$chitiet'";
                $tblDX = $con->query($str); 
                $p->dongketnoi($con); 
                return $tblDX; 
            } else {
                return false; // Trả về false nếu kết nối thất bại
            }
        }
       
        public function addDX($sql) {
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');      
            if($con){
                $str = $sql;
                $tblDX = $con->query($str);
                $p->dongketnoi($con);
                return $tblDX;
            }else{
                return false;
            }
        }
            
        public function updateTrangThai($id, $trangThai){
            $p = new clsKetNoi();  
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "UPDATE monandexuat SET TrangThai = ? WHERE MaDeXuat = ?";
                $stmt = $con->prepare($str);
                if ($stmt) {
                    $stmt->bind_param("ii", $trangThai, $id);
                    $result = $stmt->execute();
                    $stmt->close();
                    $p->dongketnoi($con);
                    return $result; // Trả về true nếu thành công, false nếu lỗi
                } else {
                    return false;
                }
            } else {
                return false; // Không thể kết nối csdl
            }
        }
    }
?>