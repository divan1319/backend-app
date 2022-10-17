<?php

require_once "headers/headers.php";
require_once "database/auth.php";

$data = json_decode(file_get_contents("php://input"));

$con = new Auth();

$nombre = $data->nombre;
$pass = $data->contrasena;
$correo = $data->correo;
$dui = $data->dui;
$telefono = $data->telefono;

$pass_encryp = password_hash($pass,PASSWORD_DEFAULT);



$verify = $con->Registro($nombre,$pass_encryp,$correo,$dui,$telefono);
