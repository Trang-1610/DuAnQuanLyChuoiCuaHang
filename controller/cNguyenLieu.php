<?php
include_once("model/mNguyenLieu.php");
// include_once("upload.php");
class cnguyenlieu{
    public function getallnguyenlieu(){
        $p = new mnguyenlieu();
        $table=$p->selectallnguyenlieu();
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
}
public function getallnguyenlieujoinloainguyenlieu(){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieujoinloainguyenlieu();
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function getallnguyenlieujoinloainguyenlieutheoch($mach){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieujoinloainguyenlieutheoch($mach);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function getallnguyenlieubytype($th){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieubytype($th);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function getallnguyenlieubych($th){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieubych($th);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}

public function getallnguyenlieubyname($name){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieubyname($name);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function getallnguyenlieubytypetheoch($th,$ch){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieubytypetheoch($th,$ch);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}

public function getallnguyenlieubynametheoch($name,$ch){
    $p = new mnguyenlieu();
    $table=$p->selectallnguyenlieubynametheoch($name,$ch);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function get1nguyenlieu($masp,$mach){
    $p = new mnguyenlieu();
    $table=$p->select1nguyenlieu($masp,$mach);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function get1nguyenlieuql($masp){
    $p = new mnguyenlieu();
    $table=$p->select1nguyenlieuql($masp);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}

public function xoanguyenlieu($idsp)
{
    $p = new mnguyenlieu();
    $result = $p->deletenguyenlieu($idsp);
    if ($result == 1) {
        return true;
    } else {
        return false;
    }
}

public function insertnguyenlieu($Tennguyenlieu, $Gia, $GiamGia,  $SoLuong, $Loai)
{
    $p = new mnguyenlieu();
    $result = $p->insertnguyenlieu($Tennguyenlieu, $Gia, $GiamGia,  $SoLuong, $Loai);
    if ($p->insertnl($result)) {
        return true;
    } else {
        return false;
    }
}

public function updatenguyenlieu($MaNguyenLieu,$TenNguyenLieu, $HinhAnh, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh)
{
    $p = new mnguyenlieu();
    if(strlen($HinhAnh) === 0){
        $result = $p->updatenguyenlieu($MaNguyenLieu,$TenNguyenLieu, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh);

    }else{

        $result = $p->updatenguyenlieuha($MaNguyenLieu,$TenNguyenLieu, $HinhAnh, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh);
    }
    if ($result == 1) {
        return $result;
    } else {
        return false;
    }
}

public function ulnl($sl){
    $p = new mnguyenlieu();
    $table=$p->uocluongnguyenlieu($sl);
    if($table->num_rows>0){
       return $table;
        
    }else{
        return false;
    }
}
public function resetnguyenlieutuoi()
{
    $p = new mnguyenlieu();
    $result = $p->resetnguyenlieu();
    if ($result == 1) {
        return true;
    } else {
        return false;
    }
}
public function resetnguyenlieutuoitheoch($ch)
{
    $p = new mnguyenlieu();
    $result = $p->resetnguyenlieutheoch($ch);
    if ($result == 1) {
        return true;
    } else {
        return false;
    }
}
//TRANG

public function getThem($sql){
    $p = new MNguyenLieu();
    // Xử lý SQL injection tại đây
 
    $result= $p->them($sql);
    if (!$result) {
        return -1;  // Lỗi khi cập nhật
    } else {
        return 1;  // Thành công
    }
}
public function getSua($sql){
    $p = new MNguyenLieu();
    // Xử lý SQL injection tại đây
 
    $result= $p->sua($sql);
    if (!$result) {
        return -1;  // Lỗi khi cập nhật
    } else {
        return 1;  // Thành công
    }
}

}


?>

