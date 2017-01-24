<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$nombre = $_POST['nom_autor'];
$apellidos = $_POST['ape_autor'];
$lugar = $_POST['lug_autor'];
$fecha = $_POST['fec_autor'];
$info = $_POST['inf_autor'];

if(isset($nombre)){
 
	//Conexion a bd
	require('conexion.php');

	//Inicio de variables de sesión
	session_start();

	//Id del usuario capturador
	$id_capturador = $_SESSION['id'];

	// echo "<p>".$nombre."</p><br>";
	// echo "<p>".$apellidos."</p><br>";
	// echo "<p>".$lugar."</p><br>";
	// echo "<p>".$fecha."</p><br>";
	// echo "<p>".$info."</p><br>";
	// echo "<p>".$id_capturador."</p><br>";
	
	//Consultar si los datos están guardados en la base de datos
	$consulta = "INSERT INTO autor VALUES (DEFAULT,'$nombre','$apellidos',
		'$fecha','$lugar','$info', $id_capturador);";
	// echo $consulta;
	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado){
		echo " <script>
			alert('Se registró exitosamente');
			location.href='home_user.php';
		</script>
		";
	}else{
		echo " <script>
			alert('No se pudo registrar. Intente de nuevo o consulte al administrador');
			location.href='autores.php';
		</script>
		";
	}
}
else{
	header("location:autores.php");	
}
?>