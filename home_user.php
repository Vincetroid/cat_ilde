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

// echo "Ruta servidor: ".dirname(__FILE__)."<br>";
// echo "Ruta servidor modificada: ".str_replace('\\', '/', dirname(__FILE__))."<br>";
// echo "Ruta servidor con getcwd: ".getcwd()."<br>";

?>
<!DOCTYPE html>
<html>
   <head>
      <!-- <meta charset="utf-8" /> -->
      <!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
      <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/estilos_user.css" rel="stylesheet">
      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/home_user.js"></script>
      <title>Catalogo San Ildefonso</title>
   </head>
   <body id="bootstrap_overrides">
      <center style="margin-top:50px";>
         <!-- <div class="container">
            <div class="row">
                -->
         <header>
            <center>
               <h1>Catálogo San Ildefonso</h1>
            </center>
         </header>
         Usuario: <?php echo $_SESSION['nick']."<br>"; ?>
         <p>¿Qué desea realizar?</p>

         <section>
            <input type="button" value="Dar de alta autor" name="alta_autor" onclick="location.href = 'autores.php'">
            <!-- <input type="button" value="Modificar autor" name="modificar_autor" onclick="location.href = 'modificar_autores.php'"> -->
            <input type="button" value="Dar de baja autor" name="baja_autor" onclick="location.href = 'baja_autores.php'">
            <input type="button" value="Registrar libro" name="alta_libro" onclick="location.href = 'libros.php'">
            <input type="button" value="Cerrar Sesión" name="cerrar_sesion" onclick="location.href = 'cerrar_sesion.php'">
         </section>

         <table id="secciones_visualizacion">
            <tr>
               <td rowspan="2">

                  <section class="autores">
                     <table id="tabla_autores">
                        <tr>
                           <th colspan="2" class="libro">Autores</th>
                        </tr>
                        <tr>
                           <td colspan="2" id="busqueda_nombre">
                              <input type="text" placeholder="Búsqueda por nombre" autofocus>
                           </td>
                        </tr>
                        <tr id="ultima_fila_busqueda">
                           <td colspan="2" id="busqueda_apellidos">
                              <input type="text" placeholder="Búsqueda por apellidos">
                           </td>
                        </tr>
                        <?php
                           for ($fila = 0; $fila < $numFilas; $fila++) {
                              $id_autor = mysql_result($resultado, $fila, "id_autor");
                              $nombre_autor = mysql_result($resultado, $fila, "nombre");
                              $apellidos_autor = mysql_result($resultado, $fila, "apellidos");
                              echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td><td class='edit_autor img_edit'><img src='img/lapiz_opti2.png' width='15px' height='15px'></td></tr>";
                           }
                        ?>
                     </table>
                  </section>

               </td>
               <td colspan="2">

                  <section class="publicaciones">
                     <table id="tabla_publicaciones">
                        <tr id="lista_pubs">
                           <th>Publicaciones</th>
                        </tr>
                     </table>
                  </section>

               </td>
            </tr>
            <tr>
               <td>

                   <section class="publicaciones">
                     <table id="tabla_detalles_pub">
                        <tr id="detalles_pub">
                           <th id="detalles_de" colspan="2">Detalles de: </th>
                        </tr>
                     </table>
                  </section>

               </td>
               <td>
                  <center>
                     <img class="img-portada" src="img/portadas/sin_portada_opti.png" width="100%" height="auto">
                  </center>
               </td>
            </tr>
            <tr>
               <td colspan="3">

                  <section class="comentarios">
                     <table id="tabla_comentarios">
                        <tr id="comentarios_pub">
                           <th colspan="2">Información</th>
                        </tr>
                     </table>
                  </section>

               </td>
            </tr>
         </table>

      </center>

      <footer style="margin-top:200px";>
         <center>
            <?php require('creditos.php'); ?>
         </center>
      </footer>

   </body>
</html>