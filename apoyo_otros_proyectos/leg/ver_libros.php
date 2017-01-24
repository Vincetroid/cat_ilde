<?php include 'cnx.php'; ?>

<html>
<head>
	<title>Visualizador de libros</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
$_POST=clean($_POST);
$_GET=clean($_GET);

if (isset($_POST['subbuscar']))
{
			$sql="SELECT * FROM leg_libros, leg_categorias, leg_autores, leg_editoriales ";
			$sql.=" WHERE leg_libros.id_categoria=leg_categorias.id_categoria ";
			$sql.=" AND leg_libros.id_autor=leg_autores.id_autor ";
			$sql.=" AND leg_libros.id_editorial=leg_editoriales.id_editorial ";
			

				if (isset($_POST['txtpc']))
				{
					$sql.=" AND ";
					$sql.=" (leg_categorias.categoria like '%".$_POST['txtpc']."%' OR ";
					$sql.=" leg_autores.autor like '%".$_POST['txtpc']."%' OR ";
					$sql.=" leg_editoriales.editorial like '%".$_POST['txtpc']."%' OR ";
					$sql.=" leg_libros.titulo like '%".$_POST['txtpc']."%' )";
				}
				
				if (isset($_POST['seltitulo']))
				{
						$sql.=" OR leg_libros.id_libro=".$_POST['seltitulo'];
				}
				
				if (isset($_POST['selautor']))
				{
						$sql.=" OR leg_autores.id_autor=".$_POST['selautor'];
				}
				
				if (isset($_POST['selcategoria']))
				{
						$sql.= " OR leg_categorias.id_categoria=".$_POST['selcategoria'];
				}
}
		
var_dump($sql);
echo '<br>';
	
	$res=mysql_query($sql);
	
	if(mysql_num_rows($res))
	{
			echo '<table cellspacing="0"';
			echo '<tr>';
			echo '<td>Titulo</td>';
			echo '<td>Autor</td>';
			echo '<td>Categoria</td>';
			echo '<td>Editorial</td>';
			echo '</tr>';
			
			while ($row=mysql_fetch_array($res))
			{
				echo '<tr>';
				echo '<td>'.$row['titulo'].'</td>';
				echo '<td>'.$row['autor'].'</td>';
				echo '<td>'.$row['categoria'].'</td>';
				echo '<td>'.$row['editorial'].'</td>';
				echo '</tr>';
			}
	}
		echo 'No existen registros';
	
?>
</body>
</html>
