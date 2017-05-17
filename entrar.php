<?php session_start (); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="utf-8" /> -->
	<!-- <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
	<script src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="css/estilos_login.css" />
	<title>Biblioteca San Ildefonso</title>
	<script src="js/bootstrap.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/estilos_login.css" rel="stylesheet">
</head>
<body id="bootstrap_overrides">
	<div class="row">
		<div class="col-sm-12">
			<header>
				<center>
					<h1 class="header-title">Biblioteca San Ildefonso</h1>
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

	<footer id="pie_pagina" class="row">
		<div class="col-sm-12">
			<center>
				<img class="footer-img" src="img/macsi2016gray.png">
				<p class="footer-p">Justo Sierra 16, Centro Histórico de la Ciudad de México 06020 México, D.F. Tel. (+52-55) 3602 0000 exts. 1028 y 1076 informes@sanildefonso.org.mx</p>
                <p class="footer-p">MÉXICO - ALGUNOS DERECHOS RESERVADOS © 2016 - POLÍTICAS DE PRIVACIDAD</p>
			</center>
		</div>
	</footer>
	</section>
	
</body>
</html>