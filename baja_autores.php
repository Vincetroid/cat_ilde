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
      <!-- <meta charset="utf-8" /> -->
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <link rel="shortcut icon" href="img/ico_cat.ico" type="image/x-icon"/>
      <link href="css/estilos_user.css" rel="stylesheet">
      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/home_user.js"></script>
      <title>Catalogo San Ildefonso</title>
   </head>
   <body>
      <center style="margin-top:50px";>
         <header>
            <center>
               <h1>Catálogo San Ildefonso</h1>
            </center>
         </header>
         Usuario: <?php echo $_SESSION['nick']."<br>"; ?>
         <p>Elija uno o varios autores</p>

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
                           <td colspan="2">
                              <input type="text" placeholder="Búsqueda rápida">
                           </td>
                        </tr>
                        <?php
                           for ($fila = 0; $fila < $numFilas; $fila++) {
                              $id_autor = mysql_result($resultado, $fila, "id_autor");
                              $nombre_autor = mysql_result($resultado, $fila, "nombre");
                              $apellidos_autor = mysql_result($resultado, $fila, "apellidos");
                              echo"<tr><td><input type='checkbox'></td><td><a class='autor' id='id_autor".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</a></td></tr>";
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
            <p style="font-size:12px;">Realizado por: Rivera Villanueva Vicente / Desarrollo y Diseño Web, Monter Yancko / Editor Web, Díaz Rafael / Sistemas</p>
         </center>
      </footer>

   </body>
</html>