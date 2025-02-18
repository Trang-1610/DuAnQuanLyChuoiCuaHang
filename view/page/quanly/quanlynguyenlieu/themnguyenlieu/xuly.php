<?php
	class clsUpload{
		public function Upload($file){
			
			if(!$this->checkType($file["type"]))
				return -2;
			
			
		}
		
		
		
		public function checkType($type){
			$arrType = array("application/vnd.openxmlformats-officedocument.wordprocessingml.document");
			if(in_array($type, $arrType)){
				return true;
			}else{
				return false;
			}
		}
		
	}
?>