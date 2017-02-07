<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$idAutor = $_POST['id_autor'];
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
	$consulta = "UPDATE autor SET 
		id_autor = '$idAutor',
		nombre = '$nombre',
		apellidos = '$apellidos',
		fecha_nac = '$fecha',
		lugar_nac = '$lugar',
		info = '$info', 
		id_usu = '$id_capturador' 
		WHERE id_autor = '$idAutor';";

	// UPDATE autor SET 
	// 	id_autor = '48',
	// 	nombre = 'Dafne',
	// 	apellidos = 'Rivera',
	// 	fecha_nac = '2000-01-01',
	// 	lugar_nac = 'Grecia',
	// 	info = 'Mujer muy trabajadora', 
	// 	id_usu = 1 
	// 	WHERE id_autor = '48';
	// echo $consulta;
	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado){
		echo " <script>
			alert('Se modificó exitosamente');
			location.href='home_user.php';
		</script>
		";
	}else{
		echo " <script>
			alert('No se pudo registrar. Intente de nuevo o consulte al administrador');
			location.href='modificar_autores.php';
		</script>
		";
	}
}
else{
	header("location:autores.php");	
}
?>