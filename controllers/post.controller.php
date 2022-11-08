<?php

/**
 * 
 */

require_once "models/post.model.php";

class PostController
{
	/*============REGISTRO A UNA TABLA==========*/

	static public function postData($table,$data){
		$response = PostModel::postData($table,$data);
		$return = new PostController();
		$return -> fncResponse($response);
	}
	/*============REGISTRO A TABLA USUARIOS==========*/

	static public function postRegister($table,$data){
		if(isset($data["contrasena"]) != null){
			$passEncryp = password_hash($data["contrasena"],PASSWORD_DEFAULT);
			$data["contrasena"] = $passEncryp;
			$response = PostModel::postData($table,$data);
			$return = new PostController();
			$return -> fncResponse($response);
		}

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