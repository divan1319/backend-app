<?php

require_once "headers/header.php";
require_once "database/auth.php";

$con = new Auth();

$tipo = $_POST['tipo'];
$modelo = $_POST['modelo'];
$year = $_POST['anio'];
$state = $_POST['estado_vehiculo'];
$desc = $_POST['descripcion'];
$price = $_POST['precio'];
$service = $_POST['isRented'];
$usuario = $_POST['usuario'];
$img1 = $_POST['foto1'];
$img2 = $_POST['foto2'];
$img3 = $_POST['foto3'];


	/*$imgComp1 = 'http://192.168.0.9/backend-app/images/photos/'.$_FILES['foto1']['name'];
	$imgComp2 = 'http://192.168.0.9/backend-app/images/photos/'.$_FILES['foto2']['name'];
	$imgComp3 = 'http://192.168.0.9/backend-app/images/photos/'.$_FILES['foto3']['name'];**/
	$vehicles = $con->AddVehicle($tipo,$modelo,$year,$state,$desc,$price,$service,$usuario,$img1,$img2,$img3);



