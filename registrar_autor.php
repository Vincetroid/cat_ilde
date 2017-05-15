<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$nombre = $_POST['nom_autor'];
$apellidos = $_POST['ape_autor'];
$lugar = $_POST['lug_autor'];
$fecha = $_POST['fec_autor'];
$info = $_POST['inf_autor'];

// echo "<pre>Arreglo Post: ". print_r($_POST)."</pre>";

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

	//Recuperar y registrar múltiples cargos del nuevo autor 
	$numCargos = $_POST['cargosLong'];
	for($i = 1; $i <= $numCargos; $i++){
		$cargo = $_POST['autor_cargo'.$i];
		$fec_ini_cargo = $_POST['fec_ini_cargo'.$i];
		$fec_fin_cargo = $_POST['fec_fin_cargo'.$i];
		$institucion = $_POST['ins_autor_cargo'.$i];

		// echo "<p>Cargo".$i.": ".$cargo."</p><br>";
		// echo "<p>Fecha inicio: ".$fec_ini_cargo."</p><br>";
		// echo "<p>Fecha fin: ".$fec_fin_cargo."</p><br>";
		// echo "<p>Institución".$institucion."</p><br>";

		//Insertar datos en tabla cargo de tal autor
		$cargoCons = "INSERT INTO cargo VALUES (DEFAULT,'$cargo','$fec_ini_cargo','$fec_fin_cargo','$institucion','$lastAutor')";
		echo $cargoCons."<br>";	
		$resCargoCons = mysql_query($cargoCons) or die (mysql_error());
	}

	//Recuperar y registrar múltiples actividades del nuevo autor 
	$numActis = $_POST['actisLong'];
	for($j = 1; $j <= $numActis; $j++){
		$acti = $_POST['autor_acti'.$j];
		$fec_ini_acti = $_POST['fec_ini_acti'.$j];
		$fec_fin_acti = $_POST['fec_fin_acti'.$j];
		$institucion = $_POST['ins_autor_acti'.$j];

		// echo "<p>Acti ".$j.": ".$acti."</p><br>";
		// echo "<p>Fecha inicio: ".$fec_ini_acti."</p><br>";
		// echo "<p>Fecha fin: ".$fec_fin_acti."</p><br>";
		// echo "<p>Institución".$institucion."</p><br>";

		//Insertar datos en tabla cargo de tal autor
		$actiCons = "INSERT INTO actividad VALUES (DEFAULT,'$acti','$fec_ini_acti','$fec_fin_acti','$institucion','$lastAutor')";
		echo $actiCons."<br>";	
		$resActiCons = mysql_query($actiCons) or die (mysql_error());
	}

	//Validación una vez de si se cumplieron las grabaciones y direccionamiento
	if($resultado && $resCargoCons && $resActiCons){
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