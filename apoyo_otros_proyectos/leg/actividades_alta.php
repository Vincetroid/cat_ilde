<?php include 'cnx.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alta actividades por autor</title>
</head>

<body>

<?php
if (!isset($_GET['id']))
	$id="";
else
	$id=$_GET['id'];

include 'menu.php';
$autor=0;
$_POST=clean($_POST);


if (isset($_POST['subgrabar']))
{
	if (!empty($_POST['actividad'])	)
	{
	mysql_query('BEGIN WORK');

	$res=mysql_query("SELECT max(id_actividad) as M FROM leg_actividades");
	$row=mysql_fetch_array($res);
	if ($row['M'])
		$max=$row['M']+1;
	else
		$max=1;
		
					
					$sql="INSERT INTO leg_actividades (id_actividad, id_autor, actividad, fecha_actividad, institucion) VALUES(";
					$sql .= $max. ",".$_POST['id_autor'].",'".$_POST['actividad']."','".$_POST['fecha_actividad']."','".$_POST['institucion']."')";
					$res=mysql_query($sql);	
					$id=$_POST['id_autor'];
									
	mysql_query ('COMMIT');
	}
	$id=$_POST['id_autor'];
}

if (isset($_POST['eliminar']))
{
		mysql_query('BEGIN WORK');
		$res=mysql_query("DELETE  FROM leg_actividades WHERE id_actividad=".$_POST['eliminar']);
		$id=$_POST['id_autor'];
		mysql_query ('COMMIT');
}


echo '<br><br>';
echo '<br><br>';
echo '<form action="?" method="POST">';
$res=mysql_query("SELECT id_autor, autor FROM leg_autores WHERE id_autor=$id");
$row=mysql_fetch_array($res);
echo '<table border="1" cellspacing="0">';
echo '<tr>';
echo '<td>Autor</td><td><input type="text" name="autor" value="'.$row['autor'].'"  size="100" maxlength="10" readonly="readonly"></td>' ;
echo '<input type="hidden" name="id_autor" value='.$row['id_autor'].'>';
echo '</tr>';
echo '<tr>';
echo '<td>Actividades </td><td><input type="text" name="actividad" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Fecha  : </td><td><input type="date" id="fecha_actividad" name="fecha_actividad" size="100" maxlength="10"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Instituci&oacute;n </td><td><input type="text" id="institucion" name="institucion" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><button type="submit" name="subgrabar">Agregar actividades</button></td>';
echo '</tr>';
echo '<br>';
echo '<HR width=70% align="left">';
echo '</form>';


$sql="SELECT id_actividad, actividad, fecha_actividad, institucion FROM leg_actividades WHERE id_autor=$id";
$res=mysql_query($sql);

if (mysql_num_rows($res))
{
		
		echo '<div style="text-align:center;">';
		echo '<table cellspacing="0" >';
		echo '<tr>
				<td Width="200">Actividad.</td>
				<td Width="200">Fecha / Periodo </td>
				<td Width="200">Instituci&oacute;n.</td>
				<td Width="200">Eliminar.</td>
				</tr>';	
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td Width="200">'.$row['actividad'].'</td>
				<td Width="200">'.$row['fecha_actividad'].'</td>
				<td Width="200">'.$row['institucion'].'</td>
				<td Width="200"><input name="eliminar" type="radio" value="'.$row['id_actividad'].'" onchange="this.form.submit()" />Eliminar actividad</td>';
		echo '</tr>';
	}
		echo '</table>';
		echo '</div>';
}
else
{
	echo 'No existen registros';	
}
echo '<a href="autor_alta.php">Regresar </a>';
?>
</body>
</html>