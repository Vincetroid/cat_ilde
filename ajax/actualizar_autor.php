<?php

//AL CARGAR LA PAGINA O EL DOM
if(isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false ){

	// header('Content-Type: text/html; charset=ISO-8859-15');
	
	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);

	//Primero borrar el id_autor como foraneo 
	$consulta = "SELECT * FROM autor WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." ;";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado);

	// $bio_aut = $fila['info'];
	// echo "<div id='bio'>$bio_aut</div>";

	//Formulario
	echo'
	<tr><td><input type="hidden" value="'.$idAut.'" name="id_autor"></td></tr>
	<tr><td><input type="text" placeholder="Nombre(s)" name="nom_autor" id="nom_autor" value="'.$fila['nombre'].'" required></td></tr> 
    <tr><td><input type="text" placeholder="Apellidos" name="ape_autor" value="'.$fila['apellidos'].'" required></td></tr>
    <tr><td><input type="text" placeholder="Lugar de nacimiento" name="lug_autor" value="'.$fila['lugar_nac'].'" required></td></tr>
    <tr><td><input type="date" placeholder="Fecha de nacimiento" name="fec_autor" value="'.$fila['fecha_nac'].'" required></td></tr>
    <tr><td><textarea rows="12" cols="50" rows="" placeholder="Biografía" name="inf_autor" id="infAutor" onkeypress="onenter(event)" required>'.$fila['info'].'</textarea></td></tr>
    <tr><td><input type="submit" value="Modificar" name="modificar_autor" class="btn-sub"></td></td></tr>';

}

?>