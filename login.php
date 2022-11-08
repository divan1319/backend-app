<?php

include_once "headers/headers.php";

require_once "database/auth.php";

$data = json_decode(file_get_contents("php://input"));

$con = new Auth();
$email= $data->email;
$pass = $data->password;



if($email == "" && $pass == ""){
	echo json_encode(array('error' => 'No pueden ir vacios'));
}else{
	$verify = $con->login($email,$pass);
	}

	