<?php 
	class Conexion {

		protected $conex;
		private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "app_movil";

        public function __construct(){
        	$this->conex = new mysqli ($this->server, $this->user, $this->password,$this->db);
        }
	}