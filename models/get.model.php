<?php

require_once "connection.php";

class GetModel{

	/****************************** retornando toda la tabla ***************************/
	static public function getData($table){

		$sql = "SELECT * FROM $table";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
	}

		/****************************** retornando un dato en especifico ***************************/
	static public function getDataId($table,$id){

		$sql = "SELECT * FROM $table WHERE id = $id";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
	}

	static public function getDataColumn($tabla,$param,$id){
		$sql = "SELECT * FROM $tabla WHERE $param = $id";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	}

		/****************************** retornando toda la tabla ***************************/
	static public function getDataVehicle(){

		$sql = " SELECT v.foto1 as 'photo',v.año_vehiculo as 'year', md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio'  FROM vehiculos v INNER JOIN modelo md ON v.modelo = md.id INNER JOIN marca mc ON md.marca = mc.id INNER JOIN tipo_venta tv ON v.is_rented = tv.id";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
	}

}