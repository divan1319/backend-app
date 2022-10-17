<?php

require_once "connection.php";

class PostModel
{
	static public function postData($table,$data){

		$columns = "";
		$params="";
		foreach ($data as $key => $value) {
			$columns.= $key.",";
			$params.= ":".$key.",";
		}
		$columns = substr($columns,0,-1);
		$params = substr($params,0,-1);
		
		$sql = "INSERT INTO $table ($columns) VALUES ($params)";
		$stmt = Connection::connect()->prepare($sql);

		foreach ($data as $key => $value) {
		    $stmt->bindParam(":".$key,$data[$key], PDO::PARAM_STR);
		}

		if($stmt -> execute()){
			$res = array(
				"message" => "inserted successfully"
			);
			return $res;
		}else{
			$error = array(
				"error" => "a error ocurred"
			);
			return $error;
		}
	}
    
}
