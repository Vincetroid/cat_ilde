<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

// echo $_SESSION['id'];
echo "Bienvenido: ".$_SESSION['nick'];

// print_r($_GET);

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <!-- <meta charset="utf-8" /> -->
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
   <link href="css/bootstrap.css" rel="stylesheet">
   <link href="css/estilos_user.css" rel="stylesheet">
   <script src="js/jquery-3.1.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/modificar_autores.js"></script>
   <!-- <link rel="stylesheet" href="css/entrar_operario_style.css" /> -->
   <title>Catalogo San Ildefonso</title>
</head>
<body>
   <section id="contenedor">
      <input type="button" value="Cerrar Sesión" name="cerrar_sesion" onclick="location.href = 'cerrar_sesion.php'">
      <header>
         <center>
            <h1>Catalogo</h1>
         </center>
      </header>
      <center>
         <input type="button" value="Ir a Menú" name="menu" onclick="location.href = 'home_user.php'">
         <section id="registro">
            <article id="formularioRegistro">
               <form method="post" action="script_modificar_autor.php" id="form_reg_autor">
                  <table id="tablaFormReg">
                     <tr><td><h3>Editar autor</h3></td></tr>
                  </table>
               </form>
            </article>
         </section>
      </center>

      <footer style="margin-top:200px";>
         <center>
            <?php require('creditos.php'); ?>
         </center>
      </footer>
   </section>
   <script>

   </script>
</body>
</html>