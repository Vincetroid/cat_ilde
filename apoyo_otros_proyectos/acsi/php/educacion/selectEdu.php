<?php
session_start();
include '../dbh.php';

if (isset($_POST["aut_id"]))
{
	$output = '';
	$sql = "SELECT * FROM educacion WHERE id_autor = '".$_POST["aut_id"]."'";
	$result = mysqli_query($conn,$sql);
	$output .= '
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr>
					<th width="30%">Institución</th>
					<th width="30%">Fecha de inicio</th>
					<th width="30%">Fecha de termino</th>
					<th width="5%">Editar</th>
					<th width="5%">Eliminar</th>
				</tr>';
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
				<tr>
					<td>'.$row["institucion"].'</td>
					<td>'.$row["fecha_ini"].'</td>
					<td>'.$row["fecha_fin"].'</td>
					<td><button data-placement="top" data-toggle="tooltip" title="Editar" id="'.$row["id_edu"].'" class="btn btn-primary btn-xs edu_edit" data-title="Edit" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></td>
	    			<td><button data-placement="top" data-toggle="tooltip" title="Eliminar" id="'.$row["id_edu"].'" class="btn btn-danger btn-xs edu_del" data-title="Delete" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button></td>
				</tr>
			';
		}
	}

	else
	{
		$output .= '
				<tr>
					<td colspan="5">No hay registros.</td>
				</tr>
		';
	}

	$output .='
			</table>
		</div>
	';

	echo $output;
}
?>