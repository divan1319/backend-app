<?php

class Connection{

	/**INFORMACION DE LA BASE DE DATOS**/
	static public function infoDatabase(){

		$infoDB = array(
			"database" => "app_movil",
			"user" => "root",
			"pass" => ""
		);

		return $infoDB;
	}

	static public function connect(){
		try {
			$link = new PDO("mysql:host=localhost;dbname=".Connection::infoDatabase()["database"],
				Connection::infoDatabase()["user"],
				Connection::infoDatabase()["pass"]
		);
			$link->exec("set names utf8");
		} catch (Exception $e) {
			die("ERROR: ".$e->getMessage());
		}

		return $link;
	}
}