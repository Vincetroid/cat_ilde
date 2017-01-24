<?php include 'cnx.php'; ?>

<html>
<head>
	<title>Modificacion de libros</title>
</head>

<body>
<?php

include 'menu.php';

$_POST=clean($_POST);
$_GET=clean($_GET);
$select1="";
$select2="";
$select3="";

if (isset($_POST['subgrabar']))
{
	if ($_POST['titulo'])
	{
			$sql="UPDATE leg_libros SET ";
			$sql .=" titulo='".$_POST['titulo']."', ";
			$sql .=" id_autor=".$_POST['id_autor'].", ";
			$sql .=" id_editorial=".$_POST['id_editorial'].", ";
			$sql .=" id_categoria=".$_POST['id_categoria']." ";
			$sql .=" WHERE id_libro=".$_POST['id_libro'];

			$res=mysql_query($sql);
	}
		$_GET['id_libro']=$_POST['id_libro'];
}

if (isset($_GET['id_libro']))
{
	$sql_d ="SELECT * FROM leg_libros, leg_categorias, leg_autores, leg_editoriales ";
	$sql_d .=" WHERE leg_libros.id_categoria=leg_categorias.id_categoria ";
	$sql_d .=" AND leg_libros.id_autor=leg_autores.id_autor ";
	$sql_d .=" AND leg_libros.id_editorial=leg_editoriales.id_editorial ";
	$sql_d .=" AND leg_libros.id_libro=".$_GET['id_libro'];

	$res_d =mysql_query($sql_d);
	$row_d= mysql_fetch_array($res_d);
	
	echo '<form method="POST" action="?">';
	echo '<br><br>';
	echo '<br><br>';
	
	$res=mysql_query("SELECT * FROM leg_autores ORDER BY autor ASC");
	while ($row=mysql_fetch_array($res))
	{
		if ($row['id_autor']==$row_d['id_autor'])
			$select1 .="<option selected value=".$row['id_autor'].">".$row['autor']."</option>";
		else
			$select1 .="<option value=".$row['id_autor'].">".$row['autor']."</option>";
	}
	
	$res=mysql_query("SELECT * FROM leg_categorias ORDER BY categoria ASC");
	while ($row=mysql_fetch_array($res))
	{
			if ($row['id_categoria']==$row_d['id_categoria'])
				$select2 .="<option selected value=".$row['id_categoria'].">".$row['categoria']."</option>";
			else
				$select2 .="<option value=".$row['id_categoria'].">".$row['categoria']."</option>";
	}
	
	$res=mysql_query("SELECT * FROM leg_editoriales ORDER BY editorial ASC");
	while ($row=mysql_fetch_array($res))
	{
			if ($row['id_editorial']==$row_d['id_editorial'])
				$select3 .="<option selected value=".$row['id_editorial'].">".$row['editorial']."</option>";
			else
				$select3 .="<option value=".$row['id_editorial'].">".$row['editorial']."</option>";
	}
	
	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Titulo</td><td><input type="text" name="titulo" value="'.$row_d['titulo'].'"</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Categoria</td><td><select name="id_categoria">'.$select2.'</select></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Autor</td><td><select name="id_autor">'.$select1.'</select></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Editorial</td><td><select name="id_editorial">'.$select3.'</select></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
	echo '</tr>';
	echo '</table>'		;
	echo '<input type="hidden" name="id_libro" value='.$row_d['id_libro'].'>';
	echo '</form>';
}
else
{
		$sql="SELECT  * FROM leg_libros, leg_categorias, leg_autores, leg_editoriales ";
		$sql .=" WHERE leg_libros.id_categoria=leg_categorias.id_categoria ";
		$sql .=" AND leg_libros.id_autor=leg_autores.id_autor ";
		$sql .=" AND leg_libros.id_editorial=leg_editoriales.id_editorial";

		$res=mysql_query($sql);
		
		if (mysql_num_rows($res)>0)
		{
				echo '<br><br>';
				echo '<br><br>';
				echo '<table cellspacing="0">';
				echo '<tr>';
				echo '<td>Libro</td>';
				echo '<td>Autor</td>';
				echo '<td>Categoria</td>';
				echo '<td>Editorial</td>';
				echo '</tr>';
				
				while ($row=mysql_fetch_array($res))
				{
						echo '<br><br>';
						echo '<br><br>';
						echo '<tr>';
						echo '<td>'.$row['titulo'].'</td>';
						echo '<td>'.$row['autor'].'</td>';
						echo '<td>'.$row['categoria'].'</td>';
						echo '<td>'.$row['editorial'].'</td>';
						echo '<td><a href="libro_mod.php?id_libro='.$row['id_libro'].'">ver detalle</a></td>';
						echo '</tr>';
				}
				echo '</table>';
		}
		else
		{
				echo '<br><br>';
				echo '<br><br>';
				echo 'No hay libros';
		}
}



?>
</body>
</html>
