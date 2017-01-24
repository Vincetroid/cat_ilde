<?php include 'cnx.php'; ?>

<html>
<head>

	<title> Baja de autores </title>
	
</head>
<body>

<?php

include 'menu.php';

$_POST=clean($_POST);

if (isset($_POST['subgrabar']))
{
     if (is_array($_POST['check'])) 
	{
        foreach ($_POST['check'] as $key => $value) 
		{
			$sql="DELETE FROM leg_autores WHERE id_autor=".$value;
			$res=mysql_query($sql);
			$sql="DELETE FROM leg_biografias WHERE id_autor=".$value;
			$res=mysql_query($sql);
        }
			
	}

} 

$sql="SELECT * FROM leg_autores ORDER BY autor ASC";
$res=mysql_query($sql);




if (mysql_num_rows($res))
{
	echo '<form method="POST" action="?">';
	echo '<br><br>';
	echo '<br><br>';	
	echo '<table cellspacing="0">';
	echo '<tr><td>Autor</td><td>Dar de baja?</td></tr>';
	$c=1;
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td>'.$row['autor'].'</td>';
		echo '<td><input type="checkbox" name="check[]" value='.$row['id_autor'].'></td>';
		echo '</tr>';
		$c++;
	}
	echo '<input type="hidden" name="cant" value='.$c.'>';
	echo '<tr>';
	echo '<td collspan="2"><input value="Dar de baja" type="submit" name="subgrabar"></td>';
	echo '</tr>';
	echo '</table>';
	echo '</form>';

}	
else
{
	echo '<br><br>';
	echo '<br><br>';	
	echo 'No se encontraron registros.';
}	


?>

</body>
</html>

