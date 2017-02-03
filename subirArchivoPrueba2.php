<?php
	//Recibir el archivo mediante php
	$tmp = $_FILES["fichero"]["tmp_name"];
	echo "Temporal: ".$tmp."<br>";
	$dir = "img/portadas/".$_FILES["fichero"]["name"];
	echo "Dirección: ".$dir."<br>";
?>
<html>
	<head>
      	<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/JIC.js" type="text/javascript"></script>
		<script src="js/demo.js" type="text/javascript"></script>
	</head>
	<body>
		<img src="" id="img_hidden" style="display:none;">
	</body>
</html>
<?php
	//Recibir el archivo mediante php
	$tmp = $_FILES["fichero"]["tmp_name"];
	$portada_recibida = $_FILES["port_libro"]["tmp_name"];
	echo "Temporal: ".$tmp."<br>";
	$dir = "img/portadas/".$_FILES["fichero"]["name"];
	echo "Dirección: ".$dir."<br>";


	$sub = move_uploaded_file($tmp,$dir);
	
	if($sub){
		echo "Exito";
	} else {
		echo "Fracaso";
	}
?>
