
<?php
include_once("model/mChucVu.php");

class CChucVu {
    public function getAllChucVu() {
        $p = new MChucVu();
        $tblCV = $p->SelectAllChucVu();
        
        if (!$tblCV) {
            return -1; 
        } else {
            if ($tblCV->num_rows > 0) {
                return $tblCV; 
            } else { 
                return 0; 
            }
        }
    }

    // Lấy món ăn theo mã
    public function getMaChucVu($id) {
        $p = new MChucVu();
        $tblChucVu = $p->SelectMaChucVu($id);

        if ($tblChucVu) {
            return $tblChucVu; // Trả về mảng món ăn
        } else {
            return null; // Không có món ăn với id đó
        }
    }

    
    
    

    
    
 
    
}
?>
