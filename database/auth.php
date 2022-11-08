<?php
	
	require_once 'conexion.php';
		class Auth extends Conexion{
			protected $conex;

		public function __construct(){
			parent::__construct();
		}

	    public function login($email,$pass){
        $login =  $this->conex->query( "SELECT id,foto,nombre,correo,dui,telefono,contrasena FROM usuarios WHERE correo = '$email'");
        $check = $login->num_rows;

        if($check != 0){
        	$datos = mysqli_fetch_array($login);
        	if(password_verify($pass, $datos['contrasena'])){
        		
        		echo json_encode(array('user' => $datos));
        		
        	}else{
        		echo json_encode(array('error' => 'Contraseña Inválida'));
        	}
        }else{
            echo json_encode(array('error' => 'Revisa tus credenciales'));
        }
    }


    public function Registro($photo,$name,$pass,$correo,$dui,$telefono){
    	$registro = $this->conex->query(" INSERT INTO `usuarios`(`foto`,`nombre`, `contrasena`, `correo`, `dui`, `telefono`) VALUES ('$photo','$name','$pass','$correo','$dui','$telefono')");
    	if($registro == 1){
			echo json_encode(array('error' => false));
    	}else{
    		echo json_encode(array('error' => true));
    	}
    }
    public function UpdateUser($name,$pass,$correo,$dui,$telefono,$id){
        if(empty($pass)){
            $update = $this->conex->query(" UPDATE `usuarios` SET `nombre` ='$name', `correo` = '$correo', `dui` = '$dui', `telefono` = '$telefono' WHERE id = $id");
            if($update == 1){
                echo json_encode(array('error' => false));
            }else{
                echo json_encode(array('error' => true));
            }
        }else{
            $update = $this->conex->query(" UPDATE `usuarios` SET `nombre` ='$name',`contrasena` ='$pass' ,`correo` = '$correo', `dui` = '$dui', `telefono` = '$telefono' WHERE id = $id");
                if($update == 1){
                    echo json_encode(array('error' => false));
                }else{
                    echo json_encode(array('error' => true));
                }
        }

    }

    public function AddVehicle($tipo,$modelo,$year,$state,$desc,$price,$service,$usuario,$img1,$img2,$img3)
    {
        $add = $this->conex->query("INSERT INTO `vehiculos`(`tipo`, `modelo`, `año_vehiculo`, `estado_vehiculo`, `descripcion`, `precio`, `is_rented`,`usuario`, `foto1`, `foto2`, `foto3`) VALUES ($tipo,$modelo,$year,$state,'$desc',$price,$service,$usuario,'$img1','$img2','$img3') ");
         if($add == 1){
			echo json_encode(array('error' => false));
    	}else{
    		echo json_encode(array('error' => true));
    	}
    }

        public function UpdateVehicle($tipo,$modelo,$year,$state,$desc,$price,$service,$usuario,$img1,$img2,$img3,$id)
    {
            $add = $this->conex->query("UPDATE  `vehiculos` SET `tipo` = $tipo, `modelo` = $modelo, `año_vehiculo` = $year, `estado_vehiculo` = $state, `descripcion` = '$desc', `precio` = $price, `is_rented` = $service , `foto1`='$img1',`foto2`='$img2',`foto3`='$img3' WHERE `id`= $id");
                    if($add == 1){
                        echo json_encode(array('error' => false));
                    }else{
                        echo json_encode(array('error' => true));
                    }
        
    }

    public function GetChats($id){
        $chat = $this->conex->query("SELECT c.user_sender,c.user_receiver,us.foto as 'foto',us.nombre AS 'userSender', ur.nombre as 'userRece',COUNT(mensaje) AS 'mensajes' FROM chat c LEFT JOIN usuarios us ON c.user_sender= us.id LEFT JOIN usuarios ur ON c.user_receiver = ur.id WHERE user_receiver = $id GROUP BY us.nombre");
        /*VERIFICANDO SI TIENE CONVERSACIONES*/
       if($chat->num_rows >= 1){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $chat->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'chats' => $data

        ));
        }else{
            echo json_encode(array('error' => 'No tienes ningún mensaje'));
        }
        
    }

    public function TotalMsg($id){
        $total = $this->conex->query("SELECT COUNT(mensaje) as 'total' FROM chat WHERE user_receiver =$id AND estado ='unread'");

       if($total->num_rows >= 1){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $total->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'totalmsg' => $data

        ));
        }else{
            echo json_encode(array('error' => 'No tienes ningún mensaje'));
        }
    }

    public function updState($idReceiver,$idSender){
        $estado = $this->conex->query("UPDATE chat SET estado ='read' WHERE user_sender = $idSender AND user_receiver=$idReceiver");
    }

    public function GetConversation($idReceiver,$idSender){
        $chat = $this->conex->query("SELECT ct.id as 'idconver',ct.hora as FECHA, ct.mensaje AS 'mensajes', usr.nombre AS 'recibidoPor', uss.nombre AS 'EnviadoPor' FROM chat ct INNER JOIN usuarios usr ON ct.user_receiver = usr.id INNER JOIN usuarios uss ON ct.user_sender = uss.id WHERE ct.user_receiver = $idReceiver AND ct.user_sender = $idSender OR ct.user_receiver = $idSender AND ct.user_sender = $idReceiver ORDER BY ct.hora ASC");
        /*ACTUALIZANDO ESTADO DE MENSAJE**/

        /*VERIFICANDO SI TIENE CONVERSACIONES*/
       if($chat->num_rows >= 1){
            //MUESTRA LOS CHATS CON OTROS USUARIOS;
            $data = []; 
            $i = 0;
            while($row = $chat->fetch_assoc()){
                $data[$i] = $row;
                $i++;
          }
          echo json_encode(array(
            'total' => count($data),
            'status' => 200,
            'chats' => $data
        ));
        }else{
            echo json_encode(array('error' => 'No tienes ningún mensaje'));
        }
        
    }

}