<?php
    include_once("ketnoi.php");
    class mDuyetDon{
        public function SelectAllDon(){
            $p = new clsKetNoi();  
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "select * from donhang order by MaDon desc";
                $tblDD = $con->query($str);
                $p->dongketnoi($con);
                return $tblDD;
            }else{
                return false; //không thể kết nối csdl
            }
        }

        // Lấy một DX theo id
        public function SelectMaDon($id) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $con->set_charset('utf8');
            if ($con) {
                $str = "SELECT * FROM donhang d inner join chitiethoadon ct on d.MaDon=ct.Madon inner join monan m on ct.Mamonan = m.MaMonAn WHERE MaDon = ?";
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

        public function SelectChiTietDon($chitiet) {
            $p = new clsKetNoi(); 
            $con = $p->moketnoi(); 
            $con->set_charset('utf8'); 
            if ($con) {
                $str = "SELECT * FROM donhang 
                        where MaDon = '$chitiet'";
                $tblDD = $con->query($str); 
                $p->dongketnoi($con); 
                return $tblDD; 
            } else {
                return false; // Trả về false nếu kết nối thất bại
            }
        }
        public function SelectChiTietDonmonan($chitiet) {
            $p = new clsKetNoi(); 
            $con = $p->moketnoi(); 
            $con->set_charset('utf8'); 
            if ($con) {
                $str = "SELECT * FROM chitiethoadon ct inner join monan m on ct.Mamonan = m.MaMonAn
                        where ct.Madon = $chitiet";
                $tblDD = $con->query($str); 
                $p->dongketnoi($con); 
                return $tblDD; 
            } else {
                return false; // Trả về false nếu kết nối thất bại
            }
        }
        public function updateTrangThai($id, $trangthai){
            $p = new clsKetNoi();  
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            if($con){
                $str = "UPDATE donhang SET TinhTrang = ? WHERE MaDon = ?";
                $stmt = $con->prepare($str);
                if ($stmt) {
                    $stmt->bind_param("ii", $trangthai, $id);
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