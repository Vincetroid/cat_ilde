<?php
session_start();
include '../dbh.php';

$output = '';
$sql = "SELECT * FROM autores ORDER BY id ASC";
$result = mysqli_query($conn,$sql);
$output .= '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th width="15%">Nombres</th>
				<th width="15%">Apellidos</th>
				<th width="10%">Lugar de Nacimiento</th>
				<th width="10%">Fecha de Nacimiento</th>
				<th width="40%">Biografía</th>
				<th width="5%">Editar</th>
				<th width="5%">Eliminar</th>
			</tr>';
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>'.$row["nombres"].'</td>
				<td>'.$row["apellidos"].'</td>
				<td>'.$row["lugar_nac"].'</td>
				<td>'.$row["fecha_nac"].'</td>
				<td>'.$row["bio"].'</td>
				<td><button data-placement="top" data-toggle="tooltip" title="Editar" id="'.$row["id"].'" class="btn btn-primary btn-xs aut_edit" data-title="Edit" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></td>
    			<td><button data-placement="top" data-toggle="tooltip" title="Eliminar" id="'.$row["id"].'" class="btn btn-danger btn-xs aut_del" data-title="Delete" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button></td>
			</tr>
		';
	}
}

else{
	$output .= '
			<tr>
				<td colspan="7">No hay registros.</td>
			</tr>
	';
}

$output .='
		</table>
	</div>
';

echo $output;

?>