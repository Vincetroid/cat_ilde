<?php include 'cnx.php';?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Alta libro</title>
</head>

<body>
	

<?php
$select1 = "";
$select2 = "";
$select3 = "";

//$fecha="";
include 'menu.php';

if (isset($_POST['subgrabar']))
{
			$_POST=clean($_POST);
			mysql_query('BEGIN WORK');
			
			if ($_POST['titulo'])
				{
					$res=mysql_query("SELECT max(id_libro) as M from leg_libros");
					$row=mysql_fetch_array($res);
					if ($row['M'])
							$max=$row['M']+1;
					else
							$max=1;
							
					//$fecha=date("Y-m-d h:i:s");
					$sql="insert into leg_libros (id_libro, titulo, fecha_lanzamiento, id_autor, id_categoria, id_editorial, paginas, sinopsis, relacion_autor_acsi, portada) values (";
					$sql .= $max. ", ";
					$sql .="'" .$_POST['titulo']."',";
					$sql .="'" .$_POST['fecha_lanzamiento']."',";
					$sql .="" .$_POST['autor'].",";
					$sql .=" ".$_POST['categoria'].",";
					$sql .=" ".$_POST['editorial'].",";
					$sql .=" ".$_POST['paginas'].",";
					$sql .="'" .$_POST['sinopsis']."',";
					$sql .="'" .$_POST['relacion_autor_acsi']."','')";
					//$sql .="'" .$_POST['portada']."')";
					

					$res=mysql_query($sql);
					mysql_query('COMMIT');							
				}		
}

echo '<form method="POST" action="?">';
echo '<br><br>';
echo '<br><br>';
$res=mysql_query("SELECT id_autor, autor FROM leg_autores ORDER BY autor ASC");
while ($row=mysql_fetch_array($res))
	$select1 .='<option value="'.$row['id_autor'].'">'.$row['autor'].'</option>';
$res=mysql_query("SELECT id_categoria, categoria FROM leg_categorias ORDER BY categoria ASC");
while ($row=mysql_fetch_array($res))
	$select2 .="<option value=$row[id_categoria]>$row[categoria]</option>";	
	
$res=mysql_query("SELECT id_editorial, editorial FROM leg_editoriales ORDER BY editorial ASC");
while ($row=mysql_fetch_array($res))
	$select3 .="<option value=$row[id_editorial]>$row[editorial]</option>";		

echo'<OPTION VALUE="'.$row['id'].'">'.$row['nombre'].'</OPTION>';
echo '<table border="0" cellspacing="10">';
echo '<tr>';
echo '<td>Titulo</td><td><input type="text" name="titulo" size="100" maxlength="100"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Fecha de publicacion</td><td><input type="date" name="fecha_lanzamiento"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Autor</td><td Width="200"><select name="autor" >'.$select1.'</select></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Categoria</td><td><select name="categoria" >'.$select2.'</select></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Editorial</td><td><select name="editorial" >'.$select3.'</select></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Paginas</td><td><input type="text" name="paginas"></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Relacion del autor con el ACSI</td><td>Sinopsis</td>';
echo '</tr>';
echo '<tr>';
echo '<td><textarea  id="relacion_autor_acsi" name="relacion_autor_acsi"  rows="10" cols="40" resize: vertical;></textarea></td>';
echo '<td><textarea  id="sinopsis" name="sinopsis"  rows="10" cols="40" resize: vertical;></textarea></td>';
echo '</tr>';
echo '<tr>';
echo '<td colspan="2"><input value="Dar de alta" type="submit" name ="subgrabar"</td>';
echo '</tr>';
echo '</table>';
echo '</form>';
?>
</body>
</html>
