<?php
//NO LLEGAN LOS DATOS ACA EN LINEA
// echo " <script>
// 			alert('".$_POST['id_aut']."');
// 		</script>
// 		";
// echo " <script>
// 			alert('".$_POST['id_lib']."');
// 		</script>
// 		";
// //CLICK A LIBRO
if(isset($_POST['id_lib']) === true && empty($_POST['id_lib']) === false && isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false){
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	// $req = require('../conexion.php');
	// if($req){
	// 	echo " <script>
	// 		alert('Success2');
	// 	</script>
	// 	";
	// } else {
	// 	echo " <script>
	// 		alert('Bad2');
	// 	</script>
	// 	";
	// }

	function get_usuario_capturador($id_usu_cap){
	   $consulta_capturador = "SELECT id_usu,nombre_usu FROM usuario WHERE id_usu='$id_usu_cap';";
	   $resultado_capturador = mysql_query($consulta_capturador) or die (mysql_error());
	   $fila = mysql_fetch_array($resultado_capturador);
	   return $fila['nombre_usu'];
	}

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);
	$idBook = preg_replace("/[^0-9]/","",$_POST['id_lib']);

	//Consultar los libros
	$consulta_libro = "SELECT * FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." AND id_libro = '$idBook';";
	$resultado_libro = mysql_query($consulta_libro,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado_libro);

	//Insertar detalles de libro tal
  	echo'<tr><th colspan="2">Detalles de: '. $fila['titulo'] .'</th></tr>
		<tr><td>Edición </td><td>'. $fila['ed'] . '</td></tr>
		<tr><td>Editorial </td><td>'. $fila['edit'] . '</td></tr>
		<tr><td>Año de publicación </td><td>'. $fila['anio_pub'] . '</td></tr>
		<tr><td>Lugar de publicación </td><td>'. $fila['lugar_pub'] . '</td></tr>
		<tr><td>Páginas </td><td>'. $fila['pags'] . '</td></tr>
		<tr><td>Portada </td><td id="nombre_img_port">'. $fila['portada'] . '</td></tr>
		<tr><td>Capturado por </td><td>'. get_usuario_capturador($fila['id_usu']). '</td></tr>
		<tr><td colspan="2"><center><input class="info-libro" type="button" value="Información de libro"/></center></td></tr>';

	//Liberar consulta
    mysql_free_result($resultado_libro);
}

?>