<?php 
session_start();

if($_SESSION['nombre']){	
	session_destroy();
	header("location:login.php");
}
else{
	header("location:login.php");
}
?>
