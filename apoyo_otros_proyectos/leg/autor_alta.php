<?php include 'cnx.php'?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title> Alta de autores</title>
</head>
<body>
<?php
$_POST=clean($_POST);
 include 'menu.php';

if (isset($_POST['subgrabar']))
{
	if (!empty($_POST['autor']))
	{	
		 $autor=ucwords($_POST['autor']);
		 
		 $query="SELECT autor FROM leg_autores WHERE autor like '{$autor}'";

			$res0=mysql_query($query);

			//$numero_filas = mysql_num_rows($res);
			
			if (mysql_num_rows($res0)==0)
			{	
	
	mysql_query('BEGIN WORK');
	
	$res=mysql_query("SELECT max(id_autor) as M FROM leg_autores");
	$row=mysql_fetch_array($res);
	if ($row['M'])
		$max=$row['M']+1;
	else
		$max=1;
		
					
					$sql="INSERT INTO leg_autores (id_autor,autor,fecha_nacimiento,lugar_nacimiento,estado_nacimiento) VALUES(";
					$sql .= $max. ",'".$autor."','".$_POST['fecha_nacimiento']."','".$_POST['lugar_nacimiento']."','".$_POST['estado_nacimiento']."')";
					$res=mysql_query($sql);	
					
					$res1=mysql_query("SELECT max(id_biografia) as M FROM leg_biografias");
					$row1=mysql_fetch_array($res1);
					if ($row1['M'])
						$max1=$row1['M']+1;
					else
					$max1=1;

					$sql1="INSERT INTO leg_biografias (id_biografia,id_autor,biografia) VALUES(";
					$sql1 .= $max1. ",".$max.",'".$_POST['biografia']."')";
					$res1=mysql_query($sql1);	
					
	mysql_query ('COMMIT');
		
		//header("Location: autor_alta.php?".($respuesta ? 'ok' : 'error'));
			}
	}
	
}
echo '<form method="POST" action="?">';
echo '<br><br>';
echo '<br><br>';
echo '<div style="text-align:center;">';
echo '<table cellspacing="10" border="0" style="margin: 0 auto;">';
echo '<tr>';
echo '<td> Nombre del Autor : </td><td><input type="text" id="autor" name="autor" style="text-transform: capitalize;" align="center" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Fecha de nacimiento : </td><td><input type="date" id="fecha_nacimiento" name="fecha_nacimiento" size="100" maxlength="10"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Lugar de nacimiento : </td><td><input type="text" id="lugar_nacimiento" name="lugar_nacimiento" size="100" maxlength="10"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Estado de nacimiento : </td><td><input type="text" id="estado_nacimiento" name="estado_nacimiento" size="100" maxlength="10"></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Biografia : </td><td><textarea  id="biografia" name="biografia"  rows="10" cols="40" resize: vertical;></textarea></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><input value="Dar de alta" type="submit" name="subgrabar"></td>';
echo '</tr>';
echo '</table>';
echo '</div>';

echo '</form>';


$sql="SELECT id_autor, autor FROM leg_autores";
$res=mysql_query($sql);

if (mysql_num_rows($res))
{
		echo '<br><br>';
		echo '<div style="text-align:center;">';
		echo '<table cellspacing="0" >';
		echo '<tr>
				<td Width="200">Lista de autores.</td>
				<td Width="200">Captura de cargos.</td>
				<td Width="200">Captura de actividades.</td>
				</tr>';	
	while ($row=mysql_fetch_array($res))
	{
		echo '<tr>';
		echo '<td Width="200">'.$row['autor'].'</td>
				<td Width="200"><a href=cargos_alta.php?id='.$row['id_autor'].'>Captura de cargos </a></td>
				<td Width="200"><a href=actividades_alta.php?id='.$row['id_autor'].'>Captura de actividades </a></td>';
		echo '</tr>';
	}
		echo '</table>';
		echo '</div>';

}
else
{
	echo 'No existen registros';	
}


?>
</body>
</html> 
