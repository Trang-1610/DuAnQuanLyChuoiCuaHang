<?php
include_once("model/mCuaHang.php");
class cCuaHang{
    // public function getallcuahang(){
    //     $p = new mcuahang();
    //     $table=$p->selectallcuahang();
    //     if($table->num_rows>0){
    //        return $table;
            
    //     }else{
    //         return false;
    //     }
    // }
    public function get1cuahang($mach){
        $p = new mcuahang();
        $table=$p->select1cuahang($mach);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
   


    public function getAllCuaHang() {
        $p = new MCuaHang();
        $tblSP = $p->SelectAllCuaHang();
        
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
    
    // Lấy món ăn theo mã
    public function getMaCuaHang($id) {
        $p = new MCuaHang();
        $tblCuahang = $p->SelectMaCuaHang($id);

        if ($tblCuahang) {
            return $tblCuahang; // Trả về mảng món ăn
        } else {
            return null; // Không có món ăn với id đó
        }
    }

    
    
    public function getAllSPbyName($sp){
        $p = new MCuaHang();
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
    
 
    
}


?>
