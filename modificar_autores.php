<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <!-- <meta charset="utf-8" /> -->
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
   <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
   <link href="css/bootstrap.css" rel="stylesheet">
   <link href="css/estilos_user.css" rel="stylesheet">
   <link href="css/estilos_form.css" rel="stylesheet">
   <script src="js/jquery-3.1.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/modificar_autores.js"></script>
   <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
   <title>Biblioteca San Ildefonso</title>
</head>
<body id="bootstrap_overrides">
   <center style="margin-top:0px";>
      <div class="container-fluid">
         
         <?php require('navegacion.php'); ?>
         
      </div>

      <section id="contenedor">
         <center>
            <section id="registro">
               <article id="formularioRegistro">
                  <form method="post" action="script_modificar_autor.php" id="form_reg_autor">
                     <table id="tablaFormReg">
                        <tr><td><h3 class="narrow-font">Editar autor</h3></td></tr>
                     </table>
                  </form>
               </article>
            </section>
         </center>
      </section>
   </center>

</body>
</html>