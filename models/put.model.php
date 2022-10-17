<?php
	
	require_once "connection.php";

	class PutModel{

		static public function putData($table,$data,$id){

			$set = "";

			foreach ($data as $key => $value) {
			    $set .= $key." = :".$key.",";
			}

			$set = substr($set,0,-1);

			echo '<pre>'; print_r($data);echo'</pre>';
			return;
			$sql = "UPDATE $table SET $set WHERE id = $id";

			$link = Connection::connect();
			$stmt = $link->prepare($sql);

			if($stmt -> execute()){
				$res = array(
					"message" => "updated successfully"
				);
				return $res;
			}else{
				$error = array(
					"error" => "a error ocurred"
				);
				return $error;
			}
//print_r($set);
		}
	}