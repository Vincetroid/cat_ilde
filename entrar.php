<?php session_start (); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="shortcut icon" href="img/ico_cat.ico" type="image/x-icon"/>
	<!-- <link rel="stylesheet" href="css/entrar_operario_style.css" /> -->
	<title>Catalogo San Ildefonso</title>
</head>
<body>
	<section id="contenedor">
		<header>
			<center>
				<h1>Catalogo San Ildefonso</h1>
			</center>
		</header>
		<center>
			<section id="registro">
				<article id="formularioRegistro">
					<table id="tablaFormReg">
						<tr><td><h3>Entrar</h3></td></tr>
						<form method="post" action="script_validar_acceso.php" id="form_entrar"> 
						<tr><td><input type="text" placeholder="Nombre de Usuario o Correo electrónico" name="usu_ema" required></td></td></tr> 
						<tr><td><input type="password" placeholder="Password" name="pass" required></td></td></tr> 
						</tr>
						<tr>
							<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
							<td><input type="submit" value="Iniciar sesión" name="iniciar" id="iniciar"></td></td>
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