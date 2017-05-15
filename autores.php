<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/estilos_form_autores.css" rel="stylesheet">
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
					<form method="post" action="registrar_autor.php" id="form_reg_autor" class="form-reg"> 
					<table id="tablaFormReg">
						<input type="hidden" name="cargosLong" id="cargosLong" value="">
						<input type="hidden" name="actisLong" id="actisLong" value="">
						<tr><td><h3>Registrar autor</h3></td></tr>
						<tr><td><input type="text" placeholder="Nombre(s)" name="nom_autor" required></td></tr> 
						<tr><td><input type="text" placeholder="Apellidos" name="ape_autor" required></td></tr>
						<tr><td><input type="text" placeholder="Lugar de nacimiento" name="lug_autor" required></td></tr>
						<tr><td><input type="text" placeholder="Fecha de nacimiento" name="fec_autor" onfocus="(this.type='date')" required></td></tr>
				<!-- Validar en el futuro las etiquetas html porque se interpretan y las comillas simples -->
						<tr><td><textarea rows="12" cols="50" placeholder="Biografía" name="inf_autor" id="inf_autor" required>
							<h1 class="header-font1">Un titulo</h1>
							<p class="medium-font">Un parrafo</p>
						</textarea></td></tr>
						<tr id="row_cargo">
							<td><input type="button" value="Agregar Cargo" name="agr_cargo" id="agr_cargo"></td></td>
						</tr>
						<tr id="row_acti">
							<td><input type="button" value="Agregar Actividad" name="agr_acti" id="agr_acti"></td></td>
						</tr>
						<tr>
							<td><input type="submit" value="Registrar" name="registrar_autor" id="registrar_autor"></td></td>
						</tr>
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

	var addCargo = 0, addActi = 0;

	$(document).ready(function(){
		$('#agr_cargo').click(function(){

			addCargo++;

			var descripcionCargo = createInputTableFormElement('text', 'Descripción del cargo', 'autor_cargo', '', addCargo);
			var fechaInicio = createInputTableFormElement('text', 'Fecha inicio', 'fec_ini_cargo', "(this.type='date')", addCargo);
			var fechaFin = createInputTableFormElement('text', 'Fecha final', 'fec_fin_cargo', "(this.type='date')", addCargo);
			var institucion = createInputTableFormElement('text', 'Institución', 'ins_autor_cargo', '', addCargo);
			
			document.querySelector('#cargosLong').value = addCargo;

			var btnCargo = document.querySelector('#row_cargo');
			//Añadiendo en orden inverso por after
			btnCargo.after(institucion);
			btnCargo.after(fechaFin);
			btnCargo.after(fechaInicio);
			btnCargo.after(descripcionCargo);
		
		});

		$('#agr_acti').click(function(){

			addActi++;

			var descripcionActi = createInputTableFormElement('text', 'Descripción de actividad', 'autor_acti', '', addActi);
			var fechaInicio = createInputTableFormElement('text', 'Fecha inicio', 'fec_ini_acti', "(this.type='date')", addActi);
			var fechaFin = createInputTableFormElement('text', 'Fecha final', 'fec_fin_acti', "(this.type='date')", addActi);
			var institucion = createInputTableFormElement('text', 'Institución', 'ins_autor_acti', '', addActi);
			
			document.querySelector('#actisLong').value = addActi;

			var btnCargo = document.querySelector('#row_acti');
			//Añadiendo en orden inverso por after
			btnCargo.after(institucion);
			btnCargo.after(fechaFin);
			btnCargo.after(fechaInicio);
			btnCargo.after(descripcionActi);
		
		});

	});

	function createInputTableFormElement(inputType, placeHolder, name_id, onFocus, add){

		var tr = document.createElement('TR');
		var td = document.createElement('TD');
		var input = document.createElement('INPUT');
		input.setAttribute('type', inputType);
		input.setAttribute('placeholder', placeHolder);
		input.setAttribute('onfocus', onFocus);
		input.setAttribute('name', name_id+add);
		input.setAttribute('id', name_id+add);

		td.appendChild(input);
		tr.appendChild(td);

		return tr;

	}

	</script>
</body>
</html>