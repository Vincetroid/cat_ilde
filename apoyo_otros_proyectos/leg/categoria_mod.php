<?php include 'cnx.php' ?>

<html>
<head>

	<title> Modificacion de categoriaas </title>
	
</head>

<body>
<?php

include 'menu.php';

$_POST=clean($_POST);
$_GET=clean($_GET);

if (isset($_POST['subgrabar']))
{
	$sql="UPDATE leg_categorias set";
	$sql .=" categoria='".$_POST['categoria']."'";
	$sql .=" WHERE id_categoria=".$_POST['id_categoria'];
	
	$res=mysql_query($sql);
}

if (isset($_GET['id_categoria']))
{
$sql="SELECT id_categoria,categoria FROM leg_categorias WHERE id_categoria=".$_GET['id_categoria'];
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	
	echo '<form method="POST" action="?">';
	echo '<br><br>';
	echo '<br><br>';
	echo '<table cellspaciong="0">';
	echo '<tr>';
	echo '<td>Nombre de categoria</td><td><input type="text" name="categoria" value="'.$row['categoria'].'"</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
	echo '</tr>';
	echo '</table>';
	echo '<input type="hidden" name="id_categoria" value='.$row['id_categoria'].'>';
	echo '</form>';
}
else
{
	$sql="SELECT * FROM leg_categorias ORDER BY categoria ASC";
	$res=mysql_query($sql);
	
	if (mysql_num_rows($res)>0)
	{
		echo '<table cellspacing="0">';
		echo '<tr><td>Nombre categoria</td><td></td></tr>';
		while ($row=mysql_fetch_array($res))
		{
			echo '<br><br>';
			echo '<br><br>';
			echo '<tr>';
			echo '<td>'.$row['categoria'].'</td><td><a href=categoria_mod.php?id_categoria='.$row['id_categoria'].'>ver detalle</a></td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else
	{
		echo 'no hay categorias disponibles';
	}
}
	
?>
</body>
</html>
