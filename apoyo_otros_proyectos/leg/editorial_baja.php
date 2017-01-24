<?php include 'cnx.php' ?>

<html>
<head>

	<title> Baja de editoriales </title>
	<link rel="stylesheet" type="text/css" href="styles.css">

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
			$sql="DELETE FROM leg_editoriales WHERE id_editorial=".$value;
			$res=mysql_query($sql);
        }
			
	}

} 



$sql="SELECT * FROM leg_editoriales ORDER BY editorial ASC";
$res=mysql_query($sql);

if (mysql_num_rows($res))
{
	echo '<form method="POST" action="?">';
	echo '<br><br>';
	echo '<br><br>';
	echo '<table cellspacing="0">';
	echo '<tr><td>Editorial</td><td>Dar de baja?</td></tr>';
	$c=1;
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td>'.$row['editorial'].'</td>';
		echo '<td><input type="checkbox" name="check[]" value='.$row['id_editorial'].'></td>';
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
	echo 'No se encontraron registros.';
}	

?>

</body>
</html>


