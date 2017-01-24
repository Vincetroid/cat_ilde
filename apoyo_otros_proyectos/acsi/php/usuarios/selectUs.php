<?php
session_start();
include '../dbh.php';

$output = '';
$sql = "SELECT * FROM user ORDER BY id ASC";
$result = mysqli_query($conn,$sql);
$output .= '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th width="20%">ID</th>
				<th width="60%">Nombre</th>
				<th width="20%">Eliminar</th>
			</tr>';
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["user"].'</td>
				<td><button data-toggle="tooltip" data-placement="top" title="Eliminar" id="'.$row["id"].'" class="btn btn-danger btn-xs user_del" data-title="Borrar" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
			</tr>
		';
	}
}

else{
	$output .= '
			<tr>
				<td colspan="3">No hay registros.</td>
			</tr>
	';
}

$output .='
		</table>
	</div>
';

echo $output;

?>