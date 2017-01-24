<?php 
session_start();

if($_SESSION['nick']){	
	session_destroy();
	header("location:entrar.php");
}
else{
	header("location:entrar.php");
}
?>