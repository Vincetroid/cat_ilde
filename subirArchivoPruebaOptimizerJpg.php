<html>
	<head>
	</head>
	<body>
		<!-- <form action="subirArchivoPruebaOptimizerJpg2.php" method="post" name="f_prof" id="f_prof" enctype="multipart/form-data">
			Fichero:
			<input type="file" name="fichero" id="fichero">
			<input type="submit" value="ENVIAR" name="ok" id="ok">
		</form> -->
	</body>
	<script>
		// core
		var fs = require('fs');

		// from npm
		var superagent = require('superagent');

		// open the output file
		var outStream = fs.createWriteStream('optimised.jpg');

		// do the request
		var req = superagent
		    .post('http://jpgoptimiser.com/optimise')
		    .attach('input', 'filename.jpg')
		;

		// save the returned file
		req.end(function(res) {
		    res.pipe(outStream);
		});
	</script>
</html>