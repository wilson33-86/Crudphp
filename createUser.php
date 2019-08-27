<?php
require_once'class.php';
if (isset($_POST['enviar'])) {
	
	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);
    
	$con = new Crud();
	
	$createUser=$con->create_user($name,$pass);

	header('location: users.php');
}

?>