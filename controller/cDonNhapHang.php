<?php
include_once("model/mDonNhapHang.php");
class cdonnhaphang{
    public function getalldonnhaphang(){
        $p = new mdonnhaphang();
        $table=$p->selectalldonnhaphang();
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function getalldonnhaphang2(){
        $p = new mdonnhaphang();
        $table=$p->selectalldonnhaphang2();
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function getalldonnhaphangtheoch($mach){
        $p = new mdonnhaphang();
        $table=$p->selectalldonnhaphangtheoch($mach);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function getalldonnhaphang2theoch($mach){
        $p = new mdonnhaphang();
        $table=$p->selectalldonnhaphang2theoch($mach);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    public function get1donnhaphang($madnh){
        $p = new mdonnhaphang();
        $table=$p->select1donnhaphang($madnh);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
    
    public function getchitietdonnhaphang($madnh){
        $p = new mdonnhaphang();
        $table=$p->selectchitietdonnhaphang($madnh);
        if($table->num_rows>0){
           return $table;
            
        }else{
            return false;
        }
    }
   
}


?>
