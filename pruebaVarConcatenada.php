<?php

$numCargos = 5;

for($i = 1; $i <= $numCargos; $i++){
	switch($i){
		case 1:
			$cargo1 = 1;
			$institucion1 = "IPN";
			echo "En 1<br>";
			break;
		case 2:
			$cargo2 = 1;
			$institucion2 = "IPN";
			echo "En 2<br>";
			break;

	}
	// Que tengo que hacer si quiero agregar 4 puestos a un autor? tengo que automatizar el switch?
}

foreach($GLOBALS as $var_name => $value) {
    echo $var_name.": ".$value."<br>";
}

?>