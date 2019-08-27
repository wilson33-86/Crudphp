<?php
require_once'class.php';
if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if (empty($name) && empty($pass)) {
	   echo"<script>alert('Campos vacios')</script>";
      echo"<script>window.location = 'index.php';</script>";	
	}
  
    $con = new Crud();
    $validar = $con->login($name,$pass);

    if ($validar['name']==$name && $validar['password']==$pass) {
    	
    	echo"<script>window.location = 'users.php';</script>";
    }else{
      echo"<script>alert('Usuario o password Incorrectos')</script>";
      echo"<script>window.location = 'index.php';</script>";
    }

}

?>