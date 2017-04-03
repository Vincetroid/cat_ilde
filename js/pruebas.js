//La primera posición es el id del autor, la segundo es el objeto

var lastClick = ['', null], penultimateClick = ['', null];

if(lastClick[0] == '' && penultimateClick[0] == ''){ //si no hay click aun
	alert('Primer Click');
	lastClick[0] = $(this).attr('id');
	lastClick[1] = $(this);
} else if(lastClick[0] != '' && penultimateClick[0] == '') { //si hay un ultimo click solamente
	alert('Segundo Click');
	penultimateClick[0] = lastClick[0];
	penultimateClick[1] = lastClick[1];
	lastClick[0] = $(this).attr('id');
	lastClick[1] = $(this);
} else if(lastClick[0]) != '' && penultimateClick[0] != '') { //si hay tanto un ultimo click y un último click
	alert('Tercer Click');
	penultimateClick[0] = lastClick[0];
	penultimateClick[1] = lastClick[1];
	lastClick[0] = $(this).attr('id');
	lastClick[1] = $(this);
}

