<?php

//CLICK A AUTOR
if(isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false ){
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);

	//Consultar los libros
	$consulta_libro = "SELECT id_libro,titulo FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado_libro = mysql_query($consulta_libro,$conex) or die (mysql_error());
	$numFilasLibro = mysql_num_rows($resultado_libro);

	//Obtener titulos e id
	for ($fila = 0; $fila < $numFilasLibro; $fila++) {
    	$id_libro = mysql_result($resultado_libro, $fila, "id_libro");
      	$titulo = mysql_result($resultado_libro, $fila, "titulo");
      	echo"<tr><td><a class='libro' id='id_libro".$id_libro."'>".$titulo."</a></td></tr>";
    }

    mysql_free_result($resultado_libro);
    
}

?>