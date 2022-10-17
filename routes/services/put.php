<?php
	require_once "controllers/put.controller.php";

	$table = $routesArray[2];
	$id = $routesArray[3];

	if(empty($id)){
		$json = array(
				'status' => 500,
				'result' => 'id is no declared',
			);
	echo json_encode($json,http_response_code($json['status']));
	}else{
		$data = array();

		parse_str(file_get_contents('php://input'), $data);

		if(empty($data)){
			$json = array(
				'status' => 500,
				'result' => 'you are sending some empty information',
			);
			echo json_encode($json,http_response_code($json['status']));
		}else{

		$columns = array();

		foreach (array_keys($data) as $key => $value) {
			array_push($columns,$value);
		}
		
		
		$response = new PutController();
		$response-> putData($table,$data,$id);
		}
	}
	
/**$json = array(
				'status' => 200,
				'result' => 'Solicitud PUT',
			);

	echo json_encode($json,http_response_code($json['status']));
**/