<?php

//Proceso de conexión con la base de datos
   $conex= mysql_connect("localhost","ildef0nso","6kv3bf#sN560f05nd1i")
      or die("No se pudo realizar la conexion");
   mysql_select_db("ildefonso2",$conex)
      or die("ERROR con la base de datos");

?>