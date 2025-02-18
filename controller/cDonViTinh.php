<?php
include_once("model/mDonViTinh.php");
class cdonvitinh{
    public function getalldvt(){
        $p = new mdonvitinh();
        $table=$p->selectalldvt();
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function get1donvitinh($madvt){
        $p = new mdonvitinh();
        $table=$p->select1donvitinh($madvt);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
   
}


?>
