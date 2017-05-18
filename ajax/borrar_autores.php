<?php

//CLICK A AUTOR
if(isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false ){

	header('Content-Type: text/html; charset=ISO-8859-15');
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);

	//Primero borrar el id_autor como foraneo en tablas:
	//libro, cargo y actividad
	$consulta_libro = "DELETE FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_libro = mysql_query($consulta_libro,$conex) or die (mysql_error());

	$consulta_cargo = "DELETE FROM cargo WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_cargo = mysql_query($consulta_cargo,$conex) or die (mysql_error());

	$consulta_acti = "DELETE FROM actividad WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_acti = mysql_query($consulta_acti,$conex) or die (mysql_error());

	//Luego como primario
	$consulta_autor = "DELETE FROM autor WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_autor = mysql_query($consulta_autor,$conex) or die (mysql_error());

	//Devolver 1 en caso de borrado
	if($resultado_libro && $resultado_cargo && $resultado_acti && $resultado_autor){
		echo "1";
	}
    
}

?>