<?php
//Recibimos los datos enviados desde el formulario
$email= $_POST['email'];
$password= $_POST['password'];

if(isset($email)){
 
	//Proceso de conexi�n con la base de datos
	$conex= mysql_connect("localhost","root","")
		or die("No se pudo realizar la conexion");
	mysql_select_db("cursogratuito",$conex)
		or die("ERROR con la base de datos");
	
	//Inicio de variables de sesi�n
	  session_start();
	
	//Consultar si los datos son est�n guardados en la base de datos
	$consulta= "SELECT * FROM usuarios WHERE email='$email' AND password='$password'"; 
	$resultado= mysql_query($consulta,$conex) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	
	//OPCI�N 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['id']){ 
		header("location:login.php");	
	}
	//OPCI�N 2: Usuario logueado correctamente
	else{
		//Definimos las variables de sesi�n y redirigimos a la p�gina de usuario
		$_SESSION['id_usuario'] = $fila['id'];
		$_SESSION['nombre'] = $fila['nombre'];
	
		header("Location: pagina_usuario.php");
	}
}
else{
	header("location:login.php");	
}
?>