<?php
include_once("model/mLoaiMonAn.php");

class CLoaiMonAn {
    public function getAllLoaiMonAn() {
        $p = new MLoaiMonAn();
        $tblSP = $p->SelectAllLoaiMonAn();
        
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



    public function getAllLMA() {
        $p = new MLoaiMonAn();
        $tblSP = $p->SelectAllLMA();
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
    public function getLoaiMonAnById($maloai) {
        $p = new MLoaiMonAn();
        return $p->getLoaiMonAnById($maloai);
    }

    public function updateLoaiMonAn($maloai, $tenLoai, $tinhTrang) {
        $p = new MLoaiMonAn();
        return $p->updateLoaiMonAn($maloai, $tenLoai, $tinhTrang);
    }

    // Hàm thêm loại món ăn
    public function addLoaiMonAn($tenLoai, $tinhTrang) {
        $mLoaiMonAn = new MLoaiMonAn();
        return $mLoaiMonAn->addLoaiMonAn($tenLoai, $tinhTrang);
    }
    // Phương thức xóa loại món ăn
    public function deleteLoaiMonAn($id) {
        $mLoaiMonAn = new MLoaiMonAn();
        return $mLoaiMonAn->deleteLoaiMonAn($id);
    }
    public function searchLoaiMonAn($searchTerm) {
        $mLoaiMonAn = new MLoaiMonAn();
        return $mLoaiMonAn->searchLoaiMonAn($searchTerm);  // Trả về kết quả tìm kiếm từ model
    }
}
    

?>
