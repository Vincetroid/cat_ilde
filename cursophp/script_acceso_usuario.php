<?php
//Recibimos los datos enviados desde el formulario
$email= $_POST['email'];
$password= $_POST['password'];

if(isset($email)){
 
	//Proceso de conexión con la base de datos
	$conex= mysql_connect("localhost","root","")
		or die("No se pudo realizar la conexion");
	mysql_select_db("cursogratuito",$conex)
		or die("ERROR con la base de datos");
	
	//Inicio de variables de sesión
	  session_start();
	
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM usuarios WHERE email='$email' AND password='$password'"; 
	$resultado= mysql_query($consulta,$conex) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['id']){ 
		header("location:login.php");	
	}
	//OPCIÓN 2: Usuario logueado correctamente
	else{
		//Definimos las variables de sesión y redirigimos a la página de usuario
		$_SESSION['id_usuario'] = $fila['id'];
		$_SESSION['nombre'] = $fila['nombre'];
	
		header("Location: pagina_usuario.php");
	}
}
else{
	header("location:login.php");	
}
?>