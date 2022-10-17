<?php

require_once "controllers/post.controller.php";


$table = $routesArray[2];
$columns= array();
if(isset($_POST)){
	foreach (array_keys($_POST) as $key => $value) {
		array_push($columns, $value);
	}
 if(empty($_POST)){
 	$json = array(
		'status' => 404,
		'result' => 'error',
	);

	echo json_encode($json,http_response_code($json['status']));
 }

$response = new PostController();
$response -> postData($table,$_POST);
}
/**
if (empty($_POST)) {
	$json = array(
		'status' => 404,
		'result' => 'error',
	);

	echo json_encode($json,http_response_code($json['status']));
}


**/