<?php
require_once "headers/header.php";
require_once "database/filter.php";

$con = new Filtros();
$marca =$_POST['marca'];
$modelo =$_POST['modelo'];
$year =$_POST['year'];
$estado =$_POST['estado'];
$id = $_POST['id'];
if(!empty($marca) && !empty($modelo) && !empty($year) && !empty($estado)){
	$filter = $con->getDataVehicleMarca($id,$marca,$modelo,$year,$estado);
}else if($_GET['search']){
	$filter = $con->getDataVehicleBusqueda($id,$_GET['search']);
}else{
	echo json_encode(array('error' => 'Revisa bien los datos ingresados'));
}