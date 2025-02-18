<?php
include_once("model/mBan.php");

class CBan {
    public function getAllBan() {
        $p = new MBan();
        // Lấy dữ liệu bàn từ SelectAllBan()
        $tblSP = $p->SelectAllBan();
        
        // Kiểm tra nếu không có bàn nào
        if (empty($tblSP)) {
            return false;  // Trả về false nếu mảng rỗng (không có bàn nào)
        } else {
            return $tblSP;  // Trả về mảng bàn
        }
    }
    public function getMaBan($id) {
        $p = new MBan();
        $tblBan = $p->SelectMaBan($id);

        if ($tblBan && count($tblBan) > 0){
            return $tblBan; // Trả về mảng món ăn
        } else {
            return null; // Không có món ăn với id đó
        }
    }
    public function getSua($sql){
        $p = new MCuaHang();
        // Xử lý SQL injection tại đây
     
        $result= $p->sua($sql);
        if (!$result) {
            return -1;  // Lỗi khi cập nhật
        } else {
            return 1;  // Thành công
        }
    }

    public function getThem($sql){
        $p = new MCuaHang();
        // Xử lý SQL injection tại đây
     
        $result= $p->them($sql);
        if (!$result) {
            return -1;  // Lỗi khi cập nhật
        } else {
            return 1;  // Thành công
        }
    }
    public function getAllSPbyName($sp){
        $p = new MBan();
        // Xử lý SQL injection tại đây
     
        $tblSP= $p->SelectAllSPbyName($sp);
        if(!$tblSP){
            return -1;
        }else{
            if($tblSP->num_rows>0){
                return $tblSP;
            }else{
                return 0;// không có dòng dữ liệu
            }
        }
    }
    public function getAllBanByCuaHang($id){
        $p = new MBan();
        // Xử lý SQL injection tại đây
     
        $tblSP= $p->SelectBanByCuaHang($id);
        if(!$tblSP){
            return -1;
        }else{
            if($tblSP->num_rows>0){
                return $tblSP;
            }else{
                return 0;// không có dòng dữ liệu
            }
        }
    }
    
}
?>
