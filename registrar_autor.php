<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$nombre = $_POST['nom_autor'];
$apellidos = $_POST['ape_autor'];
$lugar = $_POST['lug_autor'];
$fecha = $_POST['fec_autor'];
$info = $_POST['inf_autor'];
$cargo = $_POST['car_autor'];
$fec_ini_cargo = $_POST['fec_ini_cargo'];
$fec_fin_cargo = $_POST['fec_fin_cargo'];
$institucion = $_POST['ins_autor'];

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
	// echo "<p>Cargo: ".$cargo."</p><br>";
	// echo "<p>Fecha inicio: ".$fec_ini_cargo."</p><br>";
	// echo "<p>Fecha fin: ".$fec_fin_cargo."</p><br>";
	// echo "<p>".$institucion."</p><br>";
	
	//Insertar datos en tabla autor
	$consulta = "INSERT INTO autor VALUES (DEFAULT,'$nombre','$apellidos',
		'$fecha','$lugar','$info', $id_capturador);";
	// echo $consulta;
	$resultado = mysql_query($consulta) or die (mysql_error());
	// if(){
	// 	echo " <script>
	// 		alert('Se registró exitosamente datos básicos del autor');
	// 	</script>
	// 	";
	// }else{
	// 	echo " <script>
	// 		alert('No se pudo registrar datos básicos del autor. Intente de nuevo o consulte al administrador');
	// 	</script>
	// 	";
	// }

	//Recuperar nuevo id de autor (el último que se acaba de registrar)

	$lastAutorCons = "SELECT * FROM autor ORDER BY id_autor DESC LIMIT 1;";
	$lastAutorResource = mysql_query($lastAutorCons) or die (mysql_error());
	$lastAutorRow =  mysql_fetch_array($lastAutorResource);
	$lastAutor = $lastAutorRow['id_autor'];

	//Insertar datos en tabla cargo de tal autor
	$cargoCons = "INSERT INTO cargo VALUES (DEFAULT,'$cargo','$fec_ini_cargo','$fec_fin_cargo','$institucion','$lastAutor')";
	echo $cargoCons."<br>";	
	$resCargoCons = mysql_query($cargoCons) or die (mysql_error());

	if($resultado && $resCargoCons){
		echo " <script>
			alert('Registro exitoso');
			location.href='home_user.php';
			
		</script>
		";
	}else{
		echo " <script>
			alert('Registro NO existoso');
			location.href='autores.php';
		</script>
		";
	}
}
else{
	header("location:autores.php");	
}
?>