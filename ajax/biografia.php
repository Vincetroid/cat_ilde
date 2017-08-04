<?php

//CLICK A AUTOR PARA MOSTRAR BIOGRAFÍA DEL AUTOR
if(isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false ){

	// header('Content-Type: text/html; charset=ISO-8859-15');
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);

	//Consultar información de un autor
	$consulta_bio = "SELECT id_autor,info FROM autor WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_bio = mysql_query($consulta_bio,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado_bio);

	//previamente aplicado un html_entity_encode, al realizar htmlentities solo se codificar al caracter html correspondiente 
	// $bio_sin_html = htmlentities($fila['info']);
	
	echo"<td class='no-border'><p class='medium-font'>".$fila['info']."</p></td>";

    mysql_free_result($resultado_bio);
    
}

?>