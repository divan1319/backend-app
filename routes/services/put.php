<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST,PUT");
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once "controllers/put.controller.php";

	$table = $routesArray[2];
	$id = $routesArray[3];
	
	if(!empty($id)){

		$data = array();

		parse_str(file_get_contents('php://input'), $data);

		$columns = array();

		foreach (array_keys($data) as $key => $value) {
			array_push($columns,$value);
		}

		$response = new PutController();
		$response-> putData($table,$data,$id);

	}else{
		$json = array(
				'status' => 404,
				'result' => 'some fields are empty',
			);
		echo json_encode($json,http_response_code($json['status']));
	}
	