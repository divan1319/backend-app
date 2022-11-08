<?php
require_once 'conexion.php';

class Filtros extends Conexion {

	public function __construct(){
			parent::__construct();
		}
	
	public function getDataVehicleMarca($id,$marca,$modelo,$year,$estado){

        $sql = $this->conex->query("SELECT v.id as 'idPublication',v.usuario as 'idvendedor',tp.tipo,cl.clase,v.año_vehiculo as 'year',es.estado,md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',v.descripcion as 'desc',us.nombre as 'usuario',us.correo as 'correo',us.telefono as 'cel',v.foto1 as 'photo',v.foto2 as 'photo2',v.foto3 as 'photo3'  FROM vehiculos v
            INNER JOIN modelo md ON v.modelo = md.id
            INNER JOIN marca mc ON md.marca = mc.id
            INNER JOIN tipo_venta tv ON v.is_rented = tv.id
            INNER JOIN usuarios us ON v.usuario = us.id
            INNER JOIN tipo tp ON v.tipo = tp.id
            INNER JOIN clase cl ON tp.clase = cl.id
            INNER JOIN estado es ON v.estado_vehiculo = es.id
            WHERE v.usuario <> $id AND v.is_rented != 2 AND v.is_rented != 4 AND mc.id = $marca AND md.id =$modelo AND v.año_vehiculo = $year AND v.estado_vehiculo=$estado");
       if($sql->num_rows > 0){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $sql->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'vehicle' => $data
        ));
        }else{
            echo json_encode(array('error' => 'No hay ningun vehiculo con esos filtros'));
        }

    }

    	public function getDataVehicleYear($id,$year){

        $sql = $this->conex->query("SELECT v.id as 'idPublication',v.usuario as 'idvendedor',tp.tipo,cl.clase,v.año_vehiculo as 'year',es.estado,md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',v.descripcion as 'desc',us.nombre as 'usuario',us.correo as 'correo',us.telefono as 'cel',v.foto1 as 'photo',v.foto2 as 'photo2',v.foto3 as 'photo3'  FROM vehiculos v
            INNER JOIN modelo md ON v.modelo = md.id
            INNER JOIN marca mc ON md.marca = mc.id
            INNER JOIN tipo_venta tv ON v.is_rented = tv.id
            INNER JOIN usuarios us ON v.usuario = us.id
            INNER JOIN tipo tp ON v.tipo = tp.id
            INNER JOIN clase cl ON tp.clase = cl.id
            INNER JOIN estado es ON v.estado_vehiculo = es.id
            WHERE v.usuario <> $id AND v.is_rented != 2 AND v.is_rented != 4 AND v.año_vehiculo = $year");
       if($sql->num_rows > 0){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $sql->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'vehicle' => $data
        ));
        }else{
            echo json_encode(array('error' => 'No hay ningun vehiculo con esos filtros'));
        }

    }

        	public function getDataVehicleEstado($id,$estado){

        $sql = $this->conex->query("SELECT v.id as 'idPublication',v.usuario as 'idvendedor',tp.tipo,cl.clase,v.año_vehiculo as 'year',es.estado,md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',v.descripcion as 'desc',us.nombre as 'usuario',us.correo as 'correo',us.telefono as 'cel',v.foto1 as 'photo',v.foto2 as 'photo2',v.foto3 as 'photo3'  FROM vehiculos v
            INNER JOIN modelo md ON v.modelo = md.id
            INNER JOIN marca mc ON md.marca = mc.id
            INNER JOIN tipo_venta tv ON v.is_rented = tv.id
            INNER JOIN usuarios us ON v.usuario = us.id
            INNER JOIN tipo tp ON v.tipo = tp.id
            INNER JOIN clase cl ON tp.clase = cl.id
            INNER JOIN estado es ON v.estado_vehiculo = es.id
            WHERE v.usuario <> $id AND v.is_rented != 2 AND v.is_rented != 4 AND v.estado_vehiculo = $estado");
       if($sql->num_rows > 0){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $sql->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'vehicle' => $data
        ));
        }else{
            echo json_encode(array('error' => 'No hay ningun vehiculo con esos filtros'));
        }

    }

        public function getDataVehicleBusqueda($id,$modelo){
        	
        		$sql = $this->conex->query("SELECT v.id as 'idPublication',v.usuario as 'idvendedor',tp.tipo,cl.clase,v.año_vehiculo as 'year',es.estado,md.modelo as 'modelo',mc.marca as 'marca', tv.tipo_venta as 'servicio',v.precio as 'precio',v.descripcion as 'desc',us.nombre as 'usuario',us.correo as 'correo',us.telefono as 'cel',v.foto1 as 'photo',v.foto2 as 'photo2',v.foto3 as 'photo3'  FROM vehiculos v
            INNER JOIN modelo md ON v.modelo = md.id
            INNER JOIN marca mc ON md.marca = mc.id
            INNER JOIN tipo_venta tv ON v.is_rented = tv.id
            INNER JOIN usuarios us ON v.usuario = us.id
            INNER JOIN tipo tp ON v.tipo = tp.id
            INNER JOIN clase cl ON tp.clase = cl.id
            INNER JOIN estado es ON v.estado_vehiculo = es.id
            WHERE v.usuario <> $id AND v.is_rented != 2 AND v.is_rented != 4 AND md.modelo LIKE '%$modelo%'");
       if($sql->num_rows > 0){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $sql->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'vehicle' => $data
        ));
        }else{
            echo json_encode(array('error' => 'No se encontraron vehiculos'));
        }
        	}
    
}