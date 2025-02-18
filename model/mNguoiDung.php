<?php
include_once("ketnoi.php");

class MNguoiDung {
    public function SelectAllND() {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {
            $str = "SELECT * FROM taikhoan";
            $tblSP = $con->query($str);
            $p->dongKetNoi($con);
            return $tblSP;
        } else {
            return false; 
        }
    } 

    public function dangnhap($tenTK, $password) {
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        
        if ($con) {

            $stmt = $con->prepare("SELECT tk.id, tk.MaNV, tk.MaChucVu, nv.HoTen, nv.TrangThai, ch.MaCuaHang
                    FROM nhanvien AS nv
                    INNER JOIN TaiKhoan AS tk ON nv.MaNV = tk.MaNV
                    INNER JOIN cuahang as ch on ch.MaCuaHang= nv.MaCuaHang
                    
                    WHERE tk.MaNV = ? AND tk.MatKhau = ?");
            $stmt->bind_param("ss", $tenTK, $password);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Kiểm tra trạng thái nhân viên
                if ($row['TrangThai'] == 0) {
                    // Nhân viên nghỉ việc
                    return "inactive";
                }
                
                $_SESSION["dangnhap"] = [
                    "id" => $row["id"],
                    "MaNV" => $row["MaNV"],
                    "MaChucVu" => $row["MaChucVu"] ,
                    "HoTen" => $row["HoTen"],
                    "MaCuaHang" => $row["MaCuaHang"]
                ];
                return $_SESSION["dangnhap"];
            } else {
                return 0; 
            }
    
            $stmt->close();
            $p->dongKetNoi($con);
        } else {
            return false; 
        }
    }
    
    
}
?>
