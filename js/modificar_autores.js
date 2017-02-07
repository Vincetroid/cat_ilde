$(document).ready(function(){

	var idAutor = '';

	//OBTENER ID DEL AUTOR POR $_GET CON JS
	var $_GET = {};
	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
	    function decode(s) {
	        return decodeURIComponent(s.split("+").join(" "));
	    }

	    $_GET[decode(arguments[1])] = decode(arguments[2]);
	});

	idAutor = $_GET["id_autor"];

	//ENVIAR ID PARA OBTENER FORMULARIO CON DATOS
	$.post('ajax/modificar_autores.php',
		{
			id_aut : idAutor
		},
		function(data){
			// alert("Datos recibidos: " + data);
			$('#tablaFormReg').append(data);
		}
	);

	//Carga de imagenes y texto y doc, todo
	// jQuery(window).load(function () {
	// 	alert('La página se ha cargado');
	// });

});