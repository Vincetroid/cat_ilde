<html>
	<head>
      	<script src="js/jquery-3.1.1.min.js"></script>
      	<script src="js/JIC.js" type="text/javascript"></script>
	</head>
	<body>
		<img src="img/acervo.jpg" id="img" style="display:none;">
	</body>
<script>
	alert(<?php echo "hola" ?>);
</script>
</html>
<?php
	//Recibir el archivo mediante php
	//$img = $_POST['img'];
	// echo $img;
	// print_r($_FILES);
	

	// echo "Temporal: ".$tmp."<br>";
	// $dir = "img/portadas/".$_FILES["fichero"]["name"];
	// echo "Dirección: ".$dir."<br>";

	// //Recibir el archivo mediante php
	// $tmp = $_FILES["fichero"]["tmp_name"];
	// $portada_recibida = $_FILES["port_libro"]["tmp_name"];
	// echo "Temporal: ".$tmp."<br>";
	// $dir = "img/portadas/".$_FILES["fichero"]["name"];
	// echo "Dirección: ".$dir."<br>";

	// $sub = move_uploaded_file($tmp,$dir);
	
	// if($sub){
	// 	echo "Exito";
	// } else {
	// 	echo "Fracaso";
	// }
?>
