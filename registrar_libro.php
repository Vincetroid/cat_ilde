<?php

header('Content-Type: text/html; charset=utf-8');

//Recibimos los datos enviados desde el formulario
$titulo = $_POST['tit_libro'];
$id_autor = $_POST['autor_libro'];
$edit = $_POST['edit_libro'];
$edic = $_POST['edic_libro'];
$pags = $_POST['pags_libro'];
$info = $_POST['inf_libro'];
$come = $_POST['com_libro'];
$anio = $_POST['anio_libro'];
$lugar = $_POST['lugar_libro'];
$port_file_name = $_FILES['port_libro']['name'];
$port_file = $_FILES['port_libro'];

//Mirar al arreglo de valores devueltos por $_FILES 
// foreach ($port_file as $key => $value) {
// 	echo "Propiedad: ".$key." --- Valor: ". $value."<br>";
// }

if(isset($titulo)){
 
	//Conexion a bd
	require('conexion.php');
	
	//Inicio de variables de sesión
	session_start();

	//Id del usuario capturador
	$id_capturador = $_SESSION['id'];

	// Impresiones para depuración
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

	//Decodificar caracteres de etiquetas html, acentos, etc a caracteres raros
	// $info_sin_html = htmlentities($info);

	//Colocar caracteres html sin interpretar
	$info_sin_html = html_entity_decode($info);
	$come_sin_html = html_entity_decode($come);

	//Insertar en libro
	$consulta = "INSERT INTO libro VALUES (DEFAULT,'$titulo','$edic','$edit','$anio','$lugar','$pags','$port_file_name','$info_sin_html','$come_sin_html','$id_capturador','$id_autor');";
	$resultado = mysql_query($consulta) or die (mysql_error());
	if($resultado){

		//Subir archivo al servidor
		$portada_recibida = $_FILES["port_libro"]["tmp_name"];
		// $pre_ruta = str_replace('\\', '/', dirname(__FILE__));
		// $pre_ruta = "sanildefonso.org.mx/www/cat_ilde";
		$ruta_guardado = "img/portadas/".$_FILES["port_libro"]["name"];
		
		//Fines de depuración
		// echo "Pre ruta: ".$pre_ruta."<br>";
		// echo "Portada: ".$portada_recibida."<br>";
		// echo "Ruta: ".$ruta_guardado."<br>";

		//Si el archivo se subió a temporales
		// if(file_exists($portada_recibida))
		// {
		//    echo "Archivo subido a temporales";
		// }
		// else
		// {
		//    echo "Archivo no se subió a temporales";
		// }

		//Si el la subida del temporal fue concretada
		$muf = move_uploaded_file($portada_recibida, $ruta_guardado);
		if($muf){
			echo "<script>
				alert('Imagen de portada se subió exitosamente');
			</script>";
		} else {
			echo "<script>
				alert('No se pudo subir la imagen de portada. Intente de nuevo o consulte al administrador.');
			</script>";
		}

		//Mensaje y direccionamiento
		echo "<script>
			alert('Registro de datos de libro exitoso');
			location.href='home_user.php';
		</script>";

	}else{
		//Mensaje y direccionamiento
		echo " <script>
			alert('No se pudo grabar la información del libro. Intente de nuevo o consulte al administrador');
			location.href='libros.php';
		</script>";
	}

	//Seleccionar últmo libro registrado
	// $consulta_sec = "SELECT * FROM libro ORDER BY id_libro DESC LIMIT 1";
	// echo $consulta_sec;
	// $resultado_sec = mysql_query($consulta_sec) or die (mysql_error());
	// $fila = mysql_fetch_array($resultado_sec);
	// $last_id_book = $fila['id_libro'];
}
else{
	header("location:libros.php");	
}
?>