<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

// echo $_SESSION['id'];
echo "Bienvenido: ".$_SESSION['nick'];

//Conexion a bd
require('conexion.php');

//Consultar los autores
$consulta = "SELECT DISTINCT id_autor,nombre,apellidos FROM autor;"; 
$resultado = mysql_query($consulta,$conex) or die (mysql_error());
$numFilas = mysql_num_rows($resultado);

// foreach ($filas as $autor => $nombre) {
// 	echo "<pre>";
// 	print_r($autor.": ".$nombre."<br>");
// 	echo "</pre>";		
// }

?>

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
						<tr><td><h3>Capturar datos de libro</h3></td></tr>
						<form method="post" action="registrar_libro.php" id="form_reg_libro"> 
						<tr><td><input type="text" placeholder="Titulo" name="tit_libro" required></td></tr> 

						<tr><td>
							<select name="autor_libro" required style="color:#9d9d9d;">
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
						</td></tr>

						<tr><td><input type="text" placeholder="Editorial" name="edit_libro" required></td></tr>
						<tr><td><input type="number" min="1" max="1000" placeholder="Edición" name="edic_libro" required></td></tr>
						<tr><td><input type="number" min="1" max="10000" placeholder="Páginas" name="pags_libro"></td></tr>
						<tr><td><input type="number" placeholder="Año de publicación" name="anio_libro"></td></tr>
						<tr><td><input type="text" placeholder="Lugar de publicación" name="lugar_libro"></td></tr>
						<tr><td>Imagen de portada (no disponible por el momento)<input type="file" name="port_libro"></td></tr>
				<!-- Validar en el futuro las etiquetas html porque se interpretan y las comillas simples -->
						<tr><td><textarea rows="10" cols="50" rows="" placeholder="Comentarios, sinopsis, referencias... (no incluir por el momentos caracteres: <, >, ')" name="inf_libro" required></textarea></td></tr>
						<tr>
							<!-- <input type="hidden" name="<?php// echo (session_name()); ?>" value="<?php //echo (session_id()); ?>"> -->
							<td><input type="submit" value="Registrar" name="registrar_libro"></td></td>
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