<?php

//CLICK A BOTON DR INFORMACION O COMENTARIOS
if(isset($_POST['id_lib']) === true && empty($_POST['id_lib']) === false && isset($_POST['id_aut']) === true && empty($_POST['id_aut']) === false){
	
	header('Content-Type: text/html; charset=ISO-8859-1');

	//Conexion a bd yendo atrás hacia carpeta raíz
	require('../conexion.php');

	//Quitar letras de id
	$idAut = preg_replace("/[^0-9]/","",$_POST['id_aut']);
	$idBook = preg_replace("/[^0-9]/","",$_POST['id_lib']);

	// //Consultar reseña de libro
	// $consulta_resenia = "SELECT id_libro,resenia,comentario,id_autor FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." AND id_libro = '$idBook';";
	// $resultado_resenia = mysql_query($consulta_resenia,$conex) or die (mysql_error());
	// $fila = mysql_fetch_array($resultado_resenia);

	//Consultar reseña y comentario de libro
	$consulta = "SELECT id_libro,resenia,comentario,id_autor FROM libro WHERE id_autor = ".mysql_real_escape_string(trim($idAut))." AND id_libro = '$idBook';";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$fila = mysql_fetch_array($resultado);

	//previamente aplicado un html_entity_encode, al realizar htmlentities solo se codificar al caracter html correspondiente 
	$resenia_sin_html = htmlentities($fila['resenia']);
	$coment_sin_html = htmlentities($fila['comentario']);

	echo"<tr class='resenia-comentario'>
       <td colspan='3'>

          <section class='resenia'>
             <table id='tabla_resenia'>
                <tr id='resenia_pub' class='subtitle'>
                   <th colspan='2'>Reseña</th>
                   <tr><td class='no-border'><p class='resenia-libro'>".$resenia_sin_html."</p></td></tr>
                </tr>
             </table>
          </section>

       </td>
    </tr>
    <tr class='resenia-comentario'>
       <td colspan='3'>

          <section class='comentarios'>
             <table id='tabla_comentarios'>
                <tr id='comentarios_pub'>
                   <th colspan='2'>Comentarios</th>
                   <tr><td class='no-border'><p class='comentario-libro'>".$coment_sin_html."</p></td></tr>
                </tr>
             </table>
          </section>

       </td>
    </tr>";

    mysql_free_result($resultado);
}

?>