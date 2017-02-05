<?php

//CLICK A BOTON DR INFORMACION O COMENTARIOS
if(isset($_POST['id_lib']) === true && empty($_POST['id_lib']) === false && isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false){
	
	header('Content-Type: text/html; charset=ISO-8859-1');

	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);
	$idBook = preg_replace("/[^0-9]/","",$_POST['id_lib']);

	//Consultar comentario o info de un libro
	$consulta_comment = "SELECT id_libro,comentario,id_autor FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." AND id_libro = '$idBook';";
	$resultado_comment = mysql_query($consulta_comment,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado_comment);

	//previamente aplicado un html_entity_encode, al realizar htmlentities solo se codificar al caracter html correspondiente 
	$info_sin_html = htmlentities($fila['comentario']);

    echo"<tr><td><p class='comentario-libro'>".$info_sin_html."</p></td></tr>";

    mysql_free_result($resultado_comment);
}

?>