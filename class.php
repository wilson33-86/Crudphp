<?php
include'config.php';
session_start();
/**
 * 
 */
class Crud extends conection
{
	
	function __construct()
	{
		$this->connect();
	}
    

  	public function create_user($name,$pass){

		$stmt = $this->con->prepare("insert into users (name,password) values(?,?)") or die($this->con->error);
		$stmt->bind_param("ss",$name,$pass);
		if ($stmt->execute()) {
			$stmt->close();
			$this->con->close();
			$_SESSION['message']="Se ha creado un usuario correctamente";
			$_SESSION['msg']="success";
			return true;
		}
	}

	public function list(){

		$stmt = $this->con->prepare("select * from users order by name asc") or die($this->con->error);
		if ($stmt->execute()) {
			$result = $stmt->get_result();
			$stmt->close();
			$this->con->close();
			return $result;

		}
	}

	public function deleteUser($id){

		$stmt = $this->con->prepare("delete from users where id='$id'") or die($this->con->error);
		if ($stmt->execute()) {
			$stmt->close();
			$this->con->close();
			$_SESSION['message']="Se ha borrado un usuario correctamente";
			$_SESSION['msg']="danger";
			return true;
		}
	}

		public function buscarUser($id){

		$stmt = $this->con->prepare("select * from users where id='$id'") or die($this->con->error);
		if ($stmt->execute()) {
			$result=$stmt->get_result();
			$fetch=$result->fetch_array();
			$stmt->close();
			$this->con->close();
			return $fetch;
		}
	}

	public function update($id,$name,$pass){

		$stmt = $this->con->prepare("update users set name='$name', password='$pass' where id='$id'") or die($this->con->error);
		if ($stmt->execute()) {
			$stmt->close();
			$this->con->close();
			$_SESSION['message']="Se ha modificado un usuario correctamente";
			$_SESSION['msg']="warning";
			return true;

		}
	}

	public function login($name,$pass){

		$stmt = $this->con->prepare("select * from users where name='$name' and password='$pass'") or die($this->con->error);
		if ($stmt->execute()) {
			$result=$stmt->get_result();
			$fetch=$result->fetch_array();
			$stmt->close();
			$this->con->close();
			return $fetch;
		}
	}
}
?>