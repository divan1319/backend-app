<?php
	
	require_once 'conexion.php';
		class Auth extends Conexion{
			protected $conex;

		public function __construct(){
			parent::__construct();
		}

	    public function login($email,$pass){
        $login =  $this->conex->query( "SELECT id,nombre,correo,dui,telefono,contrasena FROM usuarios WHERE correo = '$email'");
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


    public function Registro($name,$pass,$correo,$dui,$telefono){
    	$registro = $this->conex->query(" INSERT INTO `usuarios`(`nombre`, `contrasena`, `correo`, `dui`, `telefono`) VALUES ('$name','$pass','$correo','$dui','$telefono')");
    	if($registro == 1){
			echo json_encode(array('error' => false));
    	}else{
    		echo json_encode(array('error' => true));
    	}
    }

    public function AddVehicle($tipo,$modelo,$year,$state,$desc,$price,$service,$usuario,$img1,$img2,$img3)
    {
        $add = $this->conex->query("INSERT INTO `vehiculos`(`tipo`, `modelo`, `año_vehiculo`, `estado_vehiculo`, `descripción`, `precio`, `is_rented`,`usuario`, `foto1`, `foto2`, `foto3`) VALUES ($tipo,$modelo,$year,$state,'$desc',$price,$service,$usuario,'$img1','$img2','$img3') ");
         if($add == 1){
			echo json_encode(array('error' => false));
    	}else{
    		echo json_encode(array('error' => true));
    	}
    }
}