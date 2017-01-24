<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$titulo = $_POST['tit_libro'];
$id_autor = $_POST['autor_libro'];
$edit = $_POST['edit_libro'];
$edic = $_POST['edic_libro'];
$pags = $_POST['pags_libro'];
$info = $_POST['inf_libro'];
$anio = $_POST['anio_libro'];
$lugar = $_POST['lugar_libro'];
$port = $_POST['port_libro'];


if(isset($titulo)){
 
	//Conexion a bd
	require('conexion.php');
	
	//Inicio de variables de sesión
	session_start();

	//Id del usuario capturador
	$id_capturador = $_SESSION['id'];

	// echo "<p>Titulo: ".$titulo."</p>";
	// echo "<p>Id autor: ".$id_autor."</p>";
	// echo "<p>Editorial: ".$edit."</p>";
	// echo "<p>".$edic."</p>";
	// echo "<p>".$pags."</p>";
	// echo "<p>".$info."</p>";
	// echo "<p>".$anio."</p>";
	// echo "<p>".$lugar."</p>";
	// echo "<p>".$port."</p>";
	// echo "<p>".$id_capturador."</p>";
	
	//Insertar en libro
	$consulta = "INSERT INTO libro VALUES (DEFAULT,'$titulo','$edic','$edit','$anio','$lugar','$pags','$port','$info','$id_capturador','$id_autor');";
	echo $consulta;
	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado){
		echo " <script>
			alert('Registro de libro exitoso');
			location.href='home_user.php';
		</script>
		";
	}else{
		echo " <script>
			alert('No se pudo grabar. Intente de nuevo o consulte al administrador');
			location.href='libros.php';
		</script>
		";
	}

	//Seleccionar últmo libro registrado
	// $consulta_sec = "SELECT * FROM libro ORDER BY id_libro DESC LIMIT 1";
	// echo $consulta_sec;
	// $resultado_sec = mysql_query($consulta_sec) or die (mysql_error());
	// $fila = mysql_fetch_array($resultado_sec);
	// $last_id_book = $fila['id_libro'];


	//Insertar en autor_libro
	// $consulta2 = "INSERT INTO autor_libro VALUES (DEFAULT,'$id_autor','$last_id_book');";
	// echo $consulta2;
	// $resultado2 = mysql_query($consulta2) or die (mysql_error());
	// if($resultado2){
	// 	echo " <script>
	// 		alert('Exitosa autor_libro');
	// 		<!--location.href='home_user.php';-->
	// 	</script>
	// 	";
	// }else{
	// 	echo " <script>
	// 		alert('No se pudo grabar. Intente de nuevo o consulte al administrador');
	// 		<!--location.href='libros.php';-->
	// 	</script>
	// 	";
	// }


}
else{
	header("location:libros.php");	
}
?>