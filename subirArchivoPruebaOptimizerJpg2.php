<?php

	function JPGoptimiser($JPGfile, &$error = '')
	{
	   echo "Archivo en funcion: ".$JPGfile."<br>";
	   // $ch = curl_init('http://jpgoptimiser.com/optimise');
	   $ch = curl_init('http://jpgoptimiser.com/examples');
	   // $ch = curl_init('http://jpgoptimiser.com');
	   // if($ch)
	   // 	echo"Exito en ch<br>";
	   // curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36");  
	   // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept-Language: es-es,en"));
	   // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	   // if(curl_setopt($ch, CURLOPT_TIMEOUT, 10))
	   // 	echo "Exito en primer curl_setopt<br>";
	   // curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	   // if(curl_setopt($ch, CURLOPT_FAILONERROR, 1))
	   // 	echo "Exito en segundo curl_setopt<br>";
	   // curl_setopt($ch, CURLOPT_POST, 1);
	   //  if(curl_setopt($ch, CURLOPT_POST, 1))
	   // 	echo "Exito en tercer curl_setopt<br>";
	   // curl_setopt($ch, CURLOPT_POSTFIELDS, array('input' => '@'.$JPGfile));
	   // if(curl_setopt($ch, CURLOPT_POSTFIELDS, array('input' => '@'.$JPGfile)))
	   // 	echo "Exito en 4to curl_setopt<br>";
	   // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   // if(curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1))
	   // 	echo "Exito en 5to curl_setopt<br>";
	   $jpg = curl_exec($ch);
	   if($jpg){
	   	echo "<br>Exito en jpg<br>";
	   }
	   else{
	   	echo "Fail en jpg<br>";
	   }
	   $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	   if($status)
	   	echo "Buen estatus<br>";
	   if ($status !== 200) {
	      $error = 'jpgoptimiser.com request failed: HTTP code ' . $status;
	      return false;
	   }
	   $curl_error = curl_error($ch);
	   if (!empty($curl_error)) {
	      $error = 'jpgoptimiser.com request failed: CURL error ' . $curl_error;
	      return false;
	   }
	   curl_close($ch);
	   return $jpg;
	}


	$tmp = $_FILES["fichero"]["tmp_name"];
	echo "Temporal: ".$tmp."<br>";
	$dir = "img/portadas/".$_FILES["fichero"]["name"];
	echo "Dirección: ".$dir."<br>";
	echo "Tipo: ".gettype($tmp)."<br><br>";

	$result = JPGoptimiser($tmp, $error);
	if (false === $result){
		echo "Fracaso<br>";
	}
	file_put_contents($_FILES["fichero"]["name"], $result);
?>


