<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

// echo $_SESSION['id'];
echo "Bienvenido: ".$_SESSION['nick'];

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
	<title>Catalogo San Ildefonso</title>
</head>
<body>
	<section id="contenedor">
		<input type="button" value="Cerrar Sesión" name="cerrar_sesion" onclick="location.href = 'cerrar_sesion.php'">
		<header>
			<center>
				<h1>Catalogo San Ildefonso</h1>
			</center>
		</header>
		<center>
			<input type="button" value="Ir a Menú" name="menu" onclick="location.href = 'home_user.php'">
			<section id="registro">
				<article id="formularioRegistro">
					<table id="tablaFormReg">
						<tr><td><h3>Registrar autor</h3></td></tr>
						<form method="post" action="registrar_autor.php" id="form_reg_autor"> 
						<tr><td><input type="text" placeholder="Nombre(s)" name="nom_autor" required></td></tr> 
						<tr><td><input type="text" placeholder="Apellidos" name="ape_autor" required></td></tr>
						<tr><td><input type="text" placeholder="Lugar de nacimiento" name="lug_autor" required></td></tr>
						<tr><td><input type="date" placeholder="Fecha de nacimiento" name="fec_autor" required></td></tr>
				<!-- Validar en el futuro las etiquetas html porque se interpretan y las comillas simples -->
						<tr><td><textarea rows="12" cols="50" rows="" placeholder="Biografía" name="inf_autor" required></textarea></td></tr>
						<!-- <tr><td><textarea rows="12" cols="50" rows="" placeholder="Bibliografía" name="bib_autor" required></textarea></td></tr> -->
						<!-- <tr><td><textarea placeholder="Comentarios, sinopsis, referencias..." name="com_autor" required></textarea></td></td></tr> -->
						<tr>
							<!-- <input type="hidden" name="<?php// echo (session_name()); ?>" value="<?php //echo (session_id()); ?>"> -->
							<td><input type="submit" value="Registrar" name="registrar_autor"></td></td>
						</tr>
						</form>
					</table>
				</article>
			</section>
		</center>

		<footer style="margin-top:200px";>
			<center>
				<?php require('creditos.php'); ?>
			</center>
		</footer>
	</section>
</body>
</html>