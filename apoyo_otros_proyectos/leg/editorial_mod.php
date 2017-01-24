<?php include 'cnx.php' ?>

<html>
<head>

	<title> Modificacion de editoriales</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>

<body>

<?php

include 'menu.php';

$_POST=clean($_POST);
$_GET=clean($_GET);

if (isset($_POST['subgrabar']))
{
	$sql="UPDATE leg_editoriales set ";
	$sql .=" editorial='".$_POST['editorial']."'";
	$sql .=" WHERE id_editorial=".$_POST['id_editorial'];
	
	$res=mysql_query($sql);
}	
	if (isset($_GET['id_editorial']))
	{
		$sql="SELECT id_editorial, editorial FROM leg_editoriales WHERE id_editorial=".$_GET['id_editorial'];
		$res=mysql_query($sql);
		$row=mysql_fetch_array($res);
		
		echo '<form method="POST" action="?">';
		echo '<br><br>';
		echo '<br><br>';
		echo '<table cellspacing="0">';
		echo '<tr>';
		echo '<td>Nombre editorial</td><td><input type ="text" name="editorial" value="'.$row['editorial'].'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="2"><input value="Modificar" type="submit" name="subgrabar"></td>';
		echo '</tr>';
		echo '</table>';
		
		echo '<input type="hidden" name="id_editorial" value='.$row['id_editorial'].'>';
		echo '</form>';
	}
	else
	{
		$sql="SELECT id_editorial, editorial FROM leg_editoriales ORDER BY editorial ASC";
		$res=mysql_query($sql);
		if (mysql_num_rows($res)>0)
		{
			echo '<table cellspacing="0">';
			echo '<tr><td>Editorial</td></tr>';
			while ($row=mysql_fetch_array($res))
			{
				echo '<br><br>';
				echo '<br><br>';
				echo '<tr>';
				echo '<td>'.$row['editorial'].'</td><td><a href=editorial_mod.php?id_editorial='.$row['id_editorial'].'>ver detalle</a></td>';
				echo '<tr>';
			}
			echo '</table>';
		}
		else
			echo 'No hay editoriales';
	}
?>

</body>
</html>

