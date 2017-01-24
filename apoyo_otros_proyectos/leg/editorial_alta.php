<?php include 'cnx.php' ?>

<html>
<head>
	<title> Alta editoriales </title>
	<lik rel="stylesheet" type="text/css" href="styles.css">
	
</head>
<body>

<?php

include 'menu.php';

$_POST=clean($_POST);

if (isset($_POST['subgrabar']))
{
	mysql_query('BEGIN WORK');
	
	$res=mysql_query("SELECT MAX(id_editorial) as M FROM leg_editoriales");
	//echo mysql_error();
	$row=mysql_fetch_array($res);
	//echo mysql_error();
	if ($row['M'])
		$max=$row['M']+1;
	else
		$max=1;
	$sql="INSERT INTO leg_editoriales (id_editorial,editorial) VALUES (";
	$sql.=$max.", ";
	$sql .="'".$_POST['editorial']."')";
	
	$res=mysql_query($sql);
	
	mysql_query('COMMIT');
}	

echo '<form method="POST" action="?">';
echo '<br><br>';
echo '<br><br>';
echo '<table cellspacing="0">';
echo '<tr>';
echo '<td>Editorial : </td><td><input type="text" id="editorial" name="editorial"></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><input value="Dar de alta" type="submit" name="subgrabar"></td>';
echo '</tr>';
echo '</table>';
echo '</form>';

?>

</body>
</html>