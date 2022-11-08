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
	static public function getDataVehicle($id){

		$sql = "SELECT v.id as 'idPublication',v.usuario as 'idvendedor',tp.tipo,cl.clase,v.año_vehiculo as 'year',es.estado,md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',v.descripcion as 'desc',us.nombre as 'usuario',us.correo as 'correo',us.telefono as 'cel',v.foto1 as 'photo',v.foto2 as 'photo2',v.foto3 as 'photo3'  FROM vehiculos v
			INNER JOIN modelo md ON v.modelo = md.id
			INNER JOIN marca mc ON md.marca = mc.id
			INNER JOIN tipo_venta tv ON v.is_rented = tv.id
			INNER JOIN usuarios us ON v.usuario = us.id
			INNER JOIN tipo tp ON v.tipo = tp.id
			INNER JOIN clase cl ON tp.clase = cl.id
			INNER JOIN estado es ON v.estado_vehiculo = es.id
			WHERE v.usuario <> $id AND v.is_rented != 2 AND v.is_rented != 4";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
	}

		static public function getDataMyVehicle($id){

		$sql = "SELECT v.id as 'idPublication',cl.id as 'idclase',v.tipo as 'idtipo',mc.id as 'idmarca',md.id as 'idmodelo',v.estado_vehiculo as 'idestado',v.is_rented as 'idservicio',v.foto1 as 'photo1',v.foto2 as 'photo2',v.foto3 as 'photo3',v.año_vehiculo as 'year', v.descripcion as 'desc',md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',es.estado as 'estado' FROM vehiculos v INNER JOIN modelo md ON v.modelo = md.id INNER JOIN marca mc ON md.marca = mc.id INNER JOIN tipo_venta tv ON v.is_rented = tv.id
INNER JOIN tipo tp ON v.tipo = tp.id
INNER JOIN clase cl ON tp.clase = cl.id
INNER JOIN estado es ON v.estado_vehiculo = es.id
WHERE v.usuario = $id";

		$stmt = Connection::connect()->prepare($sql);

		$stmt->execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
	}

}