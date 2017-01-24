<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imagen</title>
</head>

<body>
<?php
$numero1=9;
$numero2=8;
$nombre_imagen="FB-Perfil.png";
if($numero1>$numero2){
?>
<img src="images/<?php echo $nombre_imagen; ?>" />
<?php } ?>
</body>
</html>