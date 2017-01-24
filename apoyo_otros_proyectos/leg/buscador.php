<?php include 'cnx.php'; ?>

<html>
<head>
	<title> Busqueda de libros </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<div class="header">Busqueda de libros </div>

<form method="POST" action="ver_libros.php">
	<table cellspacing="0">
		<tr>
		<td>Por palabra clave</td>
		<td><input type="text" id="txtpc" name="txtpc"></td>
		</tr>
		
		<tr>
		<td>Titulo libro</td>
		<td>
		<?php
		
			$select="-";
			$res=mysql_query("SELECT * from leg_libros ORDER BY titulo");
			if (mysql_num_rows($res))
			{
				$select='<select id="seltitulo" name="seltitulo">';
				$select.='<option value="0" selected>Todos los libros</option>';
				
				while ($row=mysql_fetch_array($res))
					$select .='<option value='.$row['id_libro'].'>'.$row['titulo'].'</option>';
					$select .='</select>';
			}
			
			echo $select;
			
		?>
		</td>
		</tr>
		
		<tr>
		<td>Autor</td>
		<td>
		<?php
			$select="-";
			$res=mysql_query("SELECT * FROM leg_autores ORDER BY autor");
			if (mysql_num_rows($res))
			{
					$select='<select id="selautor" name="selautor">';
					$select.='<option value="0" selected>Todos los autores</option>';
					
					while ($row=mysql_fetch_array($res))
						$select.='<option value='.$row['id_autor'].'>'.$row['autor'].'</option>';
						$select.='</select>';
			}
			
				echo $select;
		?>
		</td>
		</tr>
					
		<tr>
		<td>Categoria</td>
		<td>
		<?php
			$select="-";
			$res=mysql_query("SELECT * FROM leg_categorias ORDER BY categoria");
			if (mysql_num_rows($res))
			{
					$select='<select id="selcategoria" name="selcategoria">';
					$select.='<option value="0" selected>Todas las categorias</option>';
					
					while ($row=mysql_fetch_array($res))
						$select.='<option value='.$row['id_categoria'].'>'.$row['categoria'].'</option>';
						$select.='</select>';
			}
			
				echo $select;
		?>
		</td>
		</tr>

		<tr>
		<td colspan="2"><input type="submit" id="subbuscar" name="subbuscar"</td>
		</tr>
		</table>
		</form>
		</body>
</html>
