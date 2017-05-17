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
      <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/jquery.nanoscroller.js"></script>
      <script src="js/bootstrap.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/nanoscroller.css" rel="stylesheet">
      <link href="css/estilos_user.css" rel="stylesheet">
      <script src="js/home_user.js"></script>
      <!-- <link href="css/jquery.bxslider.css" rel="stylesheet" /> -->



      <!-- bxSlider Javascript file -->
      <!-- // <script src="js/jquery.bxslider.min.js"></script> -->
      <!-- bxSlider CSS file -->
      <!-- <link href="css/jquery.bxslider.css" rel="stylesheet" /> -->

      <title>Catalogo San Ildefonso</title>
   </head>
   <body id="bootstrap_overrides">
      <center style="margin-top:0px";>
         <div class="container-fluid">
            
            <?php require('navegacion.php'); ?>
            
         </div>

         <div class="subtitle">
            <div class="subtitle1">Autores</div>
            <div class="subtitle2">Publicaciones</div>
            <div class="subtitle3">Biografía</div>
         </div>

         <table id="secciones_visualizacion">
            <tr>
               <td rowspan="2" class="content-cell cell-autor">

                  <div class="subtitle">
                     <div class="col-sm-12 center-header-table" id="busqueda_nombre">
                        <input type="text" placeholder="Búsqueda por nombre" autofocus class="search-input">
                     </div>
                  </div>
                  <div class="subtitle">
                     <div class="col-sm-12 center-header-table" id="busqueda_apellidos">
                        <input type="text" placeholder="Búsqueda por apellidos" id="last-search-input" class="search-input">
                     </div>
                  </div>

                  <div class="nano" style="height:550px;">
                     <div class="nano-content">
                        <section class="autores">
                           <table id="tabla_autores">
                              <?php
                                 for ($fila = 0; $fila < $numFilas; $fila++) {
                                    $id_autor = mysql_result($resultado, $fila, "id_autor");
                                    $nombre_autor = mysql_result($resultado, $fila, "nombre");
                                    $apellidos_autor = mysql_result($resultado, $fila, "apellidos");
                                    echo"<tr><td class='autor-cell'><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td><td class='edit_autor img_edit'><img src='img/lapiz_opti2.png' width='15px' height='15px'></td></tr>";
                                 }
                              ?>
                           </table>
                        </section>
                     <div>
                  </div>

                  

               </td>

               <!-- PUBLICACIONES -->

               <td colspan="" class="content-cell cell-publication">

                  <div class="nano">
                     <div class="nano-content">
                        <section class="publicaciones">
                           <table id="tabla_publicaciones" >
                              <tr id="lista_pubs">
                                 
                              </tr>
                           </table>
                        </section>
                     <div>
                  </div>

               </td>

               <!-- BIOGRAFIA -->

               <td class="content-cell cell-biography">
                  <div class="nano">
                     <div class="nano-content">
                        <section class="publicaciones">
                           <table id="tabla_biografia" >
                              <tr id="biografia">
                                 
                              </tr>
                           </table>
                        </section>
                     <div>
                  </div>
               </td>

            </tr>

            <tr class="row-details-cover">
               <td class="content-cell cell-details">

                  <div class="subtitle details-position">
                     <div id="publication_details">Detalles de: </div>
                  </div>

                  <section class="publicaciones">
                     <table id="tabla_detalles_pub">
                        <tr id="detalles_pub">
                           
                        </tr>
                     </table>
                  </section>

               </td>
               <td id="size-portada" class="cell-cover">
                  <center>
                     <!-- <img class="img-responsive img-portada" src="img/portadas/sin_portada_opti.png"> -->
                     <img class="img-portada" src="img/portadas/sin_portada_opti.png">
                  </center>
               </td>
            </tr>

            <!-- <tr class='resenia'></tr>
            <tr class='comentario'></tr> -->

            <!-- <tr>
               <td colspan="3">

                  <section class="resenia">
                     <table id="tabla_resenia">
                        <tr id="resenia_pub">
                           <th colspan="2">Reseña</th>
                        </tr>
                     </table>
                  </section>

               </td>
            </tr>
            <tr>
               <td colspan="3">

                  <section class="comentarios">
                     <table id="tabla_comentarios">
                        <tr id="comentarios_pub">
                           <th colspan="2">Comentarios</th>
                        </tr>
                     </table>
                  </section>

               </td>
            </tr> -->

            <!-- <tr>
               <td colspan="3">

                  <div class="nano">
                     <div class="nano-content">
                        <section class="comentarios">
                           <table id="tabla_comentarios">
                              <tr id="comentarios_pub">
                                 <th colspan="2">Comentarios</th>
                                 <tr><p>Lorem</p><p>Lorem</ps><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p><p>Lorem</p></tr>
                              </tr>
                           </table>
                        </section>
                     </div>
                  </div>

               </td>
            </tr> -->
         </table>

      </center>

      <footer style="margin-top:200px";>
         <center>
            <?php require('creditos.php'); ?>
         </center>
      </footer>

   </body>
</html>