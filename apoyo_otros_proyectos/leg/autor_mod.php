<?php include 'cnx.php' ?>

<html>
<head>
	<title> Modificacion de autores</title>
</head>

<body>

<?php

include 'menu.php';

$_POST=clean($_POST);
$_GET=clean($_GET);

if (isset($_POST['subgrabar']))
{
	$sql="UPDATE leg_autores set ";
	$sql .=" autor='".$_POST['autor']."',";
	$sql.=" fecha_nacimiento='".$_POST['fecha_nacimiento']."',";
	$sql.=" lugar_nacimiento='".$_POST['lugar_nacimiento']."',";
	$sql.=" estado_nacimiento='".$_POST['estado_nacimiento']."'";
	$sql .=" WHERE id_autor=".$_POST['id_autor'];
	
	var_dump($sql);
	
	$res=mysql_query($sql);
	
	$sql="UPDATE leg_biografias SET ";
	$sql.="biografia ='".$_POST['biografia']."'";
	$sql.=" WHERE id_autor=".$_POST['id_autor'];
	
	$res=mysql_query($sql);
	
	
}	
	if (isset($_GET['id_autor']))
	{
		$sql="SELECT id_autor, autor, fecha_nacimiento, lugar_nacimiento, estado_nacimiento FROM leg_autores WHERE id_autor=".$_GET['id_autor'];
		$res=mysql_query($sql);
		$row=mysql_fetch_array($res);
		
		$sql1="SELECT  biografia FROM leg_biografias WHERE id_autor=".$_GET['id_autor'];

		$res1=mysql_query($sql1);
		$row1=mysql_fetch_array($res1);
		
		
		echo '<form method="POST" action="?">';
		echo '<br><br>';
		echo '<br><br>';		
		echo '<table cellspacing="0">';
		echo '<tr>';
		echo '<td>Nombre del autor</td><td><input type ="text" name="autor" value="'.$row['autor'].'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Fecha de nacimiento</td><td><input type="date" name="fecha_nacimiento" value="'.$row['fecha_nacimiento'].'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Lugar de nacimiento</td><td><input type ="text" name="lugar_nacimiento" value="'.$row['lugar_nacimiento'].'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Estado de nacimiento</td><td><input type ="text" name="estado_nacimiento" value="'.$row['estado_nacimiento'].'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td> Biografia : </td><td><textarea  name="biografia"  rows="10" cols="40" resize: vertical;> '.$row1['biografia'].'</textarea></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
		echo '</tr>';
		echo '</table>';
		
		echo '<input type="hidden" name="id_autor" value='.$row['id_autor'].'>';
		echo '</form>';
	}
	else
	{
		$sql="SELECT id_autor, autor FROM leg_autores ORDER BY autor ASC";
		$res=mysql_query($sql);
		if (mysql_num_rows($res)>0)
		{
			echo '<br><br>';
			echo '<br><br>';			
			echo '<table cellspacing="0">';
			echo '<tr><td>Autor</td></tr>';
			while ($row=mysql_fetch_array($res))
			{
				echo '<br><br>';
				echo '<br><br>';
				echo '<tr>';
				echo '<td>'.$row['autor'].'</td><td><a href=autor_mod.php?id_autor='.$row['id_autor'].'>ver detalle</a></td>';
				echo '<tr>';
			}
			echo '</table>';
		}
		else
			echo '<br><br>';
			echo '<br><br>';
			echo 'No hay autores';
	}
?>

</body>
</html>

