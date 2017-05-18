<?php

//Conexion a bd
require('conexion.php');

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
	header("location:entrar.php");	
}

//Consultar los autores
$consulta = "SELECT DISTINCT id_autor,nombre,apellidos FROM autor;"; 
$resultado = mysql_query($consulta,$conex) or die (mysql_error());
$numFilas = mysql_num_rows($resultado);

?>
<!DOCTYPE html>
<html>
   <head>
      <!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
      <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/estilos_user.css" rel="stylesheet">
      <link href="css/estilos_baja.css" rel="stylesheet">
      <!-- <script src="js/jquery-3.1.1.min.js"></script> -->
      <script src="js/jquery-3.2.1.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/baja_autores.js"></script>
      <title>Biblioteca San Ildefonso</title>
   </head>
   <body id="bootstrap_overrides">
      <center style="margin-top:0px";>
         <div class="container-fluid">
            
            <?php require('navegacion.php'); ?>
            
         </div>

         
         <section class="autores">
            <table id="tabla_autores">
               <tr>
                  <th>
                     <h3 class="text-center narrow-font">Borrar autor</h3>
                  </th>
               </tr>
               <tr>
                  <td colspan="2" id="busqueda_nombre" class="cell-full">
                     <input type="text" placeholder="Búsqueda por nombre" autofocus   >
                  </td>
               </tr>
               <tr id="ultima_fila_busqueda">
                  <td colspan="2" id="busqueda_apellidos" class="cell-full">
                     <input type="text" placeholder="Búsqueda por apellidos">
                  </td>
               </tr>
               <?php
                  for ($fila = 0; $fila < $numFilas; $fila++) {
                     $id_autor = mysql_result($resultado, $fila, "id_autor");
                     $nombre_autor = mysql_result($resultado, $fila, "nombre");
                     $apellidos_autor = mysql_result($resultado, $fila, "apellidos");
                     echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
                  }
               ?>
            </table>
         </section>
             

      </center>

      <footer style="margin-top:200px";>
         <center>
            <?php require('creditos.php'); ?>
         </center>
      </footer>

   </body>
</html>