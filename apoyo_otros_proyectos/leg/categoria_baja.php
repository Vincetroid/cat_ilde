<?php include 'cnx.php'; ?>

<html>
<head>
<title> Baja de categorias</title>
</head>
<body>

<?php

include 'menu.php';

$_POST=clean($_POST);

//$_POST = sanitize($_POST);

if (isset($_POST['subgrabar']))
{
     if (is_array($_POST['check'])) 
	{
        foreach ($_POST['check'] as $key => $value) 
		{
			$sql="DELETE FROM leg_categorias WHERE id_categoria=".$value;
			$res=mysql_query($sql);
        }
			
	}

} 

$sql="SELECT id_categoria,categoria FROM leg_categorias ORDER BY id_categoria ASC";
$res=mysql_query($sql);

if (mysql_num_rows($res))
{
	echo '<form action="?" method="POST">';
	echo '<br><br>';
	echo '<br><br>';
	echo '<table cellspacing="0">';
	echo '<tr><td>Categoria</td><td> dar de baja</td></tr>';
	
	$c=1;
	
	while ($row=mysql_fetch_array($res))
	{
		
		echo '<tr>';
		echo '<td>'.$row['id_categoria'].'</td>';
		echo '<td>'.$row['categoria'].'</td>';
		echo '<td><input type="checkbox" name="check[]" value='.$row['id_categoria'].'></td>';
		echo '</tr>';
		$c++;
	}
	
		echo '<input type="hidden" name="cant" value="'.$c.'">';
		echo '<tr>';
		echo '<td colspan="2"><input value="dar de baja" type="submit" name="subgrabar"></td>';
		
		echo '</tr>';
		echo '</table>';
		echo '</form>';
	
}
else
{
	echo 'No se encontraron categorias';
}

?>

</body>
</html>
