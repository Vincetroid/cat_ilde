<?php include 'cnx.php'; ?>

<html>
<head>
	<title>Dar de baja libros</title>
</head>

<body>
<?php

include 'menu.php';
$_GET=clean($_GET);
if (isset($_GET['id_libro']))
{
	
	
	$sql="DELETE FROM leg_libros WHERE id_libro=".$_GET['id_libro'];

	$res=mysql_query($sql);

}

$sql="SELECT * FROM leg_libros, leg_categorias, leg_autores, leg_editoriales ";
$sql .=" WHERE leg_libros.id_categoria=leg_categorias.id_categoria ";
$sql .=" AND leg_libros.id_autor=leg_autores.id_autor ";
$sql .=" AND leg_libros.id_editorial=leg_editoriales.id_editorial ";
$sql .=" ORDER BY leg_libros.titulo ASC";

$res=mysql_query($sql);


if (mysql_num_rows($res))
{
	echo '<form method="POST" action="?">';
	echo '<br><br>';
	echo '<br><br>';	
	echo '<table cellspacing="0">';
	echo '<tr>';
	echo '<td>Libro</td>';
	echo '<td>Autor</td>';
	echo '<td>Categoria</td>';
	echo '<td>Editorial</td>';
	echo '<td>Dar de baja</td>';
	echo '<tr>';
	
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td>'.$row['titulo'].'</td>';
		echo '<td>'.$row['autor'].'</td>';
		echo '<td>'.$row['categoria'].'</td>';
		echo '<td>'.$row['editorial'].'</td>';
		echo '<td><a href="libro_baja.php?id_libro='.$row['id_libro'].'">dar de baja libro</a></td>';
		echo '</tr>';
	}
		echo '</table>';
		echo '</form>';
}
else
{
	echo '<br><br>';
	echo '<br><br>';
	echo 'No se encontraron libros';
}


?>
</body>
</html>
