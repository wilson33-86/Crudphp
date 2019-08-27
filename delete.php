<?php
require_once'class.php';

$id=$_GET['id'];
$con = new Crud();
$deleteUser=$con->deleteUser($id);
header('location: users.php');
?>