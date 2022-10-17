<?php 
	
	/**
	MOSTRANDO ERRORES 
	 **/
	ini_set('display_error', 1);
	ini_set('log_error',1);
	ini_set('error_log','/opt/lampp/htdocs/backend-app/php_error_log');

	require_once "models/connection.php";
	require_once "controllers/routes.controller.php";


	$index = new RoutesController();
	$index -> index();
?>