<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

// echo $_SESSION['id'];
echo "Bienvenido: ".$_SESSION['nick'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="img/ico_cat.ico" type="image/x-icon"/>
	<!-- <link rel="stylesheet" href="css/entrar_operario_style.css" /> -->
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
						<tr><td><textarea rows="12" cols="50" rows="" placeholder="Información del autor" name="inf_autor" required></textarea></td></tr>
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
				<p style="font-size:12px;">Realizado por: Rivera Villanueva Vicente / Desarrollo y Diseño Web, Monter Yancko / Editor Web, Díaz Rafael / Sistemas</p>
			</center>
		</footer>
	</section>
</body>
</html>