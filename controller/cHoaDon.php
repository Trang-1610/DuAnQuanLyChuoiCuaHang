<?php
include_once("model/mHoaDon.php");
class CHoaDon {
    public function getAllDonHang() {
        $p = new MHoaDon();
        $tblDH = $p->SelectAllHoaDon();
        if (!$tblDH) {
            return -1; 
        } else
            if ($tblDH->num_rows > 0) {
                return $tblDH; 
            } else { 
                return 0; 
            }
        }
    }    
?>
