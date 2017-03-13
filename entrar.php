<?php session_start (); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="utf-8" /> -->
	<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	<link rel="shortcut icon" href="img/ico_cat.ico" type="image/x-icon"/>
	<script src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="css/estilos_login.css" />
	<title>Catálogo San Ildefonso</title>
	<script src="js/bootstrap.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/estilos_login.css" rel="stylesheet">
</head>
<body id="bootstrap_overrides">
	<!-- <div class="row">
		<div class="col-sm-12">
			<header>
				<center>
					<img src="img/macsi2016gray.png">
				</center>
			</header>
		</div>
	</div> -->
	<div class="row">
		<div class="col-sm-12">
			<header>
				<center>
					<h1 class="header-title">Catálogo San Ildefonso</h1>
				</center>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>

		<div class="col-sm-6">
			<table id="tablaFormReg">
				<form method="post" action="script_validar_acceso.php" id="form_entrar"> 
				<tr><td><input class="input-box first-input" type="text" placeholder="Usuario o Correo electrónico" name="usu_ema" required></td></td></tr> 
				<tr><td><input class="input-box" type="password" placeholder="Password" name="pass" required></td></td></tr> 
				</tr>
				<tr>
					<input type="hidden" name="<?php echo (session_name()); ?>" value="<?php echo (session_id()); ?>">
					<td><input type="submit" value="Iniciar sesión" name="iniciar" id="iniciar" class="btn btn-success btn-center"></td></td>
				</tr>
				</form>
			</table>
		</div>

		<div class="col-sm-3"></div>
	</div>

	<footer class="row" style="margin-top:220px";>
		<div class="col-sm-12">
			<center>
				<img class="footer-img" src="img/macsi2016gray.png">
				<p class="footer-p">Justo Sierra 16, Centro Histórico de la Ciudad de México 06020 México, D.F. Tel. (+52-55) 3602 0000 exts. 1028 y 1076 informes@sanildefonso.org.mx</p>
                <p class="footer-p">MÉXICO - ALGUNOS DERECHOS RESERVADOS © 2016 - POLÍTICAS DE PRIVACIDAD</p>
			</center>
		</div>
	</footer>

<!-- 	<section id="contenedor">
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
							<input type="hidden" name="<?php //echo (session_name()); ?>" value="<?php //echo (session_id()); ?>">
							<td><input type="submit" value="Iniciar sesión" name="iniciar" id="iniciar"></td></td>
						</tr>
						</form>
					</table>
				</article>
			</section>
		</center>

		<footer style="margin-top:200px";>
			<center>
				<?php //require('creditos.php'); ?>
			</center>
		</footer>
	</section> -->
</body>
</html>