<?php
	require_once("headers/header.php");
	require_once "database/auth.php";
	
	$con = new Auth();

	/*-------------OBTENIENDO PARAMETROS-----------------**/

	$idReceiver = $_POST['id'];

		if($_GET['op']=="getChats"){
			$chat = $con->GetChats($idReceiver);
		}else if($_GET['op'] == "getConver"){
			$idSender = $_POST['idsender'];
			$chat = $con->GetConversation($idReceiver,$idSender);
		}else if($_GET['op'] == "getTotal"){
			$chat = $con->TotalMsg($idReceiver);
		}else if ($_GET['op'] == "updState"){
			$idSender = $_POST['idsender'];
			$chat = $con->updState($idReceiver,$idSender);
		}