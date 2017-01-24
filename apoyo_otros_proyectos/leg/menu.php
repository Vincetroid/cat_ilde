<?php
echo '
<html>
	<head>
		<title>Menu</title>
		<style type="text/css" >
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>     
	</head>
	<body>
		<div id="header">
			<ul class="nav">
				<li><a href="">Autor</a>
					<ul>
						<li><a href="autor_alta.php">Alta de autores</a>
						<!--<ul>
							<li><a href="cargos_alta.php">Cargos</a></li>
							<li><a href="actividades_alta.php">Actividades</a></li>
							<li><a href="inusual_alta.php">Inusual</a></li>
						</ul>-->
						</li>
						<li><a href="autor_baja.php">Baja de autores</a>
						<!--<ul>
							<li><a href="cargos_baja.php">Cargos</a></li>
							<li><a href="actividades_baja.php">Actividades</a></li>
							<li><a href="inusual_baja.php">Inusual</a></li>
						</ul>-->
						</li>
						<li><a href="autor_mod.php">Modificación de autores</a>
						<!--<ul>
							<li><a href="cargos_mod.php">Cargos</a></li>
							<li><a href="actividades_mod.php">Actividades</a></li>
							<li><a href="inusual_mod.php">Inusual</a></li>
						</ul>-->
						</li>
					</ul>
				</li>
				<li><a href="">Categorias</a>
					<ul>
						<li><a href="categoria_alta.php">Alta de categoria</a></li>
						<li><a href="categoria_baja.php">Baja de categoria</a></li>
						<li><a href="categoria_mod.php">Modificación de categoria</a></li>
					</ul>
				</li>
				<li><a href="">Editoriales</a>
					<ul>
						<li><a href="editorial_alta.php">Alta de editorial</a></li>
						<li><a href="editorial_baja.php">Baja de editorial</a></li>
						<li><a href="editorial_mod.php">Modificación de editorial</a></li>
					</ul>	
				</li>
				<li><a href="">Libros</a>
					<ul>
						<li><a href="libro_alta.php">Alta de libro</a></li>
						<li><a href="libro_baja.php">Baja de libro</a></li>
						<li><a href="libro_mod.php">Modificación de libro</a></li>
					</ul>	
				</li>	
			</ul>
		</div>
	</body>
</html>';
?>