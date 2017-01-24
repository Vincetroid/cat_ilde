<?php

header('Content-Type: text/html; charset=utf-8');

$usu_ema = $_POST['usu_ema'];
$pass = $_POST['pass'];
// echo $usu_ema;
// echo $pass;

if(isset($usu_ema)){
 
	//Conexion a bd
	require('conexion.php');

	// if($conex)
	// 	echo"Conexion exitosa";
	
	//Inicio de variables de sesión
	  session_start();
	
	//Consultar si los datos son están guardados en la base de datos
	$consulta = "SELECT * FROM usuario WHERE (nombre_usu='$usu_ema' OR email='$usu_ema') AND password='$pass'"; 
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado);

	echo "<pre>";
	print_r($fila);
	echo "</pre>";
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['id_usu']){ 
		header("location:entrar.php");	
	}
	//OPCIÓN 2: Usuario logueado correctamente
	else{
		//Definimos las variables de sesión y redirigimos a la página de usuario
		$_SESSION['id'] = $fila['id_usu'];
		$_SESSION['nick'] = $fila['nombre_usu'];
		// $_SESSION['name'] = $fila['nombre'];
		// $_SESSION['lastnames'] = $fila['apellidos'];
	
		header("Location: home_user.php");
	}
}
else{
	header("location:entrar.php");	
}

?>