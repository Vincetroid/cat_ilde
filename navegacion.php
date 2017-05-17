<div class="row">
<div class="col-sm-12 header">

   <div class="col-sm-1">
      <img src="img/logo.png" class="logo">
      <div class="border-logo"></div>
   </div>

   <div class="col-sm-3 left-up-header">
      <h2 class="left-up-header-content">Biblioteca San Ildefonso</h2>
   </div>

   <div class="col-sm-4 height-100">
      <ul class="nav">
         <li onclick="location.href = 'home_user.php'"><span class="glyphicon glyphicon-home"></span></li>
         <li onclick="location.href = 'autores.php'">Nuevo autor</li>
         <li onclick="location.href = 'baja_autores.php'">Borrar autor</li>
         <li onclick="location.href = 'libros.php'">Registrar libro</li>
      </ul>
   </div>

   <div class="col-sm-2 right-up-header">
      <p class="right-up-header-content">
         Bienvenido <?php echo $_SESSION['nick']."<br>"; ?>
      </p>
   </div>

   <div class="col-sm-1 right-up-header">
      <span onclick="location.href = 'cerrar_sesion.php'" class="glyphicon glyphicon-log-out"></span>
   </div>

	</div>
</div>
<div class="row">
	<div class="col-sm-12 line-under-header-nav"></div>
</div>

<div class="little-space"></div>