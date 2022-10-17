<?php
	
	//echo '<pre>';print_r($_SERVER['REQUEST_URI']);echo '</pre>';
	$routesArray = explode("/", $_SERVER['REQUEST_URI']);
	$routesArray = array_filter($routesArray);
	
// CUANDO NO SE HACE UNA PETICION
	if(count($routesArray) == 1){
	$json = array(
		'status' => 404,
		'result' => 'Not found',
	);

	echo json_encode($json,http_response_code($json['status']));

	return;
	}
// CUANDO SE HACE UNA PETICION

	if(count($routesArray) >= 2 && isset($_SERVER['REQUEST_METHOD'])){
		
		// PETICIONES GET
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			include "services/get.php";
		}
		// PETICIONES POST
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include "services/post.php";
		}
		// PETICIONES PUT
		if($_SERVER['REQUEST_METHOD'] == 'PUT'){
			include "services/put.php";
		}
		// PETICIONES DELETE
		if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
			$json = array(
				'status' => 200,
				'result' => 'Solicitud DELETE',
			);

			echo json_encode($json,http_response_code($json['status']));
		}
	}
