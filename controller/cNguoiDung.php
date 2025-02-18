<?php
include_once("model/mNguoiDung.php");

class CNguoiDung {
    public function getAllND() {
        $p = new MNguoiDung();
        $tblSP = $p->SelectAllND();
        
        if (!$tblSP) {
            return -1; 
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP; 
            } else { 
                return 0; 
            }
        }
    }

    public function dangnhaptaikhoan($username, $password) {
        $password = md5($password); // Mã hóa mật khẩu
        $p = new MNguoiDung();
       
        $result = $p->dangnhap($username, $password);
        if ($result === "inactive") {
            // Tài khoản không hoạt động
            echo "<p style='color:red;'>Tài khoản của bạn đã bị khóa hoặc bạn đã nghỉ việc.</p>";
            return false;
        } elseif ($result) {
            // Đăng nhập thành công
            $_SESSION["dangnhap"] = $result;
            header("Location: index.php?page=quanly");
            exit();
        } else {
            // Sai thông tin đăng nhập
            echo "<p style='color:red;'>Tên tài khoản hoặc mật khẩu không đúng.</p>";
            return false;
        }
    }
}
?>
