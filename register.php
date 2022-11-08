<?php

require_once "headers/header.php";
require_once "database/auth.php";

$con = new Auth();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$dui = $_POST['dui'];
$telefono = $_POST['telefono'];


if($_GET['op'] == 'updUser'){
	$id=$_POST['id'];
	$newPass = $_POST['newPass'];
	if(empty($newPass)){
		$verify = $con->UpdateUser($nombre,$newPass,$correo,$dui,$telefono,$id);
	}else{
		$NewPass_encryp = password_hash($newPass,PASSWORD_DEFAULT);	
		$verify = $con->UpdateUser($nombre,$NewPass_encryp,$correo,$dui,$telefono,$id);
	}

}else if($_GET['op'] == 'newUser'){
	$pass = $_POST['contrasena'];
	$pass_encryp = password_hash($pass,PASSWORD_DEFAULT);
	$photo = $_POST['foto'];
	$verify = $con->Registro($photo,$nombre,$pass_encryp,$correo,$dui,$telefono);
}


