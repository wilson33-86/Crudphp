<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS', '');
define('DB_NAME','prueba');

class conection{

	public $host=DB_HOST;
	public $user=DB_USER;
	public $pass=DB_PASS;
	public $db=DB_NAME;
	public $con;
	public $error;

	public function connect(){

		$this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);

		if (!$this->con) {
			$this->error = "Error de conexion".$this->con->connect_error();

			return false;
		}
	}
}
?>