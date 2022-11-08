<?php
	
	require_once "models/get.model.php";
	
	class GetController
	{
		/*========================================================
	    RETORNANDO TODOS LOS DATOS DE LA TABLA
	    ==========================================================*/
		static public function getData($table){
			$response = GetModel::getData($table);
			$return = new GetController();
			$return -> fncResponse($response);
		}
		/*========================================================
	    RETORNANDO TODOS LOS DATOS DE LA TABLA VEHICULOS
	    ==========================================================*/
		static public function getDataVehicle($id){
			$response = GetModel::getDataVehicle($id);
			$return = new GetController();
			$return -> fncResponse($response);
		}
				/*========================================================
	    RETORNANDO VEHICULO SEGUN USUARIO
	    ==========================================================*/
		static public function getDataMyVehicle($id){
			$response = GetModel::getDataMyVehicle($id);
			$return = new GetController();
			$return -> fncResponse($response);
		}
		/*========================================================
	    RETORNANDO DATOS POR ID
	    ==========================================================*/
		
		static public function getDataId($table,$id){
			$response = GetModel::getDataId($table,$id);
			$return = new GetController();
			$return -> fncResponse($response);
		}
		/*========================================================
	    RETORNANDO DATOS POR COLUMNA
	    ==========================================================*/
		
		static public function getDataColumn($table,$param,$id){
			$response = GetModel::getDataColumn($table,$param,$id);
			$return = new GetController();
			$return -> fncResponse($response);
		}	
	    
	    /*========================================================
	    RESPUESTA DEL CONTROLADOR
	    ==========================================================*/
	    public function fncResponse($response){
	    	
	    	if (!empty($response)) {
	    		$json = array(
					'status' => 200,
					'total' => count($response),
					'results' => $response
			);
	    	}else{
	    		$json = array(
					'status' => 404,
					'result' => 'No results'
			);
	    	}
			echo json_encode($json,http_response_code($json['status']));

	    }
	}
	