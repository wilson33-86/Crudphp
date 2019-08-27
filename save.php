<?php
require_once'class.php';
if (isset($_POST['save'])) {

	$id = $_POST['id'];
	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	$con = new Crud();
	$save = $con->update($id,$name,$pass);

	header('location: users.php');
}
?>