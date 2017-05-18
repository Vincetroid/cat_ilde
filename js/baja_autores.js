$(document).ready(function(){

	var idAutor = '';
	var cadenaNombre = '';
	var cadenaApellidos = '';

	//CLICK A AUTOR
	$('.autor').on('click',function(e){
		e.preventDefault();

		var erase = confirm('¿Está seguro? Se borrarán todas las publicaciones e información asociadas al autor ');
		var row_selection = $(this).closest("tr");
		
		if(erase == true){
		// debugger;
			idAutor = $(this).attr('id');
			
			$.post('ajax/borrar_autores.php',
				{
					id_aut : idAutor
				},
				function(data){
					if(data == '1'){
						row_selection.hide();
						alert('Se eliminó el autor');
					} else {
						alert('No se pudo eliminar el autor');
					}
				}
			);
		} else {
			return false;
		}

	});

	//--- BUSQUEDA ---//

	//ENTER A CUADRO DE TEXTO DE BUSQUEDA RÁPIDA POR NOMBRE
	$("#busqueda_nombre > input[type='text']").on('change',function(){

		cadenaNombre = $(this).val();
		
		if(cadenaNombre !== ''){
			$.post('ajax/busqueda_rapida.php',
				{
					cadena_nombre: cadenaNombre,	
					cadena_apellidos: cadenaApellidos,
				},
				function(data){
					// alert("Datos recibidos con cadena de texto: " + data);
					$('#ultima_fila_busqueda').nextAll().remove();
					$('#tabla_autores').append(data);//VINCULACION DELEGADA(^) 
				}
			);
		} else if(cadenaNombre === ''){
			
			$.post('ajax/busqueda_rapida.php',
				{
					cadena_nombre: cadenaNombre,	
					cadena_apellidos: cadenaApellidos,
				},
				function(data){
					// alert("Datos recibidos sin cadena de texto: " + data);
					$('#ultima_fila_busqueda').nextAll().remove();
					$('#tabla_autores').append(data);//VINCULACION DELEGADA(^) 
				}
			);
		}

	});

	//ENTER A CUADRO DE TEXTO DE BUSQUEDA RÁPIDA POR APELLIDOS
	$("#busqueda_apellidos > input[type='text']").on('change',function(){

		cadenaApellidos = $(this).val();

		$.post('ajax/busqueda_rapida.php',
			{
				cadena_nombre: cadenaNombre,	
				cadena_apellidos: cadenaApellidos,	
			},
			function(data){
				// alert("Datos recibidos2: " + data);
				$('#ultima_fila_busqueda').nextAll().remove();
				$('#tabla_autores').append(data);//VINCULACION DELEGADA(^) 
			}
		);
	});
	
	//CLICK A AUTOR (*)...PERO DE BUSQUEDA
	$('#tabla_autores').on('click','a.autor',function(){//VINCULACION DELEGADA(^)
		
		var erase = confirm('¿Está seguro? Se borrarán todas las publicaciones e información asociadas al autor ');
		var row_selection = $(this).closest("tr");
		
		if(erase == true){
			idAutor = $(this).attr('id');
			
			$.post('ajax/borrar_autores.php',
				{
					id_aut : idAutor
				},
				function(data){
					if(data == '1'){
						row_selection.hide();
						alert('Se eliminó el autor');
					} else {
						alert('No se pudo eliminar el autor');
					}
				}
			);
		} else {
			return false;
		}

	});

});