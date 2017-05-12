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
	$.post('ajax/actualizar_autor.php',
		{
			id_aut : idAutor
		},
		function(data){
			// alert("Datos recibidos: " + data);
			$('#tablaFormReg').append(data);
		}
	);

	function onenter(e){
		if(e.keyCode == 13){
			// alert('Se presionó enter');
			var content = document.getElementById('inf_autor').value;
			var paragraph_content = '<p class="medium-font">' + content + '</p>';
			alert(content);
			alert(paragraph_content);

			// obtener el valor del textarea, analizar la cadena, por cada salto de linea, insertar un parrafo
		} else {
			// alert('Se presionó otra tecla');
		}
	}
	//onkeypress="onenter(event)"

	//contenido de textarea
	// var content = document.getElementById("infAutor").value;

	// //salto de línea
	// if( (content.match(/\n/g) || []) ){
	// 	alert('Salto de linea' +  (content.match(/\n/g) || []).length );
	// }

	// var paragraph_content = '<p class="medium-font">' + content + '</p>';
});