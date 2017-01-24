<?php

//Proceso de conexión con la base de datos
   $conex= mysql_connect("localhost","root","sr388TIGRE.")
      or die("No se pudo realizar la conexion");
   mysql_select_db("cat_ilde",$conex)
      or die("ERROR con la base de datos");

?>