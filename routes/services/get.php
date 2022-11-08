<?php

require_once "controllers/get.controller.php";
$response = new GetController();
$table = $routesArray[2];
if($table == "myvehiculos" && !empty($routesArray[3])){
	
	$id = $routesArray[3];
	$response -> getDataMyVehicle($id);

}else if($table == "vehiculos" && !empty($routesArray[3])){
		$id = $routesArray[3];
		$response -> getDataVehicle($id);

}else if(empty($routesArray[3]) && empty($routesArray[4])){

	$response -> getData($table);
}else if(!empty($routesArray[3]) && empty($routesArray[4])){
		$id = $routesArray[3];
	$response -> getDataId($table,$id);

}else if(!empty($routesArray[3]) && !empty($routesArray[4])){
	$id = $routesArray[4];
	$param = $routesArray[3];
	$response -> getDataColumn($table,$param,$id);
}




