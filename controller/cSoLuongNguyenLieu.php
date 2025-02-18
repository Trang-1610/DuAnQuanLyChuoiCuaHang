<?php
include_once("model/mSoLuongNguyenLieu.php");

class CSoLuongNL {
    // Lấy tất cả số lượng nguyên liệu
    public function getAllSLNguyenLieu() {
        $p = new MSoLuongNL();
        $tblSP = $p->SelectALLSoLuongNL();
        
        if (!$tblSP) {
            return -1; // Lỗi kết nối CSDL
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP; // Trả về danh sách dữ liệu
            } else {
                return 0; // Không có dữ liệu
            }
        }
    }

    // Lấy thông tin nguyên liệu theo mã món ăn
    public function getByMaMonAn($maMonAn) {
        $p = new MSoLuongNL();
        $result = $p->SelectByMaMonAn($maMonAn);
        
        if ($result === false) {
            return -1; // Lỗi kết nối hoặc thực thi
        } elseif ($result === null) {
            return 0; // Không có dữ liệu
        } else {
            return $result; // Trả về kết quả
        }
    }
}
?>
