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
      <link rel="shortcut icon" href="img/ico_cat.ico" type="image/x-icon"/>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/estilos_user.css" rel="stylesheet">
      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/baja_autores.js"></script>
      <title>Catalogo San Ildefonso</title>
   </head>
   <body id="bootstrap_overrides">
      <center style="margin-top:50px";>
         <header>
            <center>
               <h1>Catálogo San Ildefonso</h1>
               <input type="button" value="Ir a Menú" name="menu" onclick="location.href = 'home_user.php'"><br><br>
            </center>
         </header>
         Usuario: <?php echo $_SESSION['nick']."<br>"; ?>
         <p>Elija un autor</p>

         <section>
            <input type="button" value="Dar de alta autor" name="alta_autor" onclick="location.href = 'autores.php'">
            <input type="button" value="Registrar libro" name="alta_libro" onclick="location.href = 'libros.php'">
            <input type="button" value="Cerrar Sesión" name="cerrar_sesion" onclick="location.href = 'cerrar_sesion.php'">
         </section>

         <table id="secciones_visualizacion">
            <tr>
               <td>
                  <section class="autores">
                     <table id="tabla_autores">
                        <tr>
                           <th colspan="2" class="libro">Autores</th>
                        </tr>
                        <tr>
                           <td colspan="2" id="busqueda_nombre">
                              <input type="text" placeholder="Búsqueda por nombre" autofocus   >
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
                              echo"<tr><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
                           }
                        ?>
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