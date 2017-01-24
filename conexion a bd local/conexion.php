<?php

//Proceso de conexión con la base de datos
   $conex= mysql_connect("localhost","root","sr388TIGRE.")
      or die("No se pudo realizar la conexion");
   mysql_select_db("ildefonso2",$conex)
      or die("ERROR con la base de datos");

?>