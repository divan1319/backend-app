<?php

require_once "controllers/get.controller.php";
$table = $routesArray[2];
if($table == "vehiculos"){
	$response = new GetController();
	$response -> getDataVehicle();

}else if(empty($routesArray[3]) && empty($routesArray[4])){

	$response =  new GetController();
	$response -> getData($table);
}else if(!empty($routesArray[3]) && empty($routesArray[4])){
		$id = $routesArray[3];
	$response = new GetController();
	$response -> getDataId($table,$id);

}else if(!empty($routesArray[3]) && !empty($routesArray[4])){
	$id = $routesArray[4];
	$param = $routesArray[3];
	$response = new GetController();
	$response -> getDataColumn($table,$param,$id);
}




