$(document).ready(function(){

	var idAutor = '';
	var idLibro = ''; 
	var cadenaNombre = '';
	var cadenaApellidos = '';
	var penultimateClick = [''], lastClick= [''];

	//CLICK A AUTOR (*)
	$('.autor').on('click',function(){

		idAutor = $(this).attr('id');

		if(lastClick[0] == '' && penultimateClick[0] == ''){ //si no hay click aun

			$(this).parent().css('background','BurlyWood');

			lastClick[0] = $(this).attr('id');
			lastClick[1] = $(this);
		} else if(lastClick[0] != '' && penultimateClick[0] == '') { //si hay un ultimo click solamente

			lastClick[1].parent().css('background','none');
			$(this).parent().css('background','BurlyWood');

			penultimateClick[0] = lastClick[0];
			penultimateClick[1] = lastClick[1];
			lastClick[0] = $(this).attr('id');
			lastClick[1] = $(this);
		} else if(lastClick[0] != '' && penultimateClick[0] != '') { //si hay tanto un ultimo click y un último click
			
			lastClick[1].parent().css('background','none');
			$(this).parent().css('background','BurlyWood');

			penultimateClick[0] = lastClick[0];
			penultimateClick[1] = lastClick[1];
			lastClick[0] = $(this).attr('id');
			lastClick[1] = $(this);
		}


		$.post('ajax/publicaciones.php',
			{
				id_aut : idAutor
			},
			function(data){
				// alert("Datos recibidos: " + data);
				$('#tabla_publicaciones').find('#lista_pubs').nextAll().remove();
				// $('#tabla_publicaciones').find('#lista_pubs').after(data);
				$('#tabla_publicaciones').append(data); //VINCULACION DELEGADA
				$(".nano").nanoScroller();
			}
		);


	});

	//CLICK A TITULO DE LIBRO
	$('#tabla_publicaciones').on('click','a.libro',function(){ //VINCULACION DELEGADA

		idLibro = $(this).attr('id');

		//si hay info de algun otro libro, borrarla
		$('#tabla_comentarios').find('#comentarios_pub').nextAll().remove();
		
		// alert($(this).text());
		// alert("Id autor: " + idAutor + " y  el Id libro: " + idLibro);

		$.post('ajax/detalles_publicacion.php',
			{
				id_aut : idAutor,
				id_lib : idLibro
			},
			function(data){
				//borrar Detalles de:
				$('#tabla_detalles_pub').find('#detalles_de').remove();
				//remover contenido anterior
				$('#tabla_detalles_pub').find('#detalles_pub').nextAll().remove();
				// $('#tabla_publicaciones').find('#lista_pubs').after(data);
				$('#tabla_detalles_pub').append(data);//VINCULACION DELEGADA

				//obtener nombre de portada y ponerla 
				var nomImg =  $(data).find('#nombre_img_port').html();
				if(nomImg === '' || nomImg === 'sin_portada_opti.png'){
					$('.img-portada').attr('src', 'img/portadas/sin_portada_opti.png');
				} else {
					$('.img-portada').attr('src', 'img/portadas/' + nomImg);
				}
				
			}
		);
	});

	//CLICK BOTON DE RESEÑA
	$('#tabla_detalles_pub').on('click','input.info-libro',function(){//VINCULACION DELEGADA

		$.post('ajax/comentarios_publicacion.php',
			{
				id_aut : idAutor,
				id_lib : idLibro
			},
			function(data){
				
				$('#tabla_resenia').find('#resenia_pub').nextAll().remove();
				$('#tabla_comentarios').find('#comentarios_pub').nextAll().remove();
				// $('#tabla_resenia').append(data);
				// $('#tabla_comentarios').append(data);
				
			}
		);

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
					$('#tabla_autores').children().remove();
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
					// $('#ultima_fila_busqueda').nextAll().remove();
					$('#tabla_autores').children().remove();
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
		
		idAutor = $(this).attr('id');

		$.post('ajax/publicaciones.php',
			{
				id_aut : idAutor
			},
			function(data){
				// alert("Datos recibidos: " + data);
				$('#tabla_publicaciones').find('#lista_pubs').nextAll().remove();
				// $('#tabla_publicaciones').find('#lista_pubs').after(data);
				$('#tabla_publicaciones').append(data); //VINCULACION DELEGADA
			}
		);

	});

	//CLICK A IMAGEN DE LAPIZ PARA MODIFICACIÓN DE AUTOR
	$('.edit_autor').on('click',function(){//VINCULACION DELEGADA(^)
		
		idAutor = $(this).siblings().find('.autor').attr('id');
		location.href = 'modificar_autores.php?id_autor=' + idAutor;
		// alert(idAutor);
		
	});

	$(".nano").nanoScroller();

});