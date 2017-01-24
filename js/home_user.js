$(document).ready(function(){
	// $('footer').css("background-color", "yellow");
	// $('.autor').css("background-color","blue");
	var idAutor = '';
	var idLibro = ''; 

	//CLICK A AUTOR
	$('.autor').on('click',function(){

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




	//ESTO NO JALA EN LINEA:

	//CLICK A TITULO DE LIBRO
	$('#tabla_publicaciones').on('click','a.libro',function(){ //VINCULACION DELEGADA

		idLibro = $(this).attr('id');

		//si hay info de algun otro libro, borrarla
		$('#tabla_comentarios').find('#comentarios_pub').nextAll().remove();

		// $(this).css("background-color", "yellow");
		
		//NO SALE EL ALERT
		// alert($(this).text());
		//alert("Id autor: " + idAutor + " y  el Id libro: " + idLibro);

		$.post('ajax/detalles_publicacion.php',
			{
				id_aut : idAutor,
				id_lib : idLibro
			},
			function(data){
				// alert("Datos recibidos: " + data);
				//borrar Detalles de:
				$('#tabla_detalles_pub').find('#detalles_de').remove();
				//remover contenido anterior
				$('#tabla_detalles_pub').find('#detalles_pub').nextAll().remove();
				// $('#tabla_publicaciones').find('#lista_pubs').after(data);
				$('#tabla_detalles_pub').append(data);//VINCULACION DELEGADA

				//obtener nombre de portada y ponerla 
				var nomImg =  $(data).find('#nombre_img_port').html();
				$('.img-portada').attr('src', 'img/portadas/' + nomImg);
				
			}
		);
	});

	//CLICK BOTON DE VER INFO  O COMENTARIOS
	$('#tabla_detalles_pub').on('click','input.info-libro',function(){//VINCULACION DELEGADA

		$.post('ajax/comentarios_publicacion.php',
			{
				id_aut : idAutor,
				id_lib : idLibro
			},
			function(data){
				// alert("Datos recibidos: " + data);
				
				$('#tabla_comentarios').find('#comentarios_pub').nextAll().remove();
				$('#tabla_comentarios').append(data);
				
			}
		);

	});


});