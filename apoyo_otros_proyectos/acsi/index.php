<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/accordion-menu.css"/>
	<script src="js/accordion-menu.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<header>
	<div style="color: white">
		<p>Antiguo Colegio de San Ildefonso</p>
	</div>
</header>
<?php
	
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	if(isset($_SESSION['id'])) {
		echo $_SESSION['id']."<form action='php/salir.php'>
				<button>Salir</button>
			</form>
			<div class='menu'>
				<div id='accordion'>
			        <ul>
			        	<li>
			        		<a href='?01'>Usuarios</a>
			        	</li>
			            <li>
			               	<div>Personas</div>
			        		<ul>
			        			<li><a href='?11'>Autores</a></li>
			        			<li><a href='?12'>Educación</a></li>
			        			<li><a href='?13'>Cargos</a></li>
			        			<li><a href='?14'>Imagen</a></li>
			    			</ul>
						</li>
						<li>
			                <div>Publicaciones</div>
			                <ul>
			                    <li><a href='?21'>Categorías</a></li>
			                    <li><a href='?22'>Publicación</a></li>
			        </ul>
			    </div>
			</div>";

		} 

		else {
				echo "<form action='php/entrar.php' method='post'>
					<input type='text' name='user' placeholder='Usuario'>
					<input type='password' name='pwd' placeholder='Contraseña'>
					<button type='submit'>Entrar</button>
				</form>";
		}
		
	if (strpos($url, '01') !== false) {
		echo "<div class='container'>
				<h3 align='center'>Usuarios</h3>
				<div class='table-responsive'>
					<div align='right'>
						<button type='button' name='agregar' id='agregar' data-toggle='modal' data-target='#modal_usuarios' class='btn btn-primary'>Agregar +</button>
					</div>
					<br>
					<div id='usuarios-data'></div>
				</div>
			</div>
			";
	}

	else if (strpos($url, '11') !== false) {
		echo "<div class='container'>
				<h3 align='center'>Autores</h3>
				<div class='table-responsive'>
					<div align='right'>
						<button type='button' name='agregar' id='agregar' data-toggle='modal' data-target='#modal_autores' class='btn btn-primary'>Agregar +</button>
					</div>
					<br>
					<div id='autores-data'></div>
				</div>
			</div>
			";
	}

	else if (strpos($url, '12') !== false) {
		
		include 'php/dbh.php';
		$sql = "SELECT * FROM autores ORDER BY nombres ASC";
		$result = mysqli_query($conn,$sql);

		echo "<div class='container'>
				<h3 align='center'>Educación</h3>
				<select name='sel_autor' id='sel_autor' class='selectpicker'>
					<option value=''>Selecciona el autor</option>";
		
		while ($row = mysqli_fetch_array($result)) {
			echo '<option value="'.$row["id"].'">'.$row["nombres"].'</option>';
		}

		echo"	</select>
				<div class='table-responsive'>
					<div align='right'>
						<button type='button' name='agregar' id='agregar' data-toggle='modal' data-target='#modal_educacion' class='btn btn-primary'>Agregar +</button>
					</div>
					<br>
					<div id='educacion-data'></div>
				</div>
			</div>
			";

	}

	else if (strpos($url, '13') !== false) {
		echo "<div class='container'>
				<h3 align='center'>Cargos</h3>
				<div class='table-responsive'>
					<div align='right'>
						<button type='button' name='agregar' id='agregar' data-toggle='modal' data-target='#modal_cargos' class='btn btn-primary'>Agregar +</button>
					</div>
					<br>
					<div id='cargos-data'></div>
				</div>
			</div>
			";
	}

	elseif (strpos($url, 'error=login') !== false) {
		echo "Usuario o contraseña incorrectos.";
	}
?>

</body>
</html>


<script>
	$(document).ready(function(){

		$('[data-toggle="tooltip"]').tooltip();

//-------------AUTORES----------------

		$(document).on('click', '.aut_edit', function(){
			var aut_id = $(this).attr("id");
			$.ajax({
				url: "php/autores/editarAut.php",
				method: "POST",
				data: {aut_id:aut_id},
				dataType: "json",
				success: function(data)
				{
					$('#nombres').val(data.nombres);
					$('#apellidos').val(data.apellidos);
					$('#nac_lugar').val(data.lugar_nac);
					$('#nac_fecha').val(data.fecha_nac);
					$('#bio').val(data.bio);
					$('#aut_id').val(data.id);
					$('#guardar_aut').val("Actualizar");
					$('#modal_autores').modal('show');
				}
			});
		});

		$(document).on('click', '.aut_del', function(){
			var aut_id = $(this).attr("id");
			if (confirm("¿Estás seguro de eliminar este registro?")) {
				$.ajax({
					url: "php/autores/borrarAut.php",
					method: "POST",
					data: {id:aut_id},
					dataType: "text",
					success: function(data)
					{
						alert(data);
						fetch_data();
					}
				});
			}
		});



		$('#autores_form').on('submit', function(event){
			if ($('#nombres').val() == "") 
			{
				alert("Campo de nombres vacío");
			}

			else if ($('#apellidos').val() == "") 
			{
				alert("Campo de apellidos vacío");
			}

			else if ($('#nac_lugar').val() == "") 
			{
				alert("Campo de lugar vacío");
			}

			else if ($('#nac_fecha').val() == "") 
			{
				alert("Campo de fecha vacío");
			}

			else if ($('#bio').val() == "") 
			{
				alert("Campo de biografía vacío");
			}

			else
			{
				$.ajax({
					url: "php/autores/registrarAut.php",
					method: "POST",
					data: $('#autores_form').serialize(),
					success: function(data)
					{
						$('#autores_form')[0].reset();
						$('#modal_autores').modal('hide');
						$('#autores-data').html(data);
					}
				});
			}
		});

//-------------EDUCACION----------------
		
		$('#sel_autor').change(function(){
			var aut_id = $(this).val();
			$.ajax({
				url: "php/educacion/selectEdu.php",
				method: "POST",
				data: {aut_id:aut_id},
				dataType: "text",
				success: function(data)
				{
					$('#educacion-data').html(data);
				}
			});
		});


		$('#educacion_form').on('submit', function(event){
			event.preventDefault();
			if ($('#inst').val() == "") 
			{
				alert("Campo de institución vacío");
			}

			else if ($('#fecha_ini').val() == "") 
			{
				alert("Campo de fecha de inicio vacío");
			}

			else if ($('#fecha_fin').val() == "") 
			{
				alert("Campo de fecha de fin vacío");
			}

			else
			{
				$.ajax({
					url: "php/educacion/registrarEdu.php",
					method: "POST",
					data: $('#educacion_form').serialize(),
					success: function(data)
					{
						$('#educacion_form')[0].reset();
						$('#modal_educacion').modal('hide');
						$('#educacion-data').html(data);
					}
				});
			}
		});


		$(document).on('click', '.edu_del', function(){
			var edu_id = $(this).attr("id");
			if (confirm("¿Estás seguro de eliminar este registro?")) {
				$.ajax({
					url: "php/educacion/borrarEdu.php",
					method: "POST",
					data: {id:edu_id},
					dataType: "text",
					success: function(data)
					{
						alert(data);
						$('#educacion-data').html(data);
					}
				});
			}
		});

		$(document).on('click', '.edu_edit', function(){
			var edu_id = $(this).attr("id");
			$.ajax({
				url: "php/educacion/editarEdu.php",
				method: "POST",
				data: {edu_id:edu_id},
				dataType: "json",
				success: function(data)
				{
					$('#inst').val(data.institucion);
					$('#fecha_ini').val(data.fecha_ini);
					$('#fecha_fin').val(data.fecha_fin);
					$('#edu_id').val(data.id_edu);
					$('#aut_id').val("37");
					$('#guardar_edu').val("Actualizar");
					$('#modal_educacion').modal('show');
				}
			});
		});

//-------------CARGOS----------------





//-------------USUARIOS----------------


		$(document).on('click', '.user_del', function(){
			var user_id = $(this).attr("id");
			if (confirm("¿Estás seguro de eliminar este registro?")) {
				$.ajax({
					url: "php/usuarios/borrarUs.php",
					method: "POST",
					data: {id:user_id},
					dataType: "text",
					success: function(data)
					{
						alert(data);
						fetch_data();
					}
				});
			}
		});


		$('#usuarios_form').on('submit', function(event){
			if ($('#user').val() == "") 
			{
				alert("Campo de nombre vacío");
			}

			else if ($('#pwd').val() == "") 
			{
				alert("Campo de contraseña vacío");
			}

			else
			{
				$.ajax({
					url: "php/usuarios/registrarUs.php",
					method: "POST",
					data: $('#usuarios_form').serialize(),
					success: function(data)
					{
						$('#usuarios_form')[0].reset();
						$('#modal_usuarios').modal('hide');
						$('#usuarios-data').html(data);
					}
				});
			}
		});

		
		function fetch_data()
		{
			$.ajax({
				url: "php/autores/selectAut.php",
				method: "POST",
				success: function(data){
					$('#autores-data').html(data);
				}
			});

			$.ajax({
				url: "php/usuarios/selectUs.php",
				method: "POST",
				success: function(data){
					$('#usuarios-data').html(data);
				}
			});
		}
		fetch_data();

		
	});
</script>

<!--#########################         MODALES          #####################-->

<!--USUARIOS-->

<div id="modal_usuarios" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss = "modal">&times;</button>
				<h4 class="modal-title">Agregar usuario</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="usuarios_form">
					<label>Nombre de usuario</label>
					<input type="text" name="user" id="user" class="form-control" autofocus>
					<br>
					<label>Contraseña</label>
					<input type="password" name="pwd" id="pwd" class="form-control">
					<br>
					<input type="submit" name="guardar" id="guardar" value="Guardar" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!--AUTORES-->

<div id="modal_autores" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss = "modal">&times;</button>
				<h4 class="modal-title">Agregar autor</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="autores_form" enctype="multipart/form-data">
					<label>Nombres</label>
					<input type="text" name="nombres" id="nombres" class="form-control" autofocus>
					<br>
					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control">
					<br>
					<label>Lugar de nacimiento</label>
					<input type="text" name="nac_lugar" id="nac_lugar" class="form-control">
					<br>
					<label>Fecha de nacimiento</label>
					<input type="date" name="nac_fecha" id="nac_fecha" class="form-control">
					<br>
					<label>Biografía</label>
					<textarea rows="5" name="bio" id="bio" class="form-control"></textarea>
					<br>
					<input type="hidden" name="aut_id" id="aut_id">
					<input type="submit" name="guardar_aut" id="guardar_aut" value="Guardar" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<!--EDUCACION-->

<div id="modal_educacion" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss = "modal">&times;</button>
				<h4 class="modal-title">Agregar educación</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="educacion_form" enctype="multipart/form-data">
					<label>Institución</label>
					<input type="text" name="inst" id="inst" class="form-control" autofocus>
					<br>
					<label>Fecha de inicio</label>
					<input type="date" name="fecha_ini" id="fecha_ini" class="form-control">
					<br>
					<label>Fecha de termino</label>
					<input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
					<br>
					<input type="hidden" name="edu_id" id="edu_id">
					<input type="hidden" name="aut_id" id="aut_id">
					<input type="submit" name="guardar_edu" id="guardar_edu" value="Guardar" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!--
    
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        		<h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      		</div>
        	<div class="modal-body">
        		<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
        	</div>
        	<div class="modal-footer ">
       			<button type="button" id="del_confirm" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
       			<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      		</div>
        </div>
    </div>
</div>

-->
