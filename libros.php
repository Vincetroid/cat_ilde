<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

// echo $_SESSION['id'];
// echo "Bienvenido: ".$_SESSION['nick'];

//Conexion a bd
require('conexion.php');

//Consultar los autores
$consulta = "SELECT DISTINCT id_autor,nombre,apellidos FROM autor;"; 
$resultado = mysql_query($consulta,$conex) or die (mysql_error());
$numFilas = mysql_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="utf-8" /> -->
	<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/estilos_user.css" rel="stylesheet">
	<link href="css/estilos_form.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<title>Biblioteca San Ildefonso</title>
</head>
<body id="bootstrap_overrides">
	<center style="margin-top:0px";>
	   <div class="container-fluid">

	     <?php require('navegacion.php'); ?>
	   
	   </div>

		<section id="registro">
			<article id="formularioRegistro">
				<table id="tablaFormReg">
					<tr><td><h3 class="narrow-font">Capturar datos de libro</h3></td></tr>
					<form method="post" action="registrar_libro.php" id="form_reg_libro" enctype="multipart/form-data"> 
					<tr><td><input type="text" placeholder="Título" name="tit_libro" required></td></tr> 

					<tr>
						<td>
							<select name="autor_libro" required">
								<option value="" disabled selected >Autor</option>
								<?php
									for ($fila = 0; $fila < $numFilas; $fila++) {
										$id_autor = mysql_result($resultado, $fila, "id_autor");
										$nombre_autor = mysql_result($resultado, $fila, "nombre");
										$apellidos_autor = mysql_result($resultado, $fila, "apellidos");
										echo"<option value='".$id_autor."'>".$nombre_autor." ".$apellidos_autor."</option>";
									}
								?>
							</select>
						</td>
					</tr>

					<tr><td><input type="text" placeholder="Editorial" name="edit_libro" required></td></tr>
					<tr><td><input type="text" placeholder="Lugar de publicación" name="lugar_libro"></td></tr>
					<tr><td><input type="number" placeholder="Año de publicación" name="anio_libro"></td></tr>
					<tr><td><input type="number" min="1" max="1000" placeholder="Edición" name="edic_libro" required></td></tr>
					<tr><td><input type="number" min="1" max="10000" placeholder="Páginas" name="pags_libro"></td></tr>
					<tr><td><textarea rows="10" cols="50" rows="" placeholder="Reseña" name="inf_libro" required></textarea></td></tr>
					<tr><td><textarea rows="10" cols="50" rows="" placeholder="Comentario" name="com_libro" required></textarea></td></tr>
					<tr><td><p style="display:inline;">Imagen de portada </p><input type="file" name="port_libro" id="port_libro" class="btn-file"></td></tr>
					<tr>
						<td><input type="submit" value="Registrar" name="registrar_libro" id="registrar_libro" class="btn-sub"></td></td>
					</tr>
					</form>
				</table>
			</article>
		</section>

		<footer style="margin-top:200px";>
			<center>
				<?php require('creditos.php'); ?>
			</center>
		</footer>

	</center>
</body>
</html>