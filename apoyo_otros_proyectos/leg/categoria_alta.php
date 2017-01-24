<?php include 'cnx.php'?>
<!doctype html public "-//W#C//DTD html 4.0 //EN">
<html>
<head>
<title> Alta de categorias</title>
</head>
<body>

<?php

include 'menu.php';

if (isset($_POST['subgrabar']))
{
	$res=mysql_query("BEGIN WORK");
	
	$sql="SELECT MAX(id_categoria) AS M FROM leg_categorias";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	if ($row['M']>0)
		$max=$row['M']+1;
	else
		$max=1;
	
	$sql="INSERT INTO leg_categorias (id_categoria, categoria) VALUES (";
	$sql .=$max.", ";
	$sql .="'".$_POST['categoria']."')";
	$res=mysql_query($sql);
	$res=mysql_query('COMMIT');

}

echo '<form method="POST" action="?">';
echo '<br><br>';
echo '<br><br>';
echo '<table align="center" bordesr="1">';
echo '<tr>';
echo '<td>Categoria :</td><td><input type="text" name="categoria" ></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><input value="Dar de alta" type="submit" name="subgrabar"></td>';
echo '</tr>';
echo '</table>';
echo '</form>';

?>

</body>
</html>

