<?php
include_once("ketnoi.php");

class MBan {
    public function SelectAllBan() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
    
        if ($con) {
            // Lấy tất cả các bàn từ tất cả cửa hàng
            $str = "SELECT * FROM ban JOIN cuahang ON ban.MaCuaHang = cuahang.MaCuaHang";
            $result = $con->query($str);
            $p->dongKetNoi($con);
    
            if ($result->num_rows > 0) {
                $bans = [];
                while ($row = $result->fetch_assoc()) {
                    $bans[] = $row;
                }
                return $bans;
            } else {
                echo "Không có bàn nào được tìm thấy.";
                return false;
            }
        } else {
            return false;
        }
    }
    public function SelectMaBan($maCuaHang) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
    
        if ($con) {
            $str = "SELECT *
                    FROM ban
                    JOIN cuahang ON ban.MaCuaHang = cuahang.MaCuaHang
                    WHERE ban.MaCuaHang = ?";
            $stmt = $con->prepare($str);
            $stmt->bind_param("i", $maCuaHang);
            $stmt->execute();
            $result = $stmt->get_result();
            $p->dongKetNoi($con);
    
            // Kiểm tra số dòng trả về
            if ($result->num_rows > 0) {
              
                // Trả về tất cả các bàn
                $bans = [];
                while ($row = $result->fetch_assoc()) {
                    $bans[] = $row;
                }
                return $bans;
            } else {
                echo "Không có bàn nào được tìm thấy.";
                return false;
            }
        } else {
            return false; // Không thể kết nối đến CSDL
        }
    }
    
    
    
    public function sua($sql) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
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
    public function them($sql) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            if ($con->query($sql) === TRUE) {
                // Đóng kết nối sau khi thực hiện truy vấn thành công
                $p->dongKetNoi($con);
                return true;
            } else {
                // Đóng kết nối sau khi truy vấn không thành công
                $p->dongKetNoi($con);
                return false;
            }
        } else {
            return false;
        }
    }
    public function SelectAllSPbyName($ban){
        $p= new clsKetNoi();
        $con= $p->moKetNoi();
        if($con){
            $str = "select * from ban where Tinhtrang like N'%$ban%'";
            $tblSP= $con->query($str);
            $p->dongKetNoi($con);
            return $tblSP;
        }
        else{
            return false; // không thể kết nối đến csdl
        }
    }
    public function SelectBanByCuaHang($id) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
    
        if ($con) {
            $str = "SELECT *
                    FROM ban
                    JOIN cuahang ON ban.MaCuaHang = cuahang.MaCuaHang
                    WHERE ban.MaCuaHang = ?"; // JOIN to combine data
    
            $stmt = $con->prepare($str);
            if ($stmt === false) {
                // Handle prepare statement error
                return false;
            }
    
            // Bind parameters securely
            $stmt->bind_param("i", $id); // 'i' is for integer type
            $stmt->execute();
    
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // If records are found, return the result
                return $result;
            } else {
                // No records found, return an empty result
                return null;
            }
            
            // Close the connection
            $stmt->close();
            $p->dongKetNoi($con);
        } else {
            // If connection failed, return false
            return false;
        }
    }
    
   
}
?>