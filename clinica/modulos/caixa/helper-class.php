<?php 
	
	class Helper{
		
		function brPraSql($data){
			if(!empty($data)){
				$data = explode('/', $data);
				if(checkdate($data['1'], $data['0'], $data['2'])){
					$data = $data['2']."-".$data['1']."-".$data['0'];
					return $data;
				}else{
					return false;
				}
			}
		}	

		function sqlPraBr($data){
			if(!empty($data)){
				$data = explode('-', $data);
				$data = $data['2']."/".$data['1']."/".$data['0'];
				return $data;
			}
		}	

	}

?>