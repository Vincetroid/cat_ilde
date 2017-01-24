<?php include 'cnx.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alta de cargos por autor</title>
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
	if (!empty($_POST['cargo'])	)
	{
	mysql_query('BEGIN WORK');

	$res=mysql_query("SELECT max(id_cargo) as M FROM leg_cargos");
	$row=mysql_fetch_array($res);
	if ($row['M'])
		$max=$row['M']+1;
	else
		$max=1;
		
					
					$sql="INSERT INTO leg_cargos (id_cargo, id_autor, cargo, fecha_cargo, institucion) VALUES(";
					$sql .= $max. ",".$_POST['id_autor'].",'".$_POST['cargo']."','".$_POST['fecha_cargo']."','".$_POST['institucion']."')";
					$res=mysql_query($sql);	
					$id=$_POST['id_autor'];
									
	mysql_query ('COMMIT');
	}
	$id=$_POST['id_autor'];
}

if (isset($_POST['eliminar']))
{
		mysql_query('BEGIN WORK');
		$res=mysql_query("DELETE  FROM leg_cargos WHERE id_cargo=".$_POST['eliminar']);
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
echo '<td>Cargo </td><td><input type="text" name="cargo" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Fecha  : </td><td><input type="date" id="fecha_cargo" name="fecha_cargo" size="100" maxlength="10"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Institucion </td><td><input type="text" id="institucion" name="institucion" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><button type="submit" name="subgrabar">Agregar cargo</button></td>';
echo '</tr>';
echo '<br>';
echo '<HR width=70% align="left">';
echo '</form>';


$sql="SELECT id_cargo, cargo, fecha_cargo, institucion FROM leg_cargos WHERE id_autor=$id";
$res=mysql_query($sql);

if (mysql_num_rows($res))
{
		
		echo '<div style="text-align:center;">';
		echo '<table cellspacing="0" >';
		echo '<tr>
				<td Width="200">Cargo.</td>
				<td Width="200">Fecha del cargo.</td>
				<td Width="200">Institución.</td>
				</tr>';	
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td Width="200">'.$row['cargo'].'</td>
				<td Width="200">'.$row['fecha_cargo'].'</td>
				<td Width="200">'.$row['institucion'].'</td>
				<td Width="200"><input name="eliminar" type="radio" value="'.$row['id_cargo'].'" onchange="this.form.submit()" />Eliminar actividad</td>';
		echo '</tr>';
	}
		echo '</table>';
		echo '</div>';

}
else
{
	echo 'No existen registros';	
}
echo '<br>';
echo '<a href="autor_alta.php">Regresar </a>';

?>
</body>
</html>