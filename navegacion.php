<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container-fluid barra-nav">
       <div class="navbar-header">
         <a class="navbar-brand" href="#">
            <img src="img/logo.png" class="logo">
         </a>
         <a class="navbar-brand" href="home_user.php">
            <h2 class="white-letter main-title">Biblioteca San Ildefonso</h2>
         </a>
       </div>
       <ul class="nav navbar-nav">
         <li onclick="location.href = 'home_user.php'"><span class="glyphicon glyphicon-home icon white-letter"></span></li>
         <li onclick="location.href = 'autores.php'">
            <i class="fa fa-user-plus icon white-letter" ></i>
         </li>
         <li onclick="location.href = 'baja_autores.php'">
            <img src="img/ico_less_user.png" class="icon little-icon">
         </li>
         <li onclick="location.href = 'libros.php'">
            <img src="img/ico_new_book2.png" class="little-icon icon">
         </li>
         <li class="no-hover white-letter left-margin"><p class="right-margin">
               <?php echo $_SESSION['nick']."<br>"; ?>
            </p>
         </li>
         <li><span onclick="location.href = 'cerrar_sesion.php'" class="glyphicon glyphicon-log-out icon"></span></li>
       </ul>

       <div class="row">
         <div class="col-sm-12 line-under-header-nav"></div>
      </div>
   </div>
</nav>
<div class="little-space"></div> 