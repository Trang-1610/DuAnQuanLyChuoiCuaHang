<?php
include_once("model/mloainguyenlieu.php");
class cloainguyenlieu{
    public function getallloainguyenlieu(){
        $p = new mloainguyenlieu();
        $table=$p->selectallloainguyenlieu();
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function get1loainguyenlieu($math){
        $p = new mloainguyenlieu();
        $table=$p->select1loainguyenlieu($math);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function updateloainguyenlieu($math,$tenth){
        $p = new mloainguyenlieu();
        return $p->updateloai($math,$tenth);
        
    }
    public function insertloainguyenlieu($tenth){
        $p =  new mloainguyenlieu();
        $result = $p->inserttype($tenth);
        if($result == 1){
            return true;
        }else{
            return false;
        }
    }
    
}


?>
