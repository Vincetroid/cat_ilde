<?php

//ENTER EN CAJA DE TEXTO DE BUSQUEDA RÁPIDA POR NOMBRE Y APELLIDO
if(isset($_POST['cadena_nombre']) === true && empty($_POST['cadena_nombre']) === false && isset($_POST['cadena_apellidos']) === true && empty($_POST['cadena_apellidos']) === false){

	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Consultar comentario o info de un libro
	$consulta = "SELECT id_autor,nombre,apellidos FROM autor WHERE nombre LIKE '%".mysql_real_escape_string(trim($_POST['cadena_nombre']))."%' AND apellidos LIKE '%".mysql_real_escape_string(trim($_POST['cadena_apellidos']))."%';";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$numFilas = mysql_num_rows($resultado);

	for ($fila = 0; $fila < $numFilas; $fila++) {
    	$id_autor = mysql_result($resultado, $fila, "id_autor");
    	$nombre_autor = mysql_result($resultado, $fila, "nombre");
    	$apellidos_autor = mysql_result($resultado, $fila, "apellidos");
    	echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
    }

    mysql_free_result($resultado);
}

//ENTER EN CAJA DE TEXTO DE BUSQUEDA RÁPIDA POR NOMBRE
else if(isset($_POST['cadena_nombre']) === true && empty($_POST['cadena_nombre']) === false){
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Consultar comentario o info de un libro
	$consulta = "SELECT id_autor,nombre,apellidos FROM autor WHERE nombre LIKE '%".mysql_real_escape_string(trim($_POST['cadena_nombre']))."%' ;";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$numFilas = mysql_num_rows($resultado);

	for ($fila = 0; $fila < $numFilas; $fila++) {
    	$id_autor = mysql_result($resultado, $fila, "id_autor");
    	$nombre_autor = mysql_result($resultado, $fila, "nombre");
    	$apellidos_autor = mysql_result($resultado, $fila, "apellidos");
    	echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
    }

    mysql_free_result($resultado);

}

//ENTER EN CAJA DE TEXTO DE BUSQUEDA RÁPIDA POR APELLIDOS
else if(isset($_POST['cadena_apellidos']) === true && empty($_POST['cadena_apellidos']) === false){

	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Consultar comentario o info de un libro
	$consulta = "SELECT id_autor,nombre,apellidos FROM autor WHERE apellidos LIKE '%".mysql_real_escape_string(trim($_POST['cadena_apellidos']))."%' ;";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$numFilas = mysql_num_rows($resultado);

	for ($fila = 0; $fila < $numFilas; $fila++) {
    	$id_autor = mysql_result($resultado, $fila, "id_autor");
    	$nombre_autor = mysql_result($resultado, $fila, "nombre");
    	$apellidos_autor = mysql_result($resultado, $fila, "apellidos");
    	echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
    }

    mysql_free_result($resultado);
} 

//ENTER CUANDO NO HAY CADENA TEXTO, SE REGRESAN TODOS LOS AUTORES
else{

	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Consultar comentario o info de un libro
	$consulta = "SELECT DISTINCT id_autor,nombre,apellidos FROM autor;"; 
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$numFilas = mysql_num_rows($resultado);

    for ($fila = 0; $fila < $numFilas; $fila++) {
     	$id_autor = mysql_result($resultado, $fila, "id_autor");
      	$nombre_autor = mysql_result($resultado, $fila, "nombre");
      	$apellidos_autor = mysql_result($resultado, $fila, "apellidos");
    	echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";	
    }

    mysql_free_result($resultado);
}

?>