<html>
	<head>
      	<script src="js/jquery-3.1.1.min.js"></script>
      	<script src="js/JIC.js" type="text/javascript"></script>
	</head>
	<body>
		<form action="imagenPorPost2.php" method="post" name="f_prof" id="f_prof" enctype="multipart/form-data">
			<input type="file" id="port_libro" name="port_libro">
			<img src="img/acervo.jpg" id="img">
			<input type="submit" value="Subir imagen" id="submit" name="submit">
		</form>
	</body>
	<script>
		var port = document.getElementById("port_libro");
		port.addEventListener('change',function(){
			alert(port.value);
		});

		var img = document.getElementById("img");

		var result_image = jic.compress(port,20,"jpg");
        
        alert("Imagen resultante: " + result_image);
	</script>
</html>