<?php

require_once "models/put.model.php";

class PutController{
		/*======================*/

	static public function putData($table,$data,$id){
		$response = PutModel::putData($table,$data,$id);
		
		$return = new PutController();
		$return -> fncResponse($response);
	}
		    /*========================================================
	    RESPUESTA DEL CONTROLADOR
	    ==========================================================*/
	    public function fncResponse($response){
	    	
	    	if (!empty($response)) {
	    		$json = array(
					'status' => 200,
					
					'results' => $response
			);
	    	}else{
	    		$json = array(
					'status' => 404,
					'result' => 'No results'
			);
	    	}
			echo json_encode($json,http_response_code($json['status']));

	    }
}